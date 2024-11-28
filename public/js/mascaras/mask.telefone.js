// Função que aplica a máscara de telefone ao valor do campo
function mascaraTelefone(o, f) {
    setTimeout(function() {
        o.value = f(o.value);  // Aplica a função de formatação ao valor do campo após 1 milissegundo
    }, 1);
}

// Função que define a formatação do número de telefone
function mtel(v) {
    v = v.replace(/\D/g, "");  // Remove todos os caracteres que não são números
    v = v.replace(/^(\d{2})(\d)/g, "($1) $2");  // Formata o código de área (2 primeiros dígitos) entre parênteses
    v = v.replace(/(\d)(\d{4})$/, "$1-$2");  // Adiciona o hífen após os 4 últimos dígitos

    return v;  // Retorna o número de telefone formatado
}

// Função que retorna um elemento pelo ID
function id(idName) {
    return document.getElementById(idName);  // Retorna o elemento DOM com o ID fornecido
}

// Função chamada quando a página é carregada
window.onload = function() {
    const telefoneInput = id('telefone');  // Obtém o campo de entrada com o ID 'telefone'
    
    // Verifica se o campo de telefone existe na página
    if (telefoneInput) {
        telefoneInput.onkeyup = function() {  // Quando a tecla é liberada (keyup), aplica a máscara
            mascaraTelefone(this, mtel);  // Chama a função de máscara de telefone com a função mtel
        };
    }
};
