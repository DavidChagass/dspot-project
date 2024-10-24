// Dropdown
document.getElementById("bnt-dropdown").addEventListener("click", function(event) {
    var dropdown = document.getElementById("dropdown");
    dropdown.classList.toggle("hidden");
    event.stopPropagation(); // Impede que o clique no botão feche a dropdown imediatamente
});

// Fecha a dropdown se o usuário clicar fora dela
document.addEventListener("click", function(event) {
    var dropdown = document.getElementById("dropdown");
    if (!dropdown.classList.contains("hidden") && !event.target.closest("#bnt-dropdown")) {
        dropdown.classList.add("hidden");
    }
});