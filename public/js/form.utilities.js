document.addEventListener("DOMContentLoaded", function (event) {
    const toggleButton = document.getElementsByClassName("toggle-button")[0];
    const inpPassword = document.getElementsByClassName("inpPassword")[0];
    const svgAtiv = document.getElementById("passDesativo");
    const svgDesativ = document.getElementById("passAtivo");

    if (!toggleButton || !inpPassword || !svgAtiv || !svgDesativ) {
        console.error("Elementos necessários não encontrados!");
        return;
    }

    inpPassword.setAttribute("type", "password");

    toggleButton.addEventListener("click", function (e) {
        e.preventDefault(); // Impede o comportamento padrão (envio de formulário)

        if (svgDesativ.classList.contains("hidden")) {
            inpPassword.setAttribute("type", "text");
            svgDesativ.classList.remove("hidden");
            svgAtiv.classList.add("hidden");
        } else {
            inpPassword.setAttribute("type", "password");
            svgAtiv.classList.remove("hidden");
            svgDesativ.classList.add("hidden");
        }
    });
});

document.getElementsByClassName("voltarBtn")[0].addEventListener("click", function() {
    history.back();
});