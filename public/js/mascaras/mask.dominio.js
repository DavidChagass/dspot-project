// Mascara de Domínio
document.getElementById("dominio").setAttribute("onkeypress", "mascaraMutuario(this,dom),limitarInputDom(this)");
document.getElementById("dominio").setAttribute("onblur", "");


function mascaraMutuario(o,f){
    v_obj=o
    v_fun=f
    setTimeout('execmascara()',1)
}

function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}

function dom(v){
    v=v.replace(/\D/g,"")
    v=v.replace(/(\d{5})(\d)/,"$1-$2*")
   return v
}

function limitarInputDom(obj) {
    obj.value = obj.value.substring(0,9);
}

function soNums(e)
{
	if (document.all){var evt=event.keyCode;}
	else{var evt = e.charCode;}
	if (evt <20 || (evt >47 && evt<58)){return true;}
	return false;
}