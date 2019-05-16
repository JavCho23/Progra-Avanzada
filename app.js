var EstadoA = true, EstadoC = true;
function ocultarA(){
  if (EstadoA) {
      document.getElementById("aspiraciones__content").style.display ="none";
      EstadoA = false;
  } else{
    document.getElementById("aspiraciones__content").style.display ="flex";
    EstadoA = true;
  }
};
function ocultarC(){
    if (EstadoC) {
        document.getElementById("campo__content").style.display ="none";
        EstadoC = false;
    } else{
      document.getElementById("campo__content").style.display ="flex";
      EstadoC = true;
    }
  };

  function agregar() {
    let edad = document.getElementById("edad").value;
    let nombre = document.getElementById("nombre").value;
    let sexo = document.getElementById("sexo").value;
    let lista = document.getElementById("lista");
   
    if (edad < 18) {
        lista.innerHTML = lista.innerHTML+ '<div class="Menor"> <h4>Edad: '+ edad+' Nombre: ' + nombre  +' Sexo: '+ sexo +  '</h4></div>';
    }else {
        lista.innerHTML = lista.innerHTML+ '<div class="Mayor"> <h4>Edad: '+ edad+' Nombre: ' + nombre  +' Sexo: '+ sexo +  '</h4></div>';
    }

  }