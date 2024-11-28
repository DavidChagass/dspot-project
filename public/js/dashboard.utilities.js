// Ação do botão para abrir ou fechar o dropdown
document.getElementById("btn-dropdown").addEventListener("click", function(event) {
    var dropdown = document.getElementById("dropdown");  // Obtém o elemento do dropdown
    dropdown.classList.toggle("hidden");  // Alterna a visibilidade do dropdown, mostrando ou escondendo
    event.stopPropagation();  // Impede que o clique no botão feche o dropdown imediatamente (evita o comportamento padrão)
});

// Fecha o dropdown se o usuário clicar fora dele
document.addEventListener("click", function(event) {
    var dropdown = document.getElementById("dropdown");  // Obtém o elemento do dropdown
    // Verifica se o dropdown está visível e se o clique não foi no botão de abertura do dropdown
    if (!dropdown.classList.contains("hidden") && !event.target.closest("#btn-dropdown")) {
        dropdown.classList.add("hidden");  // Esconde o dropdown se o clique for fora dele
    }
});
