const baseText = "O melhor lugar para o seu estoque.";
const wordsToChange = ["o seu estoque", "a sua empresa", "o seu sucesso", "os seus resultados"];
const typewriterElement = document.getElementById("typewriter");
let index = 0;
let wordIndex = 0; 

// Dropdown
document.getElementById("btn-dropdown").addEventListener("click", function(event) {
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

document.getElementById('contactForm').addEventListener('submit', function (event) {

    event.preventDefault();
    alert('Mensagem enviada com sucesso!');
    this.reset();
});

document.getElementById('contactForm').addEventListener('submit', function (event) {

    event.preventDefault();
    const name = this.querySelector('input[type="text"]').value;
    const email = this.querySelector('input[type="email"]').value;
    const message = this.querySelector('textarea').value;

    if (name && email && message) {
        alert('Mensagem enviada com sucesso!');
        this.reset();
    } else {
        alert('Por favor, preencha todos os campos.');
    }
});

function type() {

    // Substitui a palavra na frase com base no índice atual
    const modifiedText = baseText.replace(/o seu estoque/, wordsToChange[wordIndex]);
    // Limpa o texto atual
    typewriterElement.textContent = '';
    index = 0;
    // Função para digitar o texto modificado

    function typeModifiedText() {

        if (index < modifiedText.length) {
            typewriterElement.textContent += modifiedText.charAt(index);
            index++;
            setTimeout(typeModifiedText, 100); // Tempo entre cada letra (100ms)
        } else {
            // Aguarda 2 segundos e inicia novamente
            setTimeout(() => {
                wordIndex = (wordIndex + 1) % wordsToChange.length; // Aumenta o índice da palavra
                type(); // Inicia novamente com a nova palavra
            }, 2000);
        }
    }
    typeModifiedText();
}
type();