const btnRecuperarContra = document.getElementById("btnRecuperarContra");
const $divAlertas = document.getElementById("divAlertas");
const btonIngresar = document.getElementById("ingresar");
const csrf = document.getElementById("csrf").content;
const spanCorreo = document.querySelector("#spanCorreo");
const spanContraseña = document.querySelector("#spanContraseña");
const btnDatosGoogleU= document.getElementById("btnDatosGoogleU");

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
    /* data.append("",correo);
    data.append("",contra);
    fetch('',{
        method: 'POST',
        body: data
    })
    .then(response=>console.log(response))  pille tambien pa que vaya aprendiendo es facil y si quiere con async si bueno */

    //.catch(error=>console.log(error))
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
