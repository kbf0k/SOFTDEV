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