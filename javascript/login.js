function voltar() {
    window.history.back();
}

window.onload = function () {
    if (window.history.length > 2){
        document.getElementById('voltar').style.visibility = "visible";
    }
    else{
        document.getElementById('voltar').style.visibility = "hidden";
    }
}