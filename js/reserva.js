const quero_ir = document.getElementById('apenas_ida'); //Variável que recebe a checkbox

//Função verificando se a checkbox foi alterada
quero_ir.addEventListener('change', function() {
    const input_volta = document.getElementById('data_volta'); // Variável que recebe o input

    // Se a checkbox estiver selecionada, o input será disativado, senão, permanecerá operando
    if(quero_ir.checked === true){
        input_volta.disabled = true;
    }else{
        input_volta.disabled = false;
    }
  });
// Esse código serve para caso o cliente queira uma passagem só de ida.