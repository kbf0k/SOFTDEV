document.addEventListener('DOMContentLoaded', () => {
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');

    emailInput.addEventListener('focus', () => {
        emailInput.classList.add('focused');
        passwordInput.classList.remove('focused');
    });

    emailInput.addEventListener('blur', () => {
        emailInput.classList.remove('focused');
    });

    passwordInput.addEventListener('focus', () => {
        passwordInput.classList.add('focused');
        emailInput.classList.remove('focused');
    });

    passwordInput.addEventListener('blur', () => {
        passwordInput.classList.remove('focused');
    });
});


document.addEventListener('DOMContentLoaded', () => {
    const baloes = document.querySelectorAll('.balao');
    baloes.forEach(balao => {
        const randomPosition = Math.random() * 100; // Gera uma posição aleatória entre 0% e 100%
        balao.style.left = `${randomPosition}%`; // Aplica a posição aleatória
    });
});


// script.js
let currentIndex = 0;
const images = document.querySelector('.carousel-images');
const totalImages = document.querySelectorAll('.carousel-image').length;

function moveSlide(step) {
    currentIndex = (currentIndex + step + totalImages) % totalImages;
    const offset = -currentIndex * 100 / 3; 
    images.style.transform = `translateX(${offset}%)`;
}


