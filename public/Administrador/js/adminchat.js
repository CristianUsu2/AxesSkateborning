
/*document.querySelector('.chat[data-chat=person2]').classList.add('active-chat')
document.querySelector('.person[data-chat=person2]').classList.add('active')*/
const contactos = document.getElementById("contactos");
const chat = document.getElementById("chat");
/*
let friends = {
    list: document.querySelector('ul.people'),
    all: document.querySelectorAll('.left .person'),
    name: ''
  },
  chat = {
    container: document.querySelector('.container .right'),
    current: null,
    person: null,
    name: document.querySelector('.container .right .top .name')
  }

friends.all.forEach(f => {
  f.addEventListener('mousedown', () => {
    f.classList.contains('active') || setAciveChat(f)
  })
});
 const validacionUsuario=async()=>{
     let respuesta;
     let peticion=await fetch('/Validar');
     if(peticion.ok){
     let data=await pedicion.json();
      respuesta=await data; 
     }else{
       respuesta=await null;
     }
    return respuesta
  }
function setAciveChat(f) {
  friends.list.querySelector('.active').classList.remove('active')
  f.classList.add('active')
  chat.current = chat.container.querySelector('.active-chat')
  chat.person = f.getAttribute('data-chat')
  chat.current.classList.remove('active-chat')
  chat.container.querySelector('[data-chat="' + chat.person + '"]').classList.add('active-chat')
  friends.name = f.querySelector('.name').innerText
  chat.name.innerHTML = friends.name
}

*/
const DatosFirebase = (e) => {
  let arrayDocumentos = [];
  //let arrayFechas=[]
  db.collection('chats').onSnapshot(data => {
    data.forEach(e => {
      arrayDocumentos.push(e.data());
      //arrayFechas.push(e.data());
    });
    Fechasformato(arrayDocumentos, e)
  })
}
const DatosFirebaseIdsUsuarios = () => {
  let arrayIdsUsuario = [];
  db.collection('chats').onSnapshot(data => {
    data.forEach(element => {
      arrayIdsUsuario.push(element.data().idusuario);
    })
    OrganizarDatos(arrayIdsUsuario)
  })
}

const OrganizarDatos = (e) => {
  const arrayEnvio = EliminarValoresRepetidos(e);
  DatosUsuario(arrayEnvio);
}

const DatosUsuario = (e) => {
  let csrf = document.getElementById("csrf").value;
  Objetosids = [];
  e.forEach(id => {
    const ids = {
      id
    }
    Objetosids.push(ids);
  });
  fetch('/Administrador/chats', {
    headers: {
      'X-CSRF-TOKEN': csrf,
      'Content-Type': 'application/json'
    },
    method: 'POST',
    body: JSON.stringify(Objetosids)
  })
    .then(r => r.json())
    .then(res => { DatosFirebase(res) })
    .catch(error => console.log("error" + error))
}

const Fechasformato = (e, user) => {
  console.log(e);
  let datosContacto = [];
  let arrayFecha = e.reduce((acc, v) => {
    let fecha = new Date(v.fecha * 1000);
    const datos = {
      "fecha": fecha,
      "idUsuario": v.idusuario,
      "leido": v.leido,
      "mensaje": v.mensaje,
      "idAdmin": v.idAdmin
    }
    acc.push(datos);
    return acc;
  }, [])
  const usu = user.reduce((acc, v) => {
    return acc.concat(v);
  }, [])
  arrayFecha.forEach(co => {
    usu.forEach(u => {
      if (co.idUsuario == u.Id_Usuarios && co.idAdmin== 0) {
        const usuario = {
          "fecha": co.fecha,
          "idUsuario": co.idUsuario,
          "leido": co.leido,
          "mensaje": co.mensaje,
          "name": u.name,
          "idAdmin": co.idAdmin
        }
        datosContacto.push(usuario);
      }
    });
  })
  MensajeContacto(datosContacto);
}

const MensajeContacto = (e) => {
  const arrayRepetidos = [];
  e.forEach(ele => {
    let pos = e.find(ob => ob.idUsuario == ele.idUsuario && ob.fecha > ele.fecha && ob.idAdmin == 0);
    if (pos != null) {
      arrayRepetidos.push(pos);
    }
  })
  console.log(e);
  const mensajesContactosRepetidos = EliminarValoresRepetidos(arrayRepetidos);
  MostrarMensajeContacto(mensajesContactosRepetidos, e);
}

const MostrarMensajeContacto = (repetidos, normales) => {
  const arrayIdsRepeditos = repetidos.map(e => e.idUsuario);
  normales.forEach(chat => {
    arrayIdsRepeditos.forEach(id => {
      if (chat.idUsuario != id) {
        contactos.innerHTML += `<div class="discussion">
        <div class="photo" style="background-image: url(http://e0.365dm.com/16/08/16-9/20/theirry-henry-sky-sports-pundit_3766131.jpg?20161212144602);">
          <div class="online"></div>
        </div>
        <div class="desc-contact">
          <p class="name">${chat.name}</p>
          <input type="hidden" id="idUsuario" value="${chat.idUsuario}"/>
          <input type="hidden" id="nombre" value="${chat.name}" />
          <p class="message">${chat.mensaje}</p>
        </div>
        <div class="timer">${chat.fecha}</div>
      </div>
      </div>`;

      }
    });
  })
  if (repetidos != null) {
    repetidos.forEach(chat => {
      contactos.innerHTML +=
        `<div class="discussion">
       <div class="photo" style="background-image: url(http://e0.365dm.com/16/08/16-9/20/theirry-henry-sky-sports-pundit_3766131.jpg?20161212144602);">
        <div class="online"></div>
       </div>
    <div class="desc-contact">
     <input type="hidden" id="idUsuario" value="${chat.idUsuario}"/>
     <input type="hidden" id="nombre" value="${chat.name}" />
      <p class="name">${chat.name}</p>
      <p class="message">${chat.mensaje}</p>
    </div>
    <div class="timer">${chat.fecha}</div>
  </div>
  </div>`;
    });
  }
  
}

const EliminarValoresRepetidos = (array) => {
  const respuesta = array.reduce((acc, v) => {
    if (!acc.includes(v)) {
      acc.push(v);
    }
    return acc;
  }, []);
  return respuesta;
}

contactos.addEventListener("click", (e) => {
  ActivadorChat(e);
});

const ActivadorChat = (e) => {
  const divPadre = e.target.parentElement;
  const clasePadre = divPadre.className;
  if (clasePadre == "desc-contact" || clasePadre == "discussion") {
    const idUsuario = divPadre.querySelector("#idUsuario").value;
    const nombre = divPadre.querySelector("#nombre").value;
    ObtenerMensajesUsuarios(idUsuario, nombre);
  }
}

const ObtenerMensajesUsuarios = (e, nombre) => {
  db.collection('chats').where("idusuario", "==", Number(e)).where("idAdmin", "==", 0).orderBy("fecha")
    .onSnapshot((querySnapshot) => {
      const mensajes = [];
      querySnapshot.forEach((doc) => {
        mensajes.push(doc.data());
      });
      MostrarMensajesUsuario(mensajes, nombre, e);
    });
}
const ObtenerMensajesAdmin = (e) => {
  db.collection('chats').where("idusuario", "==", Number(e)).where("idAdmin", "==", 6).orderBy("fecha")
    .onSnapshot((querySnapshot) => {
      const mensajes = [];
      querySnapshot.forEach((doc) => {
        mensajes.push(doc.data());
      });
      MostrarMensajesAdmin(mensajes);
    });
}

const MostrarMensajesUsuario = (e, nombre, id) => {
  const clasechat = chat.querySelector(".header-chat");
  if (clasechat != null) {
    chat.innerHTML = '';
  }
  chat.innerHTML += `<div class="header-chat">
    <i class="icon fa fa-user-o" aria-hidden="true"></i>
    <p class="name" id="nombreChat"></p>
    <i class="icon clickable fa fa-ellipsis-h right" aria-hidden="true"></i>
  </div>
  <div class="messages-chat" id="mensajes">
    
  </div>
  <div class="footer-chat">
    <i class="icon fa fa-smile-o clickable" style="font-size:25pt;" aria-hidden="true"></i>
    <input type="text" class="write-message" placeholder="Responde el mensaje" id="textoEnvio"></input>
    <i class="icon send fas fa-paper-plane clickable" aria-hidden="true" onclick="EnvioMensajeAdmin(${id})"></i>
  </div>`;
  nombreChat.innerText = `${nombre}`;
  const divMensajes = document.getElementById("mensajes");
  divMensajes.innerHTML = "";
  e.forEach(m => {
    const fecha = new Date(m.fecha * 1000);
    divMensajes.innerHTML += `<div class="message text-only">
    <div class="request">
    <p class="text">${m.mensaje}</p>
    </div>
</div>
<p class="time">${fecha}</p>`;
  });
  ObtenerMensajesAdmin(id);
}

const MostrarMensajesAdmin = (e) => {
  const divMensajes = document.getElementById("mensajes");
  e.forEach(msg => {
    const fecha = new Date(msg.fecha * 1000);
    divMensajes.innerHTML += `<div class="message text-only">
    <div class="response">
    <p class="text">${msg.mensaje}</p>
    </div>
</div>
<p class="time">${fecha}</p>`;
  });
}

const EnvioMensajeAdmin = (e) => {
  let mensaje = document.getElementById("textoEnvio").value;
  const divmensaje = document.getElementById("mensajes");
  divmensaje.innerHTML += `<div class="message text-only">
  <div class="response">
    <p class="text">${mensaje}</p>
  </div>
</div>`;
  GuardarMensajeAdmin(mensaje, e);
  mensaje.value = '';
}

const GuardarMensajeAdmin = (e, id) => {
 const mensaje = {
    "idAdmin": 6,
    "fecha": Date.now(),
    "leido": false,
    "mensaje": e,
    "idusuario": Number(id)
  }
  db.collection("chats").add(mensaje)
    .then(r => console.log("a dormir papa"))
    .catch(r => console.log(r))
}
DatosFirebaseIdsUsuarios();