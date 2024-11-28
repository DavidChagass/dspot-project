// Máscara para o campo de domínio
// Adiciona eventos de formatação e limitação de entrada ao campo de texto 'dominio'
document.getElementById("dominio").setAttribute("onkeypress", "mascaraMutuario(this,dom),limitarInputDom(this)");
document.getElementById("dominio").setAttribute("onblur", "");  // Limpa o evento de desfocar (onblur) se não for necessário

// Função que ativa a máscara e a limitação de caracteres para o campo 'dominio'
function mascaraMutuario(o, f) {
    v_obj = o;  // Atribui o objeto do campo ao qual a máscara será aplicada
    v_fun = f;  // Atribui a função da máscara a ser usada (neste caso, a função 'dom')
    setTimeout('execmascara()', 1);  // Chama a função 'execmascara' após 1 milissegundo para aplicar a máscara
}

// Função que executa a máscara de formatação no valor do campo
function execmascara() {
    v_obj.value = v_fun(v_obj.value);  // Aplica a função de máscara ao valor do campo
}

// Função que define a máscara do domínio, removendo caracteres não numéricos e formatando o número
function dom(v) {
    v = v.replace(/\D/g, "");  // Remove todos os caracteres que não são números
    v = v.replace(/(\d{5})(\d)/, "$1-$2*");  // Formata a string para o formato 'XXXXX-XXXXX*'
    return v;  // Retorna o valor formatado
}

// Função que limita o número de caracteres digitados no campo 'dominio' para 9 caracteres
function limitarInputDom(obj) {
    obj.value = obj.value.substring(0, 9);  // Limita o valor para no máximo 9 caracteres
}

// Função que permite apenas a digitação de números
function soNums(e) {
    if (document.all) {
        var evt = event.keyCode;  // Para navegadores antigos (Internet Explorer)
    } else {
        var evt = e.charCode;  // Para navegadores modernos
    }
    // Permite a digitação de teclas com código abaixo de 20 (control e funções) e números de 48 a 57
    if (evt < 20 || (evt > 47 && evt < 58)) {
        return true;  // Permite a digitação de números
    }
    return false;  // Bloqueia a digitação de qualquer outra tecla
}
