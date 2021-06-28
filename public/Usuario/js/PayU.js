
const divtotalCompra=document.getElementById("totalCompra");
const divnombre=document.getElementById("f_name");
const divapellido=document.getElementById("l_name");
const divemail=document.getElementById("email");
const divtelefono=document.getElementById("phone");
const divFormPayu=document.getElementById("divformPayU");

if(divtotalCompra !=null){
    var totalCompra=divtotalCompra.value;
    var nombre=divnombre.value;
    var apellido=divapellido.value;
    var email=divemail.value;
    var telefono=divtelefono.value;
}
const FormularioPayU=()=>{
   const productos=JSON.parse(localStorage.getItem("productos"));
   const arrayNombresyCantidad=productos.map((prod,index,array)=>{array.push(prod.nombreP);array.push(prod.cantidadP); 
        return array});
   let descripcion="";
   let cont=0;
   let np="";
   arrayNombresyCantidad.forEach(r=>{
        if(r[0].nombreP== r[0].nombreP){
         cont++;
         np=r[0].nombreP;
        }
        if(cont==0){
            descripcion="Producto:"+r[0].nombreP+"Cantidad:"+r[2];
            alert("producto"+r.nombreP);
        }
    });
   descripcion="Producto:"+np+""+"Cantidad:"+cont;
   EnvioPayU(descripcion)
}

const EnvioPayU=(e)=>{
  const formPayU=document.getElementById("formPayUdatos");
  const referenceCode=document.getElementById("referenceCode").value;
  const accountId=document.getElementById("idUsu").value;
  const firma="4Vj8eK4rloUd272L48hsrarnUA"+"~"+"926461"+"~"+referenceCode+"~"+totalCompra+"~"+"COP";
  const firmaMD5=CryptoJS.MD5(firma);
  const nombreCliente=nombre+apellido;
  const direccion=document.getElementById("direccion").value;
  formPayU.innerHTML+=`
   <input name="merchantId" type="hidden" value="926461" />
   <input name="referenceCode" type="hidden" value="${referenceCode}" />
   <input name="description" type="hidden" value="${e}" />
   <input name="amount" type="hidden" value="${totalCompra}" />
   <input name="tax" type="hidden" value="0" />
   <input name="taxReturnBase" type="hidden" value="0" />
   <input name="signature" type="hidden" value="${firmaMD5}" />
   <input name="accountId" type="hidden" value="${accountId}" />
   <input name="currency" type="hidden" value="COP" />
   <input name="buyerFullName" type="hidden" value="${nombreCliente}" />
   <input name="buyerEmail" type="hidden" value="${email}" />
   <input name="shippingCity" type="hidden" value="Medellin" />
   <input name="shippingCountry" type="hidden" value="COL" />
   <input name="telephone" type="hidden" value="${telefono}" />
   <input name="shippingAddress" type="hidden" value="calle77f#5636" />
   <input name="confirmationUrl" type="hidden" value="/Productos/Pedidos" />
   <input name="responseUrl" type="hidden" value="/Productos/finalizarCompra" />
   <button type="submit" id="btnPayU"><img src="https://ecommerce.payulatam.com/img-secure-2015/boton_pagar_grande.png"></button>
  `;    
}
FormularioPayU();