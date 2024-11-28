// Texto base que será alterado
const baseText = "O melhor lugar para o seu estoque.";

// Palavras a serem substituídas no texto base
const wordsToChange = ["o seu estoque", "a sua empresa", "o seu sucesso", "os seus resultados"];

// Elemento HTML onde o texto será digitado (tipo máquina de escrever)
const typewriterElement = document.getElementById("typewriter");

// Variáveis para controle de índice de caractere e palavra
let index = 0;
let wordIndex = 0; 

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

// Manipulador do evento de envio do formulário de contato
document.getElementById('contactForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Impede o envio do formulário
    alert('Mensagem enviada com sucesso!'); // Exibe a mensagem de sucesso
    this.reset();  // Reseta o formulário
});

// Manipulador do evento de envio do formulário de contato com validação
document.getElementById('contactForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Impede o envio do formulário
    // Obtém os valores dos campos do formulário
    const name = this.querySelector('input[type="text"]').value;
    const email = this.querySelector('input[type="email"]').value;
    const message = this.querySelector('textarea').value;

    // Valida se todos os campos foram preenchidos
    if (name && email && message) {
        alert('Mensagem enviada com sucesso!'); // Exibe mensagem de sucesso
        this.reset(); // Reseta o formulário
    } else {
        alert('Por favor, preencha todos os campos.'); // Exibe mensagem de erro
    }
});

// Função para digitar o texto com base na substituição da palavra
function type() {

    // Substitui a palavra na frase com base no índice atual
    const modifiedText = baseText.replace(/o seu estoque/, wordsToChange[wordIndex]);
    
    // Limpa o texto exibido na tela e reinicia o índice
    typewriterElement.textContent = '';
    index = 0;

    // Função para digitar o texto modificado, caractere por caractere
    function typeModifiedText() {
        if (index < modifiedText.length) {
            // Adiciona o próximo caractere ao texto exibido
            typewriterElement.textContent += modifiedText.charAt(index);
            index++; // Avança para o próximo caractere
            setTimeout(typeModifiedText, 100); // Chama a função novamente após 100ms
        } else {
            // Após terminar de digitar o texto, aguarda 2 segundos e reinicia com a próxima palavra
            setTimeout(() => {
                wordIndex = (wordIndex + 1) % wordsToChange.length; // Aumenta o índice da palavra, reiniciando após o último índice
                type(); // Chama a função novamente com a nova palavra
            }, 2000);
        }
    }

    // Inicia a digitação do texto
    typeModifiedText();
}

// Chama a função pela primeira vez para iniciar o efeito de digitação
type();
