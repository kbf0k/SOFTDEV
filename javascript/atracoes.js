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




function menuShow() {
    let menuMobile = document.querySelector('.mobile-menu');
    if (menuMobile.classList.contains('open')) {
        menuMobile.classList.remove('open')
        document.querySelector('.icon').src = "../img/menu_white_36dp.svg"
    }
    else {
        menuMobile.classList.add('open')
        document.querySelector('.icon').src = "../img/close_white_36dp.svg"
    }
}