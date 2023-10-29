<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class MailConfigController extends Controller
{
    public function index()
    {
        $envVariables = $this->getEnvVariables();
        return view('layouts.view.admin.layouts.pengaturan.mail-config', compact('envVariables'));
    }

    public function update(Request $request)
    {
        foreach ($request->except('_token') as $key => $value) {
            // Update the config value
            Config::set("mail.$key", $value);

            // Update the .env file
            $this->updateEnvFile($key, $value);
        }

        return redirect()->back()->with('success', 'Mail configuration updated successfully.');
    }

    private function getEnvVariables()
    {
        $envContent = file_get_contents(base_path('.env'));
        $lines = explode("\n", $envContent);
        $variables = [];

        foreach ($lines as $line) {
            if (!empty($line) && strpos($line, '=') !== false) {
                list($key, $value) = explode('=', $line, 2);
                $variables[$key] = $value;
            }
        }

        return $variables;
    }

    private function updateEnvFile($key, $value)
    {
        $envPath = base_path('.env');
        file_put_contents($envPath, preg_replace(
            "/$key=[^\r\n]*/",
            "$key=$value",
            file_get_contents($envPath)
        ));
    }
}