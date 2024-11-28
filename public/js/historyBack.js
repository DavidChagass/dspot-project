// Define as rotas do aplicativo
const routes = {
    login: "/login",                // Rota para a página de login
    register: "/empresa/register",  // Rota para a página de registro de empresa
    home: "/",                      // Rota para a página inicial (home)
};

// Obtém a URL atual da página
const currentUrl = window.location.href;

// Obtém o botão dinâmico que será alterado conforme a URL
const dynamicButton = document.getElementById("dynamicButton");

// Verifica se a URL atual contém alguma das rotas especificadas
if (currentUrl.includes("/empresa/register") || currentUrl.includes("/login") || currentUrl.includes("/empresa/dashboard") || currentUrl.includes("/gerente/dashboard") || currentUrl.includes("/funcionario/dashboard")) {
    // Altera o atributo "href" do botão dinâmico para a rota de home
    dynamicButton.setAttribute("href", routes.home);
}
else if (currentUrl.includes("/gerente/register")) {
    dynamicButton.classList.toggle('voltarBtn');
}

// Adiciona um evento de clique ao botão de voltar (com a classe 'voltarBtn')
// Este evento faz o navegador voltar à página anterior
document.getElementsByClassName('voltarBtn')[0].addEventListener("click", function () {
    history.back();  // Volta para a página anterior no histórico de navegação
});
