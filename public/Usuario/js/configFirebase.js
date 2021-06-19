const google=document.getElementById("google");

if(google!=null){
    google.addEventListener("click",()=>{
        const provedorGoogle= new firebase.auth.GoogleAuthProvider();
        auth
        .signInWithPopup(provedorGoogle)
        .then(user=>{
         user.validado=false;
         localStorage.setItem("usuario",JSON.stringify(user));
          MostrarNombreGoogle();
          window.location="index";
        })
          .catch(error=>{
          console.log(error);
         })
    })
}
 
const MostrarNombreGoogle=()=>{
    auth.onAuthStateChanged((user)=>{
       if(user){
        let divOpciones=document.getElementById("OpcionesU");
        let divNombre=document.getElementById("myaccount"); 
        let avatar=document.getElementById("avatar");
        if(divNombre!=null && divOpciones!=null){
        divNombre.innerHTML=`
          ${user.displayName}
          <i class="fa fa-angle-down"></i>
        `;
        divOpciones.innerHTML=`
        <a class="dropdown-item" href="/Productos/Pedidos">Mis pedidos</a>
        <a class="dropdown-item" href="#"  onclick="CerrarSesion()">Cerrar Sesión</a>
        `;
        avatar.innerHTML=`
          <img src="${user.photoURL}" style="border-radius:50px; width:50px; height:50px; object-fit: cover;"/>
        `;
       }
       }
    });
}

const CerrarSesion=()=>{
  console.log("goliu");
  auth.signOut()
      .then(r=>{
        console.log("salio", r);
        localStorage.removeItem("usuario");
        window.location="/InicioSesion"; 
      })
}

MostrarNombreGoogle();