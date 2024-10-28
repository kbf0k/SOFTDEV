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
