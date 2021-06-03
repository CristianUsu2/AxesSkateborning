@extends('adminlte::page')

@section('title', 'Tienda Axes | Administrador')


@section('content')
 <div class="container">
  <div class="col-12" >
    <input type="hidden" id="csrf" value="{{csrf_token()}}"/>
    <form>
       <div class="col-12 mb-4">
        <h1>Descuentos de productos</h1>
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
            <label>Precio producto</label>
            <input class="form-control" type="text" id="precioProducto"  disabled/>
           </div>
        
        <div class="col-4 form-group">
         <label>Ingresar valor del descuento</label>
         <input class="form-control" type="text" id="descuentoProducto" />
        </div>
        
        <div class="col-4 form-group">
            <label>Precio con descuento del producto</label>
            <input class="form-control" type="text" id="precioDescuentoProd" disabled />
        </div>
    </div>
    <button type="button" class="btn btn-success" id="btnEnviarDescu">Enviar</button>
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
    const precio=document.getElementById("precioProducto");
    const inputDescuento=document.getElementById("descuentoProducto");
    const precioDescuento=document.getElementById("precioDescuentoProd");
    const btnEnviarDescu=document.getElementById("btnEnviarDescu");
    let valorDescuento=0;
    select.addEventListener("change",()=>{ obtenerPreciosProducto()});
    inputDescuento.addEventListener("change",()=>{
        const valorD=inputDescuento.value;
        const longitud=valorD.lenght;
        if(longitud == 1){
          valorDescuento="0.0"+valorD;
        }else{
          valorDescuento="0."+valorD;
        }   
        DescuentoProducto(valorDescuento);
    })
    btnEnviarDescu.addEventListener("click",()=>{
        EnvioDescuentoProducto(select.value, valorDescuento);
    });
    const obtenerPreciosProducto=()=>{
        const id=select.value;
        const data=new URLSearchParams();
        data.append("id", id);
        fetch('/Administrador/productos/DescuentosProductos',{
            headers:{
                'X-CSRF-TOKEN': csrf
            },
            body: data,
            method: "post",
        })
        .then(r=>r.json())
        .then(data=> data!=-1 ? precio.value=data: precio.value='')
        .catch(error=>console.log(error))
    }
   
   const DescuentoProducto=(e)=>{
     const id=select.value;
     const descuento=e;
     console.log(descuento)
     const data=new URLSearchParams();
     data.append("id", id);
     data.append("descuento",descuento);
     data.append("accion", 1);
     fetch('/Administrador/productos/DescuentosProductos',{
       headers:{
        'X-CSRF-TOKEN': csrf
       },
       body:data,
       method:"post"  
     })
     .then(response=>response.json())
     .then(r=>r!=-1 ? precioDescuento.value=r : precioDescuento.value='')
     .catch(error=>console.log(error))
   }

   const EnvioDescuentoProducto=(id,valorD)=>{
       let data=new URLSearchParams();
       data.append("id",id);
       data.append("descuento",valorD);
       fetch('/Administrador/productos/DescuentosProductos',{
        headers:{
                'X-CSRF-TOKEN': csrf
            },
            body: data,
            method: "post",
       })
       .then(r=>r.json())
       .then(data=>data==1 ? alert("si si dormir mpp") : alert("f mpp"))
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