const routes = {
    login: "/login",        // Exemplo de rota para login
    register: "/empresa/register",  // Exemplo de rota para registro
    home: "/",              // Exemplo de rota para a home
};
const currentUrl = window.location.href;

const dynamicButton = document.getElementById("dynamicButton");

if (currentUrl.includes("/empresa/register") || currentUrl.includes("/login") || currentUrl.includes("/empresa/dashboard")) {
    dynamicButton.setAttribute("href", routes.home);
}
document.getElementsByClassName('voltarBtn')[0].addEventListener("click", function () {
    history.back();
});
