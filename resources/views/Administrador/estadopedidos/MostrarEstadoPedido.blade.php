@extends('adminlte::page')

@section('title', 'Tienda Axes | Administrador')

@section('content')
<div class="container">

    <div class="row mt-2">

        <div class="col-md-12 mt-5">

            <div class="row">

                <div class="col-md-12 text-center">

                    <h3><strong>Estados de los pedidos</strong></h3>
                    @if(Session::has("success"))
                            <div class="alert alert-success alert-dismissible"><button type="button" class="close">&times;</button>{{Session::get('success')}}</div>
                        @elseif(Session::has("failed"))
                            <div class="alert alert-danger alert-dismissible"><button type="button" class="close">&times;</button>{{Session::get('failed')}}</div>
                        @endif
                </div>
                <button class="btn btn-success mb-2" data-toggle="modal" data-target="#btnPediosEstado">Agregar</button>
                <a href="{{route('PDF')}}"><button class="btn btn-danger mb-2 ml-2"><i style="margin-right:5px;" class="fas fa-file-import"></i>Generar PDF</button></a>
                
            </div>

            <div class="col-md-12 mt-5">
                <div class="modal  fade" id="btnPediosEstado" tabindex="-1" role="dialog"  aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Crear Estado pedido</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{{url('/Administrador/pedidos/MostrarEstadoPedidos')}}" method="POST" class="form-group">
                            @csrf
                           <div class="row">
                             <div class="col-12"> 
                                <label>Estado pedido</label>
                                <input type="text" name="estado" class="form-control" placeholder="Verde - Rojo - Morado - Azul......"/>
                              </div>  
                              
                           </div>  
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                          <button type="submit" class="btn btn-primary">Crear</button>
                        </div>
                      </form>
                      </div>
                    </div>
                  </div>
                </div> 
            </div>


            <table class="table table-bordered data-table" id="estadosPedidos">

                <thead>

                    <tr>

                        <th >Id Estado</th>
                        <th >Estado pedido</th>
                        <th>Acciones</th>

                      


                    </tr>

                </thead>

                <tbody>
                    @foreach ($estado as $e)
                        
                    <tr>
                       <td>{{$e->Id_Estado}}</td>
                       <td>{{$e->Estado}}</td>
                       <td>
                           <a href="{{url('/Administrador/pedidos/MostrarEstadoPedidos/'.$e->Id_Estado)}}" class="btn btn-primary">Editar</a>
                          
                       </td>
                      
                    </tr>
                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />

    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">

    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

@stop

@section('js')

  <script>
    $(document).ready(function () {
        $('#pagos').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"

            }

        });
    });
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

@stop