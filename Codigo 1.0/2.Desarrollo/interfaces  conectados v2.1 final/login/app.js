let pagina=1;
const areas = {
    nombre:'',
    fecha:'',
    hora:'',
    servicios:[]
};


document.addEventListener('DOMContentLoaded',function(){
    crearLista();

    mostrarPagina();

    cambiarSeccion();

    
    nombreCita();

    fechaCita();

    desabilitarFechaAnterior();

    horaCita();

    resumen();
});

 
async function crearLista(){
    const bd = await fetch('./listado.json');
    const resultado = await bd.json();
   // console.log(resultado);
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
    //console.log(e.target.parentElement);//padre
    //console.log(e.target);//padre inmediato
    //console.log(e.target.tagName);//tipo de etiqueta
    let elemento;
    if(e.target.tagName=='P'){
        elemento = e.target.parentElement;
    }else{
        elemento = e.target;
    }

    if(elemento.classList.contains('selector')){
        elemento.classList.remove('selector');
        const id = parseInt(elemento.dataset.idServicio);
        eliminarServicio(id);
    }else{
        elemento.classList.add('selector');
        const servicioObj = {
            id: parseInt(elemento.dataset.idServicio),
            nombre: elemento.firstElementChild.textContent,
            precio: elemento.firstElementChild.nextElementSibling.textContent
        }
        agregarServicio(servicioObj);
    }
}

function agregarServicio(servicioObj){

    const {servicios} = areas;
    console.log(areas);
    areas.servicios = [...servicios,servicioObj];
}

function eliminarServicio(id){
    const {servicios} = areas;
    console.log(areas);
    areas.servicios = servicios.filter(servicio => servicio.id != id);
}


function mostrarPagina(){
    
    //selecciono el anterior, si este noe xiste se le pone la clase al siguiente o si existe se le quita al anterior y se le pone al siguiente
    const paginaAnterior = document.querySelector ('.mostrar-seccion');
    if(paginaAnterior){
        paginaAnterior.classList.remove('mostrar-seccion');
    }

    const paginaActual = document.querySelector('#paso-'+pagina);
    paginaActual.classList.add('mostrar-seccion');

    const tabAnterior = document.querySelector('.tab .pintar');
    if(tabAnterior){
        tabAnterior.classList.remove('pintar');
    }
    const tabSigiente = document.querySelector('[data-paso='+'"'+pagina+'"'+']');
    tabSigiente.classList.add('pintar');
    resumen();
}


function cambiarSeccion(){
    const enlaces = document.querySelectorAll('.tab button');
    enlaces.forEach(enlace =>{
        enlace.addEventListener('click',e =>{
            e.preventDefault();
            pagina = parseInt(e.target.dataset.paso);
            mostrarPagina();
        });
    });
}



function mostrarAlerta(mostrarMensaje ,tipo){
    //console.log('el mensaje es:::'+mostrarMensaje);
    const alertaPrevi = document.querySelector('.alerta');
    if(alertaPrevi){
        document.querySelector('.alerta').remove('.alerta');
        //return;
    }
    const alerta = document.createElement('DIV');
    alerta.textContent = mostrarMensaje;
    alerta.classList.add('alerta');
    if(tipo==='error'){
        alerta.classList.add('error');
    }
    //console.log(alerta);
    const formulario = document.querySelector('.formulario');
    formulario.appendChild(alerta);

    //eliminar alerta despues de un tiempo
    setTimeout(()=>{
        alerta.remove();
    },2000);
}

function nombreCita(){
        const nombreFormulario = document.querySelector('#nombre');
        nombreFormulario.addEventListener('input',(e)=>{
        const nombreTexto = e.target.value;
        
        //validacion
        if(nombreTexto==='' || nombreTexto.length<3){
            mostrarAlerta('Nombre no valido','error');
            return ;
        }
            areas.nombre = nombreTexto;
            //mostrarAlerta('Nombre  valido');
            //console.log(areas);
    });
}

function fechaCita(){
    const fechaInput = document.querySelector('#fecha');
    fechaInput.addEventListener('input',(e)=>{
       
       /* const opciones = {
            weekday: 'long',
            year: 'numeric',
            month: 'long'
        }*/
        const dia = new Date(e.target.value).getUTCDay();
        
        if([0,6].includes(dia)){
            e.preventDefault();
            fechaInput.value='';
            mostrarAlerta('No hay atencion el dia seleccionado','error');
            return;
        }
        areas.fecha=fechaInput.value;
            //console.log(cita);
            //console.log(areas);
        
        //console.log(dia.toLocaleDateString('es-ES',opciones));
    });
}

function desabilitarFechaAnterior(){
    const inputFecha = document.querySelector('#fecha');
    const fechaAhora = new Date();
    const year = fechaAhora.getFullYear();
    const mes = fechaAhora.getMonth()+1;
    const dia = fechaAhora.getDate()+1;

    const fechaDeshabilitar = year+'-'+mes+'-'+dia;
    inputFecha.min = fechaDeshabilitar;
}

function horaCita(){
    const inputHora = document.querySelector('#hora');
    inputHora.addEventListener('input',(e)=>{
        const horaReserva = e.target.value;
        const hora = horaReserva.split(':');
        //console.log(hora);
        if(hora[0]<9 || hora[0]>18){
            e.preventDefault();
            inputHora.value='';
            mostrarAlerta('Hora no valida','error');
            return;
        }
        areas.hora = horaReserva;
        //console.log(areas);
    });   
}

function resumen(){
    const {nombre,fecha,hora,servicios}=areas;
    const noInfo = document.querySelector('.tercero');
    //noInfo.innerHTML='';
    //limpiar html
        while(noInfo.firstChild){
            noInfo.removeChild(noInfo.firstChild);
        }
    if(Object.values(areas).includes('')){
        const parrafo = document.createElement('P');
        parrafo.textContent='No a incluido sus datos ni servicios';
        parrafo.classList.add('invalidar-cita');
        noInfo.appendChild(parrafo);
        return;
    }
    const nombreCita = document.createElement('P');
    nombreCita.innerHTML = '<span>Nombre:</span>'+nombre;

    const fechaCita = document.createElement('P');
    fechaCita.innerHTML = '<span>Fecha:</span>'+fecha;

    const horaCita = document.createElement('P');
    horaCita.innerHTML = '<span>Hora:</span>'+hora;

    const servicioCita = document.createElement('DIV');
    servicioCita.classList.add('resumen-servicio');

    let cantidad = 0;

    servicios.forEach( (servicio) =>{
        const {nombre,precio} = servicio;
        const contenedorServicio = document.createElement('DIV');
        contenedorServicio.classList.add('contenedor-servicio');

        const textoServicio = document.createElement('P');
        textoServicio.textContent = nombre;

        const precioServicio = document.createElement('P');
        precioServicio.textContent = precio;
        precioServicio.classList.add('precio');

        contenedorServicio.appendChild(textoServicio);
        contenedorServicio.appendChild(precioServicio);

        servicioCita.appendChild(contenedorServicio);

        //const totalServicio = precio.split('$');
        //cantidad += parseInt(totalServicio[1].trim());
    });
    console.log(cantidad);
    const titulo = document.createElement('h3');
    titulo.textContent = 'Resumen de Servicios';
    titulo.classList.add('titulo');
    noInfo.appendChild(titulo);
    noInfo.appendChild(nombreCita);
    noInfo.appendChild(fechaCita);
    noInfo.appendChild(horaCita);
    const subtitulo = document.createElement('h3');
    subtitulo.textContent = 'Servicios Seleccionados';
    subtitulo.classList.add('subtitulo');
    noInfo.appendChild(subtitulo);  
    noInfo.appendChild(servicioCita);
}