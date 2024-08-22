let currentIndex = 0;

function slide(index) {
    const slides = document.querySelector('.carousel-container');
    const totalSlides = slides.children.length;
    if (index >= totalSlides) {
        currentIndex = 0;
    } else if (index < 0) {
        currentIndex = totalSlides - 1;
    } else {
        currentIndex = index;
    }
    slides.style.transform = `translateX(-${currentIndex * 600}px)`;
}

function nextSlide() {
    slide(currentIndex + 1);
}

function prevSlide() {
    slide(currentIndex - 1);
}
