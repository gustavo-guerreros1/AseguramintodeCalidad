const admin= {
    usuario :"",
    contraseña:""

};

document.addEventListener('DOMContentLoaded',function(){

    agregarAdmin();

    agregarPass();
});

async function agregarAdmin(){
    const jasn = await fetch('./cuentaAdmin.json');
    const bd = await jasn.json();

    const {administrador} = bd;
    const objeto = administrador[0];
    
    agregarUsuario(objeto['acount']);
    agregarPass(objeto['password']);

}

function agregarUsuario(nombre){
    const inUsuario = document.querySelector('.usuario');
    
    inUsuario.addEventListener('input',(e)=>{
        //e.preventDefault();
        let user = e.target.value;
        if(user!== nombre){
            mostrarAlerta('Usuario incorrecto' ,'error');

        }
    });
    
   
}

function agregarPass(password){
    const inUsuario = document.querySelector('.contraseña');
    inUsuario.addEventListener('input',(e)=>{
        let pass = e.target.value;
        if(pass!== password){
            mostrarAlerta('Contraseña incorracta' ,'error');
        }
        
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
    },1000);
}