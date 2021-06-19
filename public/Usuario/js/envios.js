const btnRecuperarContra = document.getElementById("btnRecuperarContra");
const $divAlertas = document.getElementById("divAlertas");
const btonIngresar = document.getElementById("ingresar");
const btonRegistrar = document.getElementById("registrar");
const csrf = document.getElementById("csrf").content;
const spanCorreo = document.querySelector("#spanCorreo");
const spanContraseña = document.querySelector("#spanContraseña");
const btnDatosGoogleU= document.getElementById("btnDatosGoogleU");
const spanC = document.querySelector("#spanC");
const spanI = document.querySelector("#spanI");
const spanN = document.querySelector("#spanN");
const spanA = document.querySelector("#spanA");
const spanT = document.querySelector("#spanT");
const spanContra = document.querySelector("#spanContra");
const spanContraConfirm = document.querySelector("#spanContraConfirm");


if (btnRecuperarContra != null) {
    btnRecuperarContra.addEventListener("click", () => {
        EnvioRecuperarContra();
    });
}

if (btonIngresar != null) {
    btonIngresar.addEventListener("click", (e) => {
        e.preventDefault();
        LoginUsuario();
    });
}

if(btonRegistrar !=null){
    btonRegistrar.addEventListener("click",(e)=>{
        e.preventDefault();
        registroUsuarios();
    })
}

if(btnDatosGoogleU !=null){
    btnDatosGoogleU.addEventListener("click",(e)=>{
        e.preventDefault()
        RegistroUsuariosGoogle();
    })
}

const EnvioRecuperarContra = () => {
    const email = document.getElementById("emailBcc").value;
    const data = new URLSearchParams();
    data.append("emailBcc", email);
    fetch("Envio", {
        headers: {
            "X-CSRF-TOKEN": csrf,
        },
        method: "post",
        body: data,
    })
        .then((r) => r.json())
        .then((response) => {
            response.forEach((ob) => {
                if (ob.estado == 1) {
                    $divAlertas.innerHTML += `<div class="alert alert-success" role="alert"><button type="button" class="close">&times;</button>"Hemos enviado un correo a ${ob.email} por favor revise su correo para confirmar"+</div>`;
                } else {
                    $divAlertas.innerHTML += `<div class="alert alert-danger" role="alert"><button type="button" class="close">&times;</button>"Ocurrio un error en el envio, no encontramos el correo ${ob.email} favor ingrese de nuevo el correo "</div>`;
                }
            });
        })
        .catch((error) => console.log(error));
};


const LoginUsuario = () => {
    let Correo = document.getElementById("correo").value;
    let Contraseña = document.getElementById("contra").value;
    console.log(Correo , Contraseña);
    if (Correo.length ==0 || Correo == null) {
        spanCorreo.innerHTML=`El campo correo es obligatorio`;
    }else{
        spanCorreo.style.display="none";
    }
    if(Contraseña.length ==0 || Contraseña == null){
        spanContraseña.innerHTML=`El campo contraseña es obligatorio`;
        return false;
    }else{
        spanContraseña.style.display = "none";
    }
    if(Correo.length ==0 && Contraseña.length ==0 || Correo == null && Contraseña == null){
        spanCorreo.innerHTML=`El campo correo es obligatorio`;
        spanContraseña.innerHTML=`El campo contraseña es obligatorio`;
        return false;
    }
    else{
        let data = new URLSearchParams();
        data.append("Correo", Correo);
        data.append("Contraseña", Contraseña);
        fetch("/InicioSesion", {
            headers: {
                "X-CSRF-TOKEN": csrf,
            },
            body: data,
            method: "POST",
        })
            .then((response) => response.json())
            .then((datos) => {
                if (datos == 2) {
                    window.location = "/Administrador/index";
                } else if (datos == 1) {
                    window.location = "index";
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Opss....",
                        text: "Los datos no coinciden, verifíquelos nuevamente.",
                    });
                }
            })
            .catch((error) => console.log(error));
      
    }

};

const registroUsuarios=()=>{
    let cedula = document.getElementById("identificacion").value;
    let nombre = document.getElementById("nombre").value;
    let apellido = document.getElementById("apellido").value;
    let correo = document.getElementById("correoU").value;
    let telefono = document.getElementById("telefono").value;
    let contraseña = document.getElementById("contraseña").value;
    let confirmarContraseña = document.getElementById("confirmarContraseña").value;

    if(cedula.length ==0 || cedula ==null){
        spanI.innerHTML = `El campo identificacion es obligatorio`;
    }else{
        spanI.style.display = "none";
    }
    if(nombre.length == 0 || nombre == null){
        spanN.innerHTML = `El campo nombre es obligatorio`;
    }else{
        spanN.style.display = "none";
    }
    if(apellido.length == 0 || apellido == null){
        spanA.innerHTML = `El campo apellido es obligatorio`;
    }else{
        spanA.style.display = "none";
    }
    if(correo.length ==0 || correo == null){
       spanC.innerHTML = `El campo correo es obligatorio`;
    }else{
        spanC.style.display = "none";
    }
    if(telefono.length == 0 || telefono == null){
        spanT.innerHTML = `El campo telefono es obligatorio`;
    }else{
        spanT.style.display = "none";
    }
    if(contraseña.length == 0 || contraseña == null){
        spanContra.innerHTML = `El campo contraseña es obligatorio`;
    }else{
        spanContra.style.display = "none";
    }
    if(confirmarContraseña.length == 0 || confirmarContraseña == null){
        spanContraConfirm.innerHTML = `El campo confirmar contraseña es obligatorio`;
    }else{
        spanContraConfirm.style.display = "none";
    }
   
    if(cedula.length == 0 && nombre.length ==0 && apellido.length ==0 && correo.length== 0 && telefono.length == 0 && contraseña.length == 0 && confirmarContraseña.length == 0){
        spanI.innerHTML=`El campo identificación es obligatorio`;
        spanN.innerHTML=`El campo nombre es obligatorio`;
        spanA.innerHTML=`El campo apellido es obligatorio`;
        spanC.innerHTML=`El campo correo es obligatorio`;
        spanT.innerHTML=`El campo telefono es obligatorio`;
        spanContra.innerHTML=`El campo contraseña es obligatorio`;
        spanContraConfirm.innerHTML=`El campo confirmar contraseña es obligatorio`;
        return false;
    }
    //if(contraseña.length >1 && confirmarContraseña.length >1){
        if(contraseña.length >1 && confirmarContraseña.length >1 &&contraseña != confirmarContraseña){
        Swal.fire({
            icon: "error",
            title: "Opps....",
            text: "Las contraseñas no coinciden, ingrese las contraseñas iguales"
        })
    //}
    }else{

        let data = new URLSearchParams();
        data.append("identificacion",cedula);
        data.append("name",nombre);
        data.append("apellido",apellido);
        data.append("email",correo);
        data.append("telefono",telefono);
        data.append("password",contraseña);
    
        fetch("/InicioSesionR", {
        headers: {
        "X-CSRF-TOKEN": csrf,
        },
        body: data,
        method: "POST",
        })
        .then((response) => response.json())
        .then((datos)=>{
            if(datos == 1){
                Swal.fire({
                    icon: "success",
                    title: "Registro éxitoso",
                    text: "Tu cuenta se ha creado éxitosamente"
                });
            }
        })
    }

};

const RegistroUsuariosGoogle=()=>{
    const usuario=JSON.parse(localStorage.getItem("usuario"));
    const identificacion=document.getElementById("identificacion").value;
    const telefono=document.getElementById("telefono").value;
    let data= new URLSearchParams();
    data.append("name", usuario.additionalUserInfo.profile.given_name)
    data.append("apellido",  usuario.additionalUserInfo.profile.family_name)
    data.append("identificacion",identificacion)
    data.append("telefono", telefono)
    data.append("email",usuario.additionalUserInfo.profile.email)


   fetch('/Productos/detalleCompra',{
       headers:{
         'X-CSRF-TOKEN':csrf    
       },
       method: "POST",
       body: data
    
   })
   .then(response=>response.json())
   .then(result=>{
       if(result ==1){
           Swal.fire({
               'icon':'success',
               'title': 'Operacion ejecutada con exito',
               'text': 'se registro exitosamente'
           })
           
       }else if(result ==-1){
        Swal.fire({
            'icon':'error',
            'title': 'No se ejecuto',
            'text': 'No se pudo ejecutar'
        })
       }
   })

}
