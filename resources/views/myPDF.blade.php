<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Reporte Stock Productos</title>
        <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
        <style>
       h2{
           color:blue;
       }
       #cajas{
           widht:100%;
       }
       .caja{
           width:150px;
           height: 150px;
           border: 1px solid black;
           background:#ccc;
           margin-bottom:5px;
       }

       #cabecera img{
        float: right;
        margin-bottom:150px;
       }
       hr{
        margin-top:60px;
  
       }
       table { 
        font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
        font-size: 30px;
        margin: 45px 10px;
        width: 770px; 
        text-align: left;   
        border-collapse: collapse; 
    }

th { 
    font-size: 16px;    
    font-weight: normal;    
    padding: 6px;    
    background: #b9c9fe;
    border-top: 4px solid #aabcfe;   
    border-bottom: 1px solid #fff; 
    color: #000; 
    }

td {
    padding: 8px;    
    background: #e8edff;    
    border-bottom: 1px solid #fff;
    color: #669;   
    border-top: 1px solid transparent; 
    }

tr:hover td { background: #d0dafd; color: #339; 
}

/*------ footer bootom start -------*/
.footer-bottom-wrap {
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    -webkit-align-items: center;
    -moz-align-items: center;
    -ms-align-items: center;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-justify-content: space-between;
    -moz-justify-content: space-between;
    -ms-justify-content: space-between;
    -webkit-box-pack: justify;
    justify-content: space-between;
    -ms-flex-pack: space-between;
}

@media only screen and (max-width: 767px) {
    .footer-bottom-wrap {
        display: block;
        text-align: center;
    }
}

.footer-bottom-wrap .copyright-text p {
    color: #404040;
    font-size: 20px;
    text-transform: capitalize;
}

.footer-bottom-wrap .copyright-text p a {
    color: #d8373e;
}

.footer-bottom-wrap .copyright-text p a:hover {
    text-decoration: underline;
}

    </style>
    
    </head>
    <body>
    <div id="cabecera">
            <img src="data:image/png;base64,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" >
         </div> 
        <h1>Reporte Stock Productos </h1>
            
        <hr>
      
        <div id="cajas">
         
        <table class="table table-bordered data-table" id="usuarios">

<thead>

    <tr>

        <th width="10">Id Producto</th>

        <th>Nombre</th>

        <th>Stock</th>

        <th>Fecha</th>

        <th>Cantidad Añadida</th>

    

    </tr>

</thead>

<tbody>
    @foreach ($entradaProductos as $entrada)
        
    <tr>
        <td>{{$entrada->id}}</td>
        <td>{{$entrada->nombre}}</td>
        <td>{{$entrada->stock}}</td>
        <td>{{$entrada->fecha}}</td>
        <td>{{$entrada->cantidad}}</td>
        
    </tr>
    @endforeach

</tbody>

</table>
          

        </div>
        
<footer>


<!-- footer bootom start -->
<div class="footer-bottom-area bg-gray pt-20 pb-20">
    <div class="container">
        <div class="footer-bottom-wrap">
            <div class="copyright-text">
                <p>©2021 Todos los Derechos Reservados |  <strong>AXES SKATEBOARDING</strong></p>
            </div>
        </div>
    </div>
</div>
<!-- footer bootom end -->

</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    </body>
</html>