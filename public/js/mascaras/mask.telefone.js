function mascaraTelefone(o, f) {
    setTimeout(function() {
        o.value = f(o.value);
    }, 1);
}

function mtel(v) {
    v = v.replace(/\D/g, ""); 
    v = v.replace(/^(\d{2})(\d)/g, "($1) $2");
    v = v.replace(/(\d)(\d{4})$/, "$1-$2"); 

    return v;
}

function id(idName) {
    return document.getElementById(idName);
}

window.onload = function() {
    const telefoneInput = id('telefone');
    if (telefoneInput) {
        telefoneInput.onkeyup = function() {
            mascaraTelefone(this, mtel);
        };
    }
};