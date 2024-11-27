document.getElementById('logout').addEventListener('click', () => {
    Swal.fire({
        title: "Você deseja sair?",
        text: "Não será possível reverter isso",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
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

    document.getElementById('add-item').addEventListener('click', function() {
        const container = document.getElementById('selections-container');
        const newItem = document.createElement('div');
        newItem.classList.add('menu-item');
        newItem.innerHTML = `
            <label for="new-item">Escolha um Item:</label>
            <select name="itens[]" class="menu-select">
                <option value="massas|Coxinha">Massa - Coxinha</option>
                <option value="massas|Bolinhas de queijo">Massa - Bolinhas de queijo</option>
                <option value="massas|Risole">Massa - Risole</option>
                <option value="sorvetes|Chocolate">Sorvete - Chocolate</option>
                <option value="sorvetes|Flocos">Sorvete - Flocos</option>
                <option value="sorvetes|Morango">Sorvete - Morango</option>
                <option value="bebidas|Refrigerante">Bebida - Refrigerante</option>
                <option value="bebidas|Suco">Bebida - Suco</option>
                <option value="bebidas|Água">Bebida - Água</option>
                <option value="sobremesas|Pudim">Sobremesa - Pudim</option>
                <option value="sobremesas|Bolo de Cenoura">Sobremesa - Bolo de Cenoura</option>
                <option value="sobremesas|Mini-tortas">Sobremesa - Mini-tortas</option>
                <option value="acompanhamento|Pipoca">Acompanhamento - Pipoca</option>
                <option value="acompanhamento|Algodão Doce">Acompanhamento - Algodão Doce</option>
                <option value="acompanhamento|Gelatina">Acompanhamento - Gelatina</option>
            </select>
        `;
        container.appendChild(newItem);
    });
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