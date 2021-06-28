const btnPayu=document.getElementById("btnPayU");
const divtotalCompra=document.getElementById("totalCompra");
const divnombre=document.getElementById("f_name");
const divapellido=document.getElementById("l_name");
const divemail=document.getElementById("email");
const divtelefono=document.getElementById("phone");
const divFormPayu=document.getElementById("divformPayU");
if(btnPayu !=null){
btnPayu.addEventListener("click", ()=>{
    FormularioPayU();
});
}
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
  const referenceCode=document.getElementById("referenceCode").value;
  const accountId=document.getElementById("idUsu").value;

  const firma="4Vj8eK4rloUd272L48hsrarnUA"+"~"+"926461"+"~"+referenceCode+"~"+totalCompra+"~"+"COP";
  const firmaMD5=CryptoJS.MD5(firma);
  const nombreCliente=nombre+apellido;
  const direccion=document.getElementById("direccion").value;
  const data= new URLSearchParams();
             data.append("merchantId","926461");
             data.append("referenceCode",referenceCode);
             data.append("description",e);
             data.append("amount", totalCompra );
             data.append("tax",0);
             data.append("taxReturnBase",0);
             data.append("signature",firmaMD5);
             data.append("accountId",accountId);
             data.append("currency","COP");
             data.append("buyerFullName",nombreCliente);
             data.append("buyerEmail",email);
             data.append("shippingAddress",direccion);
             data.append("shippingCity","Medellin");
             data.append("shippingCountry","COL");
             data.append("telephone",telefono)
             data.append("responseUrl","/Productos/Pedidos")
             data.append("confirmationUrl","Productos/finalizarCompra")
             data.append("responseUrl", "https://biz.payulatam.com/B0e22fd45D26DF4")
  fetch('https://sandbox.checkout.payulatam.com/ppp-web-gateway-payu',{
    method: 'POST',
    mode: 'no-cors',
    body: data
  })
  .then((r)=>{
     
  })
  .catch((r)=>{
      console.log(r);
  })
}