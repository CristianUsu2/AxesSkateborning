
let tbody = document.getElementById("tbodyC");
let botonFinalizar = document.getElementById("btnFinalizarC");
let productos = JSON.parse(localStorage.getItem("productos"));
let tbodyfinalizarc = document.getElementById("tbodyFinalizarCompra");
let formFinalizar = document.getElementById("formFinalizar");
let botonContraEntrega = document.getElementById("contraEntrega");
let botonDetalleCompra = document.getElementById("btnProcederPagar");
const cantidadProducto = document.getElementById("cantidadProducto");

let MostrarProductosDetalle = () => {
  if (tbody != null) {
    tbody.innerHTML = '';
    if (productos != null) {
      productos.forEach(Element => {
        tbody.innerHTML += `
        <tr>
        <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="${Element.imgP}" alt="Product"/></a></td>
        <td class="pro-title"><a href="#">${Element.nombreP}</a></td>
        <td class="pro-price"><span>$${Element.precioP}</span></td>
        <td class="pro-quantity">
            <div class="pro-qty">
            <div class="col-1">
            </div>
                <input type="text" id="cantidadProducto" value="${Element.cantidadP}" />
            </div>
           
        </td>
        <td class="pro-remove">
          <input type="hidden"  id="itemProduc" value="${Element.itemP}"/>
          <input type="hidden" id="cantidadProduc" value="${Element.cantidadP}"/>
          <i class="fas fa-trash-alt"></i>
        </td>
       </tr>             
     `;
      });
      NumeroProductos();
      CalculoCompraD();
    }
  }

}

if (botonFinalizar != null) {
  botonFinalizar.addEventListener('click', () => {
    window.location = "/Productos/finalizarCompra";
  })
}

if (cantidadProducto != null) {
  cantidadProducto.addEventListener('change', (e) => {
    AumentarValor(e);
  });
}
if (botonContraEntrega != null) {
  botonContraEntrega.addEventListener("click", () => {
    localStorage.removeItem("productos");
  });
}

if(botonDetalleCompra!=null){
  botonDetalleCompra.addEventListener("click",()=>{
   EnvioDetalleCompra();
  });
}

const EnvioDetalleCompra=()=>{
  const usuario=JSON.parse(localStorage.getItem("usuario"));
  const csrf=document.getElementById("csrf").content;
  console.log(csrf)
  let data= new URLSearchParams();
  data.append("email",usuario.user.email);
  fetch('/Productos/detalleCompra',{
    headers:{
      'X-CSRF-TOKEN': csrf,
    },
    body: data,
    method: "post"
  })
  .then((r=>r.json()))
  .then(datos=>{
    if(datos==2){
     usuario.validado=true;
     localStorage.setItem("usuario",JSON.stringify(usuario));
     
    }
  })
  .catch(error=>console.log(error))
}

if (tbody != null) {
  tbody.addEventListener("click", (e) => {
    if (e.target.classList.contains("fas", "fa-trash-alt")) {
      const div = e.target.parentElement;
      EliminarProductoD(div);
    }
  });
}

let CalculoCompraD = () => {
  let subtotalD = document.getElementById("subtotalD");
  let totalD = document.getElementById("totalD");
  let suma = 0;
  if (productos != null) {
    let envio = 10000;
    let valorSubtotal = productos.reduce((e, i) => {
      suma = suma + Number(i.precioP) * Number(i.cantidadP);
      return suma;
    }, 0);
    subtotalD.textContent = '$' + valorSubtotal;
    let valorTotal = Number(valorSubtotal) + envio;
    totalD.textContent = '$' + valorTotal;
    if (formFinalizar != null) {
      formFinalizar.innerHTML += `
      <input type="hidden" name="subtotal" value="${valorSubtotal}" />
     <input type="hidden" name="total" value="${valorTotal}" id="totalCompra" /> `;
    }
  }
}

let AumentarValor = (e) => {
  let card = e.target.parentElement;
  let itemB = card.querySelector('input[type="hidden"]').value;
  if (itemB != null) {
    let busqueda = productos.findIndex(i => i.itemP == itemB);
    if (busqueda != -1) {
      let valor = card.querySelector('input[type="text"]').value;
      productos[busqueda].cantidadP = valor;
      localStorage.setItem("productos", JSON.stringify(productos));
      CalculoCompraD();
    }
  }
}


let ValidacionDeItemsCard = () => {
  /*productos.reduce((e,i,o)=>{
    console.log(i,o)
    
  },[])*/
}

let EliminarProductoD = (e) => {
  const idProdu = e.querySelector("#itemProduc").value;
  const cantidadProd = e.querySelector("#cantidadProduc").value;
  const pos = productos.findIndex(p => p.itemP == idProdu && p.cantidadP == cantidadProd);
  if (pos != -1) {
    productos.splice(pos, 1);
    localStorage.setItem("productos", JSON.stringify(productos));
  }
  MostrarProductosDetalle();
  CalculoCompra();
}



if (tbodyfinalizarc !== null) {
  if (productos != null) {
    tbodyfinalizarc.innerHTML = "";
    productos.forEach(p => {
      tbodyfinalizarc.innerHTML += `
     <tr>
     <td><a href="/Productos/detalleProducto${p.itemP}">${p.nombreP} <strong>x: ${p.cantidadP}</strong></a></td>
     <td>$${p.precioP}</td>
     </tr>
     `;
      formFinalizar.innerHTML += `<input type="hidden"  name="idProducto[]" value="${p.itemP}" />
     <input type="hidden" name="talla[]" value="${p.tallaP}"/>
     <input type="hidden" name="cantidad[]" value="${p.cantidadP}" />`;
    });
    CalculoCompraD();
  }
}
ValidacionDeItemsCard()
MostrarProductosDetalle()