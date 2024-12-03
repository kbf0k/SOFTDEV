function menuShow() {
    let menuMobile = document.querySelector('.mobile-menu');
    if (menuMobile.classList.contains('open')) {
        menuMobile.classList.remove('open')
        document.querySelector('.icon').src = "img/menu_white_36dp.svg"
    }
    else {
        menuMobile.classList.add('open')
        document.querySelector('.icon').src = "img/close_white_36dp.svg"
    }
}

let slideIndex = 0;
let intervalo;

function mostrarSlides() {
    const slides = document.querySelectorAll('.slide');
    const indicadores = document.querySelectorAll('.indicador');
    slides.forEach((slide, index) => {
        slide.style.display = index === slideIndex ? 'block' : 'none';
    });
    indicadores.forEach((indicador, index) => {
        indicador.classList.toggle('ativo', index === slideIndex);
    });
}

function mudarSlide(n) {
    slideIndex += n;

    const slides = document.querySelectorAll('.slide');
    if (slideIndex < 0) {
        slideIndex = slides.length - 1;
    } else if (slideIndex >= slides.length) {
        slideIndex = 0;
    }

    mostrarSlides();
    reiniciarCarrossel();
}

function mudarParaSlide(n) {
    slideIndex = n;
    mostrarSlides();
    reiniciarCarrossel();
}

function iniciarCarrossel() {
    intervalo = setInterval(() => {
        mudarSlide(1);
    }, 7000);
}

function reiniciarCarrossel() {
    clearInterval(intervalo);
    iniciarCarrossel();
}

iniciarCarrossel();
mostrarSlides();


document.getElementById('logout').addEventListener('click', () => {
    Swal.fire({
        title: "Você deseja sair?",
        text: "Não será possível reverter isso",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#6334B1",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sim, sair"
    }).then((result) => {
        if (result.isConfirmed) {
            fetch('logout.php', {
                method: 'POST'
            })
            .then(response => {
                if (response.ok) {
                    window.location.href = "index.php";
                }
            })
        }
    });
});
