function doDepoiment() {
    var depoimento = prompt("Escreva seu depoimento:");
  
    if (depoimento !== null && depoimento.trim() !== "") {
      document.getElementById("depoimento-text").textContent = depoimento;
    } else {
      alert("Por favor, escreva algo antes de enviar.");
    }
  }
  // script.js

document.querySelectorAll('.accordion-button').forEach(button => {
    button.addEventListener('click', () => {
      // Toggle active class to highlight the clicked button
      button.classList.toggle('active');
      
      // Toggle the content display
      const content = button.nextElementSibling;
      if (content.style.display === 'block') {
        content.style.display = 'none';
      } else {
        // Hide all other content elements
        document.querySelectorAll('.accordion-content').forEach(c => {
          c.style.display = 'none';
        });
        content.style.display = 'block';
      }
    });
  });
  