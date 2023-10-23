const slides = document.querySelectorAll('.carousel-slide');
        let currentSlide = 0;

        const showSlide = (slideIndex) => {
            slides.forEach((slide) => {
                slide.style.transform = `translateX(-${slideIndex * 100}%)`;
            });
        };

        const prevSlide = () => {
            currentSlide = (currentSlide - 1 + slides.length) % slides.length;
            showSlide(currentSlide);
        };

        const nextSlide = () => {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        };

        document.getElementById('prevSlide').addEventListener('click', prevSlide);
        document.getElementById('nextSlide').addEventListener('click', nextSlide);