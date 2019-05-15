// CHRISTIAN

// MARCELO

// JAVIER

function mostrar() {
	let nombre = document.frmEventos.txtNombre.value;
	let edad = parseInt(document.frmEventos.txtEdad.value);
	let msj = 'Hola ' + nombre + '. Este año cumples: ' + (edad + 1) + ' años. ';

	if (edad < 18) {
		msj += 'Eres menor de edad';
	} else {
		msj += 'Eres mayor de edad';
	}

	//alert(msj);
	capa = document.getElementById('msj');
	//capa.innerText = msj;
	capa.innerHTML = '<div style="color:white;">' + msj + '</div>';
}

function cambiarEstilos() {
	let color = document.frmEstilos.txtColor.value;	
    let fondo = document.frmEstilos.txtFondo.value;
    let capa = document.getElementById('capa');
	capa.style.color = color;
	capa.style.backgroundColor = fondo;
}
// FABIAN CR7 uff

// DAVID
//Que fuego broer
