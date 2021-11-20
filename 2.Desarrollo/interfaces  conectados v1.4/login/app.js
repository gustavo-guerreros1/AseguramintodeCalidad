document.addEventListener('DOMContentLoaded',function(){
    crearLista();

});

 
async function crearLista(){
    const bd = await fetch('./listado.json');
    const resultado = await bd.json();
    console.log(resultado);
    const{servicios} = resultado;
    
    servicios.forEach(servicio => {
        const{id,nombre,precio} = servicio;

        const nombreServicio = document.createElement('P');
        nombreServicio.textContent = nombre;
        nombreServicio.classList.add('nombre-servicio');

        const precioServicio = document.createElement('P');
        precioServicio.textContent='$ '+precio;
        precioServicio.classList.add('precrio-servicio');


        const divServicio = document.createElement('DIV');
        divServicio.classList.add('divServicios');

        divServicio.onclick = seleccionarServicio;
        divServicio.dataset.idServicio=id;

        divServicio.appendChild(nombreServicio);
        divServicio.appendChild(precioServicio);

        document.querySelector('.lista').appendChild(divServicio);
    });
}

function seleccionarServicio(e){
    console.log(e.target.parentElement);//padre
    console.log(e.target);//padre inmediato
    console.log(e.target.tagName);//tipo de etiqueta
    let elemento;
    if(e.target.tagName=='P'){
        elemento = e.target.parentElement;
    }else{
        elemento = e.target;
    }

    if(elemento.classList.contains('selector')){
        elemento.classList.remove('selector');
    }else{
        elemento.classList.add('selector');
    }


}