// Obtém os elementos necessários para manipulação
const toggleButton = document.getElementsByClassName("toggle-button")[0];  // Botão para alternar visibilidade da senha
const inpPassword = document.getElementsByClassName("inpPassword")[0];  // Campo de entrada da senha
const svgAtiv = document.getElementById("passDesativo");  // Ícone de olho aberto (senha visível)
const svgDesativ = document.getElementById("passAtivo");  // Ícone de olho fechado (senha oculta)
const form = document.getElementById("meuFormulario");  // Formulário onde a senha será enviada
const submitButton = document.getElementById("submitButton");  // Botão de envio do formulário

// Inicializa o tipo do campo de senha como "password" (oculta)
inpPassword.setAttribute("type", "password");

// Evento de clique no botão para alternar a visibilidade da senha
toggleButton.addEventListener("click", function (e) {
    e.preventDefault();  // Impede o comportamento padrão (evitar o envio acidental do formulário ao clicar no botão)

    // Verifica se o ícone de senha está visível e alterna entre mostrar e esconder a senha
    if (svgDesativ.classList.contains("hidden")) {
        inpPassword.setAttribute("type", "text");  // Torna a senha visível
        svgDesativ.classList.remove("hidden");  // Exibe o ícone de olho aberto
        svgAtiv.classList.add("hidden");  // Esconde o ícone de olho fechado
    } else {
        inpPassword.setAttribute("type", "password");  // Torna a senha oculta novamente
        svgAtiv.classList.remove("hidden");  // Exibe o ícone de olho fechado
        svgDesativ.classList.add("hidden");  // Esconde o ícone de olho aberto
    }
});

// Evento de clique no botão de envio do formulário
submitButton.addEventListener("click", function (e) {
    // Aqui você pode adicionar validações ou outras lógicas antes de enviar o formulário
    console.log("Formulário enviado!");  // Exibe uma mensagem no console

    // Envia o formulário
    form.submit();  // Envia o formulário de forma programática
});
