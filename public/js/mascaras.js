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

//----------------------------------------------------------------

// Forçar inicio com Pessoa fisica CPF
document.getElementById("key").setAttribute("onkeypress", "mascaraMutuario(this,Cpf),limitarInputCpf(this)");
document.getElementById("key").setAttribute("onblur", "");
// Controle para pegar os valores das opções selecionadas 
// e aplicar as funções de cada mascara
function exibeMsg( valor )
{
  if(valor == 1){
    document.getElementById("key").setAttribute("onkeypress", "mascaraMutuario(this,Cpf),limitarInputCpf(this),Verifica(this)");

  }else if(valor == 2){
    document.getElementById("key").setAttribute("onkeypress", "mascaraMutuario(this,Cnpj),limitarInputCnpj(this)");
  }
}
function mascaraMutuario(o,f){
    v_obj=o
    v_fun=f
    setTimeout('execmascara()',1)
  }
  function execmascara(){
    v_obj.value=v_fun(v_obj.value)
  }
  
  // Mascara do CPF
  function Cpf(v){
  
    //Remove tudo o que não é dígito
    v=v.replace(/\D/g,"")
  
       //Coloca um ponto entre o terceiro e o quarto dígitos
       v=v.replace(/(\d{3})(\d)/,"$1.$2")
  
       //Coloca um ponto entre o terceiro e o quarto dígitos
       //de novo (para o segundo bloco de números)
       v=v.replace(/(\d{3})(\d)/,"$1.$2")
  
       //Coloca um hífen entre o terceiro e o quarto dígitos
       v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
      
   return v
  }
