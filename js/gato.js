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