const btonNotificar=document.getElementById("notificar");
btonNotificar.addEventListener("click", (e)=>{
    e.preventDefault();
    EnvioNotificacionDescuentos();
})

const EnvioNotificacionDescuentos=()=>{
    let url="/Administrador/notificaciones";  
    fetch(url)
    .then(response=>console.log("melo mpp"))
    .catch(error=>console.log(error))
}


