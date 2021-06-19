
/*document.querySelector('.chat[data-chat=person2]').classList.add('active-chat')
document.querySelector('.person[data-chat=person2]').classList.add('active')*/
const contactos = document.getElementById("contactos");
const chat = document.getElementById("chat");
let csrf = document.getElementById("csrf").value;
let usted = [];
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
  let datosContacto = [];
  let arrayFecha = e.reduce((acc, v) => {
    const datos = {
      "fecha": v.fecha,
      "idUsuario": v.idusuario,
      "leido": v.leido,
      "mensaje": v.mensaje,
      "idAdmin": v.idAdmin,
      "foto": v.foto
    }
    acc.push(datos);
    return acc;
  }, [])

  const usu = [].concat.apply([], user);
  arrayFecha.forEach(co => {
    usu.forEach(u => {
      if (co.idUsuario == u.Id_Usuarios) {
        const usuario = {
          "fecha": co.fecha,
          "idUsuario": co.idUsuario,
          "leido": co.leido,
          "mensaje": co.mensaje,
          "name": u.name,
          "idAdmin": co.idAdmin,
          "foto":co.foto
        }
        datosContacto.push(usuario);
      }
    });
  })
  console.log(user, arrayFecha)
  MensajeContacto(datosContacto);
}

const MensajeContacto = (e) => {
  const arrayUsuarios = e.filter(u => u.idAdmin != 11);
  SeccionChatUsuario(arrayUsuarios);
}

const SeccionChatUsuario = (e) => {
  console.log(e)
  const IdsUsuariosR = e.map(m => m.idUsuario);
  const IdsUsuarios = EliminarValoresRepetidos(IdsUsuariosR);
  let max = 0;
  let prueba = [];
  e.forEach(k => {
    IdsUsuarios.forEach(id => {
      if (id == k.idUsuario) {
        const mensaje = {
          "idusuario": k.idUsuario,
          "mensaje": k.mensaje,
          "nombre": k.name,
          "idAdmin": k.idAdmin,
          "fecha": k.fecha,
          "foto":  k.foto
        }
        prueba.push(mensaje)
      }
    })
  })
  console.log(IdsUsuarios)
  SacarFechaMensaje(IdsUsuarios);
}


const MostrarMensajeContacto = (chats) => {
  contactos.innerHTML = '';
  chats.forEach(chat => {
    contactos.innerHTML += `<div class="discussion">
    <div class="photo" style="background-image: url(${chat.foto});">
      <div class="online"></div>
    </div>
    <div class="desc-contact">
      <p class="name" >${chat.nombre}</p>
      <p class="message">${chat.mensaje}</p>
      <input type="hidden" id="idUsuario" value="${chat.idusuario}" />
      <input type="hidden" id="nombre" value="${chat.nombre} " />
    </div>
    <div class="timer">${new Date(chat.fecha)}</div>
  </div>`;
  })

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

const SacarFechaMensaje = (array) => {
  let respuesta = [];
  for (let i = 0; i < array.length; i++) {
    db.collection('chats').where("idusuario", "==", Number(array[i])).orderBy("fecha", "desc")
      .onSnapshot((query) => {
        query.forEach(q => {
          const ob = {
            "idusuario": q.data().idusuario,
            "nombre": q.data().nombre,
            "idAdmin": q.data().idAdmin,
            "fecha": q.data().fecha,
            "mensaje": q.data().mensaje,
            "foto":q.data().foto
          }
          respuesta.push(ob);
        })

        BuscadorObjetos(respuesta, array);
      })
  }
}

const BuscadorObjetos = (e, i) => {
  let res = [];
  i.forEach(id => {
    const chat = e.find(e => e.idusuario == id);
    if (chat != -1) {
      res.push(chat);
    }
  })
  console.log(res)
  MostrarMensajeContacto(res);
}

contactos.addEventListener("click", (e) => {
  ActivadorChat(e);
});

const ActivadorChat = (e) => {
  const divPadre = e.target.parentElement
  const clasePadre = divPadre.className;
  if (clasePadre == "desc-contact" || clasePadre == "discussion") {
    const idUsuario = divPadre.querySelector("#idUsuario").value;
    const nombre = divPadre.querySelector("#nombre").value;
    ObtenerMensajesUsuarios(idUsuario, nombre);
  }
}

const ObtenerMensajesUsuarios = (e, nombre) => {
  console.log(e)
  db.collection('chats').where("idusuario", "==", Number(e)).where("idAdmin", "==", 0).orderBy("fecha")
    .onSnapshot((querySnapshot) => {
      const mensajes = [];
      querySnapshot.forEach((doc) => {
        mensajes.push(doc.data());
      });
     console.log(mensajes, "usuario")
      MostrarMensajesUsuario(mensajes, nombre, e);
    });
}

const ObtenerMensajesAdmin = (e, usu) => {
  db.collection('chats').where("idusuario", "==", Number(e)).where("idAdmin", "==", 11).orderBy("fecha")
    .onSnapshot((querySnapshot) => {
      const mensajes = [];
      querySnapshot.forEach((doc) => {
        mensajes.push(doc.data());
      });
      MostrarMensajesAdmin(mensajes, usu);
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

  ObtenerMensajesAdmin(id, e);

}

const MostrarMensajesAdmin = (e, usu) => {
  const ArrayMensajes = [];
  ArrayMensajes.push(e);
  ArrayMensajes.push(usu);
  const mensajesArray = [].concat.apply([], ArrayMensajes);
  const MensajesOrdenadas = mensajesArray.sort((a, b) => a.fecha - b.fecha);
  const divMensajes = document.getElementById("mensajes");
  divMensajes.innerHTML = ""
  MensajesOrdenadas.reduce((acc, v) => {
    if (v.idAdmin != 11) {
      const fecha = new Date(v.fecha * 1000);
      divMensajes.innerHTML += `
        <div class="message text-only">
        <div class="request">
        <p class="text">${v.mensaje}</p>
        </div>
    </div>
    <p class="time">${fecha}</p>
        `;
    } else {
      const fecha = new Date(v.fecha * 1000);
      divMensajes.innerHTML += `<div class="message text-only">
    <div class="response">
    <p class="text">${v.mensaje}</p>
    </div>
</div>
<p class="time">${fecha}</p>`
    }
  }, 0)
  /*const divMensajes = document.getElementById("mensajes");
  divMensajes.innerHTML = "";
  usu.forEach(m => {
    const fecha = new Date(m.fecha * 1000);
    divMensajes.innerHTML += `<div class="message text-only">
    <div class="request">
    <p class="text">${m.mensaje}</p>
    </div>
</div>
<p class="time">${fecha}</p>`;
  });

  e.forEach(msg => {
    const fecha = new Date(msg.fecha * 1000);
    divMensajes.innerHTML += `<div class="message text-only">
    <div class="response">
    <p class="text">${msg.mensaje}</p>
    </div>
</div>
<p class="time">${fecha}</p>`;
  });*/
}

const EnvioMensajeAdmin = (e) => {
  let mensaje = document.getElementById("textoEnvio").value;
  /*const divmensaje = document.getElementById("mensajes");
  divmensaje.innerHTML += `<div class="message text-only">
  <div class="response">
    <p class="text">${mensaje}</p>
  </div>
</div>`;*/
  let msg = mensaje;
  mensaje.value = '';
  console.log(msg,e)
  GuardarMensajeAdmin(msg, e);

}

const GuardarMensajeAdmin = (e, id) => {
  let data = new URLSearchParams();
  data.append("id", id);
  fetch('/Administrador/chats', {
    headers: {
      'X-CSRF-TOKEN': csrf,
    },
    body: data,
    method: "POST"

  }).then(r => r.json())
    .then(data => {
      let nombre;
      let apellido;
      data.forEach(user => {
        nombre = user.name;
        apellido = user.apellido;
      })
      const mensaje = {
        "idAdmin": 11,
        "fecha": Date.now(),
        "leido": true,
        "foto": "http://e0.365dm.com/16/08/16-9/20/theirry-henry-sky-sports-pundit_3766131.jpg?20161212144602",
        "mensaje": e,
        "nombre": nombre,
        "apellido": apellido,
        "idusuario": Number(id)
      }
      console.log(mensaje)
      db.collection("chats").add(mensaje)
        .then(r => {
          DatosFirebaseIdsUsuarios()
        }
        )
        .catch(r => console.log(r))
    })
    .catch(error => console.log(error))

}





DatosFirebaseIdsUsuarios();

