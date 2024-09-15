document.addEventListener('DOMContentLoaded', function () {
    var modal = document.getElementById('custom-menu-modal');
    var openModalBtn = document.getElementById('open-modal');
    var closeModalBtn = document.getElementsByClassName('close')[0];
    var saveButton = document.getElementById('save-custom-menu');

    // Função para abrir o modal
    openModalBtn.onclick = function () {
        modal.style.display = 'block';
    }

    // Função para fechar o modal
    closeModalBtn.onclick = function () {
        modal.style.display = 'none';
    }

    // Fechar o modal se o usuário clicar fora do conteúdo do modal
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }

    // Salvar o cardápio personalizado
    if (saveButton) {
        saveButton.addEventListener('click', () => {
            const selectedMassas = document.getElementById('massas').value;
            const selectedSorvetes = document.getElementById('sorvetes').value;
            const selectedBebidas = document.getElementById('bebidas').value;
            const selectedSobremesas = document.getElementById('sobremesas').value;

            const customMenu = {
                massas: selectedMassas,
                sorvetes: selectedSorvetes,
                bebidas: selectedBebidas,
                sobremesas: selectedSobremesas
            };

            // Salvar no localStorage
            localStorage.setItem('customMenu', JSON.stringify(customMenu));

            alert('Cardápio salvo com sucesso!');
            modal.style.display = 'none';
        });
    }

    // Carregar o cardápio salvo ao recarregar a página
    function loadCustomMenu() {
        const savedMenu = localStorage.getItem('customMenu');
        if (savedMenu) {
            const menu = JSON.parse(savedMenu);
            document.getElementById('massas').value = menu.massas;
            document.getElementById('sorvetes').value = menu.sorvetes;
            document.getElementById('bebidas').value = menu.bebidas;
            document.getElementById('sobremesas').value = menu.sobremesas;
        }
    }

    // Carregar o cardápio salvo quando a página for carregada
    loadCustomMenu();
});


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

const carouselSlide = document.querySelector('.carousel-slide');
const images = document.querySelectorAll('.carousel-slide img');

const prevButton = document.getElementById('prev');
const nextButton = document.getElementById('next');
const dots = document.querySelectorAll('.dot');

let counter = 1; // Começamos em 1, já que a primeira imagem agora é a última duplicada
const size = images[0].clientWidth;

// Inicializa a posição correta
carouselSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';

// Função que atualiza a posição do carrossel
function updateCarousel() {
    carouselSlide.style.transition = 'transform 0.5s ease-in-out';
    carouselSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';

    // Atualiza os dots corretamente
    dots.forEach(dot => dot.classList.remove('active'));
    if (counter >= 1 && counter <= dots.length) {
        dots[counter - 1].classList.add('active');
    }
}

// Função que remove a transição e teleporta para a imagem correta
function teleportCarousel() {
    carouselSlide.style.transition = 'none'; // Remove a animação
    if (counter === images.length - 1) {
        counter = 1; // Teleporta para a primeira imagem
        carouselSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';
    }
    if (counter === 0) {
        counter = images.length - 2; // Teleporta para a última imagem
        carouselSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';
    }
}

// Avançar no carrossel
nextButton.addEventListener('click', () => {
    if (counter >= images.length - 1) return;
    counter++;
    updateCarousel();
});

// Retroceder no carrossel
prevButton.addEventListener('click', () => {
    if (counter <= 0) return;
    counter--;
    updateCarousel();
});

// Checa quando a transição acaba para fazer o teleporte
carouselSlide.addEventListener('transitionend', teleportCarousel);

// Controle de dots
dots.forEach((dot, index) => {
    dot.addEventListener('click', () => {
        counter = index + 1; // Ajusta para a nova estrutura de imagens
        updateCarousel();
    });
});

