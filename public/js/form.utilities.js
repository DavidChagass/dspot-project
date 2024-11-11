document.getElementsByClassName("toggle-button")[0].addEventListener("click", function () {
    const svgAtiv = document.getElementById("passDesativo");
    const svgDesativ = document.getElementById("passAtivo");

    if (svgDesativ.classList.contains('hidden')) {
        svgDesativ.classList.remove('hidden');
        svgAtiv.classList.add("hidden");
    } else {
        svgAtiv.classList.remove('hidden');
        svgDesativ.classList.add("hidden");
    }

});

document.getElementById("voltarBtn").addEventListener("click", function() {
    history.back();
});