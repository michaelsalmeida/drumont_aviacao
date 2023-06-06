var quantAnimal = 1;

function agrdeu() {
  var quantPass = document.getElementById('quant').value
  executeFunctions(document.getElementById('ida').value, (response) => {
    quantAviao = response
  })
  
  if (quantAnimal <= quantPass) {
    if (quantAviao < 6) {
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
      alert("Limite de animais atingido, o avião não irá levar mais animais!!");
    }

  } else {
    alert("Limite de animais atingido, por favor insira mais um passageiro!!");
  }
}

function executeFunctions(idIda, callback) {
    var xhr = new XMLHttpRequest();
    // Executa o arquivo que irá iniciar a função
    xhr.open("GET", location.origin + `/drumont_aviacao/functions.php?qtdani=${quantAnimal}&partida=${idIda}`, false);
    xhr.onload = function () {
        if (xhr.readyState === xhr.DONE && xhr.status === 200) {
            callback(xhr.responseText) // Pega a resposta do servidor
        }
    };
    xhr.send();
}
