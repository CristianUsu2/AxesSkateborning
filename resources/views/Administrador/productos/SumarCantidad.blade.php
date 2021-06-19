@extends('adminlte::page')

@section('title', 'Tienda Axes | Administrador')


@section('content')
<div class="col-sm5" id="alerta"></div>
 <div class="container">
  <div class="col-12" >
    <input type="hidden" id="csrf" value="{{csrf_token()}}"/>
    <form>
       <div class="col-12 mb-4">
        <h1>Sumar cantidad de producto</h1>
       </div>
       <div class="row">

        <div class="col-4 form-group">
          <label for="exampleFormControlSelect1">Seleccione el producto</label>
          <select class="form-control" id="producto">
              <option selected>Elegir un producto</option>
            @foreach ($productos as $p)
            <option value="{{$p->id}}">{{$p->nombre}}</option>      
            @endforeach    
          </select>
        </div>
        
        <div class="col-4 form-group">
            <label>Stock del producto</label>
            <input class="form-control" type="text" id="cantidad"  disabled/>
           </div>
        
        <div class="col-4 form-group">
         <label>Seleccionar Talla</label>
         <select class="custom-select" id="talla">
         <option selected>Choose...</option>
         @foreach($tallas as $t)
    <option value="{{$t->id}}">{{$t->talla}}</option>
     
    @endforeach
  </select>
        </div>
        <div class="col-4 form-group">
         <label>Ingresar cantidad</label>
         <input class="form-control" type="text" id="cantidadSum" />
        </div>
        
    </div>
    <button type="button" class="btn btn-success" id="btnEnviarSum">Enviar</button>
      </form>
  </div>
 </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />

    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">

    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@stop

@section('js')
<script>
    const select=document.getElementById("producto");
    const csrf=document.getElementById("csrf").value;
    const stock=document.getElementById("cantidad");
    const inputCantidadSum=document.getElementById("cantidadSum");
    const btnEnviarSum=document.getElementById("btnEnviarSum");
    select.addEventListener("change",()=>{ obtenerStockProducto()});
    btnEnviarSum.addEventListener("click",()=>{
        const cantidadSumar=inputCantidadSum.value; 
        if(cantidadSumar!=null){
        SumarStock(cantidadSumar); 
        }else{
            alert("debes llenar el campo de ingresar cantidad");
        }
    });
    const obtenerStockProducto=()=>{
        const id=select.value;
        const data=new URLSearchParams();
        data.append("id", id);
        fetch('/Administrador/productos/SumarCantidad',{
            headers:{
                'X-CSRF-TOKEN': csrf
            },
            body: data,
            method: "post",
        })
        .then(r=>r.json())
        .then(data=> data!=-1 ? stock.value=data: stock.value='')
        .catch(error=>console.log(error))
    }
   
   const SumarStock=(CantidadSumar)=>{
     const id=select.value;
     const talla=document.getElementById("talla").value;
     const data=new URLSearchParams();
     data.append("id", id);
     data.append("cantidad",CantidadSumar);
     data.append("talla", talla);
     fetch('/Administrador/productos/SumarCantidad',{
       headers:{
        'X-CSRF-TOKEN': csrf
       },
       body:data,
       method:"post"  
     })
     .then(response=>response.json())
     .then(r=>{
        if(r==true){
          const alerta=document.getElementById("alerta");
          alerta.innerHTML+=`
          <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Se modifico!</strong> Se ejecuto la accion.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>`;
           
             inputCantidadSum.value='';
             stock.value='';
             select.value='';
             talla.value='';
    
        }})
     .catch(error=>console.log(error))
   }

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>

@stop