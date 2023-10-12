@extends('layouts.app')

@section('content-app')
    <!-- Header -->
    <div class="header-bg text-white">
        <div class="container mb-5">
            <h3 class="title">Layanan Kami</h3>
        </div>
        <div class="container">
            <p class="breadcrumb">
                <a href="/">Beranda</a>&nbsp><strong>&nbsp;Layanan Kami</strong>
            </p>
        </div>
    </div>

    <!-- Layanan -->
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <img src="{{ asset('/img/icon_art.png') }}" alt="icon_art" class="mx-auto d-block mt-4"
                        style="width: 150px">
                    <div class="card-body">
                        <h4 class="card-title">Asisten Rumah Tangga</h4>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis non,
                            fugiat exercitationem veniam saepe consequuntur nulla inventore dicta nesciunt necessitatibus
                            ducimus dolore nemo et minima.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <img src="{{ asset('/img/icon_babysitter.png') }}" alt="icon_babysitter" class="mx-auto d-block mt-4"
                        style="width: 150px">
                    <div class="card-body">
                        <h4 class="card-title">Baby Sitter</h4>
                        <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nostrum quasi ratione
                            perspiciatis asperiores tenetur repellat dolore officia nam, facilis dolor culpa obcaecati
                            dolorum fugit assumenda.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <img src="{{ asset('/img/icon_sopir.png') }}" alt="icon_sopir" class="mx-auto d-block mt-4"
                        style="width: 150px">
                    <div class="card-body">
                        <h4 class="card-title">Sopir</h4>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates sit iusto
                            incidunt esse facilis repudiandae consequatur quis, rerum at natus, id enim eos, atque libero!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
