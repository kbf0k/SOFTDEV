function doDepoiment() {
  var depoimento = prompt("Escreva seu depoimento:")
  var novoNome = prompt("Escreva seu Nome:");

  if (depoimento !== null && depoimento.trim() !== "") {
    document.getElementById("depoimento-text").textContent = depoimento;
    document.getElementById("name-title").textContent = novoNome;
  } else {
    alert("Por favor, escreva algo antes de enviar.");
  }
}
function menuShow() {
  let menuMobile = document.querySelector('.mobile-menu');
  if (menuMobile.classList.contains('open')) {
      menuMobile.classList.remove('open')
      document.querySelector('.icon').src = "../img/menu_white_36dp.svg"
  } else {
      menuMobile.classList.add('open')
      document.querySelector('.icon').src = "../img/close_white_36dp.svg"
  }
}

var exampleModal = document.getElementById('exampleModal')
exampleModal.addEventListener('show.bs.modal', function (event) {

  var modalTitle = exampleModal.querySelector('.modal-title')
  var modalBodyInput = exampleModal.querySelector('.modal-body input')

  modalTitle.textContent = 'Faça seu Depoimento'
  modalBodyInput.value = ''
})
