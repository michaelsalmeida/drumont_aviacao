var quantAnimal = 1;

function agrdeu() {
  var quantPass = document.getElementById('quant').value

  if (quantAnimal <= quantPass) {

    var linhaAnimal = document.getElementById(`animal${quantAnimal}`)
    document.getElementById('quantAnimal').value = 
    parseInt(document.getElementById('quantAnimal').value) + 1

    document.getElementById("labelCheck").style.display = "block";

    document.getElementsByName("checkVac")[0].style.display = "block";
    document.getElementsByName("checkVac")[0].required = true;

    linhaAnimal.style.display = "flex";
    document.getElementsByName(`nome_animal${quantAnimal}`)[0].required = true;

    linhaAnimal.style.gap = "24px";
    linhaAnimal.style.marginBottom = "24px";
    quantAnimal += 1;

  } else {
    alert("Limite de animais atingido!!");
  }
}



function executeFunctions() {
    // Define as variaveis necessárias no caso da função for acionada pelo botão de agendar
    extra = `&qtdani=${quantAnimal}`

    var xhr = new XMLHttpRequest();
    // Executa o arquivo que irá iniciar a função
    xhr.open("GET", location.origin + `/drumont-aviacao/functions.php?${extra}`, false);
    xhr.onload = function () {
        if (xhr.readyState === xhr.DONE && xhr.status === 200) {
            var response = xhr.responseText; // Pega a resposta do servidor
            location.href = response; // Segue a url voltada do servidor
        }
    };
    xhr.send();
}
