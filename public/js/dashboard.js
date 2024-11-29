// Evento para abrir e fechar o dropdown quando o botão é clicado
document.getElementById("btn-dropdown").addEventListener("click", function(event) {
    var dropdown = document.getElementById("dropdown");
    dropdown.classList.toggle("hidden");  // Alterna a visibilidade do dropdown
    event.stopPropagation(); // Impede que o clique no botão feche a dropdown imediatamente
});

// Fecha o dropdown se o usuário clicar fora dele
document.addEventListener("click", function(event) {
    var dropdown = document.getElementById("dropdown");
    if (!dropdown.classList.contains("hidden") && !event.target.closest("#btn-dropdown")) {
        dropdown.classList.add("hidden");  // Fecha o dropdown se o clique não for no botão
    }
});