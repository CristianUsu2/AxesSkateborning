const btnRecuperarContra=document.getElementById("btnRecuperarContra");
const $divAlertas=document.getElementById("divAlertas");
if(btnRecuperarContra!=null){
    btnRecuperarContra.addEventListener("click",()=>{EnvioRecuperarContra()})
}

const EnvioRecuperarContra=()=>{
    const email=document.getElementById("emailBcc").value;
    const csrf=document.getElementById("csrf").value;
    const data= new URLSearchParams();
    data.append("emailBcc", email);
    fetch("Envio",{
        headers:{
            'X-CSRF-TOKEN': csrf
        },
       method: "post",
       body: data,
    })
     .then(r=>r.json())
     .then(response=>{
         response.forEach(ob=>{
           if(ob.estado==1){
            $divAlertas.innerHTML+=`<div class="alert alert-success" role="alert"><button type="button" class="close">&times;</button>"Hemos enviado un correo a ${ob.email} por favor revise su correo para confirmar"+</div>`;
           }else{
            $divAlertas.innerHTML+=`<div class="alert alert-danger" role="alert"><button type="button" class="close">&times;</button>"Ocurrio un error en el envio, no encontramos el correo ${ob.email} favor ingrese de nuevo el correo "</div>`;
           }
         });
     })
     .catch(error=>console.log(error))
    ;
}

