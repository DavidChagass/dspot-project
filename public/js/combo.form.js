 // Seleciona os elementos
 const comboBox = document.getElementById('combo');
 const inputCampo = document.getElementById('campo');

 // Adiciona o evento 'change' ao combo box
 comboBox.addEventListener('change', function () {
     if (this.value === "0") { // Verifica se a opção "Não" foi selecionada
         inputCampo.classList.add('disabled'); // Adiciona a classe 'disabled' (estilo desativado)
         inputCampo.disabled = true; // Desabilita o campo de data
     } else {
         inputCampo.classList.remove('disabled'); // Remove a classe 'disabled'
         inputCampo.disabled = false; // Reativa o campo de data
     }
 });