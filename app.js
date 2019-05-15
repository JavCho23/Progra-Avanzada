var max = 0 ;
var min;
var sw = true;
function registrar() {
    let tipo = document.frmEgresos.cdbTipo.value;
    let monto = document.getElementById("txtMonto").value;
    let lista = document.getElementById("listadoEgresos");

    if (max < monto) {
        max= monto;
    }
    if(sw){
        min = monto;
        sw = false
    } 
    if (min>monto) {
        min=monto
    }
    let maxmin = document.getElementById("Maxmin");
    maxmin.innerHTML = '<div style="color:white;"> Maximo Egreso: ' + max  +' Minimo: '+ min +  '</div>';
    lista.innerHTML = lista.innerHTML + ' <div style="color:white;"> Tipo: ' + tipo  +' Monto: '+ monto +  '</div>'; 
}
