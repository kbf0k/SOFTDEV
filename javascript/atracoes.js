window.onload = animacao
let index = 0;

function move(direction) {
    const items = document.querySelectorAll('.item');
    const totalItems = items.length;
    index += direction;

    if (index < 0) {
        index = totalItems - 1;
    } else if (index >= totalItems) {
        index = 0;
    }

    const carrossel = document.querySelector('.carrossel');
    carrossel.style.transform = `translateX(-${index * 25}%)`;
}

function animacao(){
    intervalo = setInterval(() =>{
        move(1);
    },3000)
}

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
