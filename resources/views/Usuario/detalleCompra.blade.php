@extends('Layout.plantillaU')
@section('paginas')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="main-header-wrapper bdr-bottom1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-header-inner">
                            <div class="category-toggle-wrap">
                                <div class="category-toggle">
                                    Categorias
                                    <div class="cat-icon">
                                        <i class="fa fa-angle-down"></i>
                                    </div>
                                </div>
                                @if(Session::has("failed3"))
                      <script>
                        Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Debes iniciar sesión para finalizar la compra.',
                        })
                      </script>
                      @endif
                                <nav class="category-menu hm-1">
                                    <ul>
                                    @foreach($categorias as $Categorias)
                                        <li><a href="{{route('categorias',$Categorias)}}"><i style="color:red" class="fas fa-check"></i>
                                            {{$Categorias->Nombre_Categoria}}</a></li>
                                     @endforeach                                         
                                                            
                                    </ul>
                                </nav>
                            </div>
                            <div class="main-menu">
                                <nav id="mobile-menu">
                                    <ul>
                                        <li class="active"><a href="/"><i class="fa fa-home"></i>Inicio</a>
                                            
                                        </li>
                                       
                                        <li><a href="{{route('promo')}}">Descuentos<i class="fas fa-percent"></i></a>
                                                                                  
                                        </li>
                                       
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 d-block d-lg-none">
                        <div class="mobile-menu"></div>
                    </div>
                </div>
            </div>
        </div>            

        <br>
        <div class="modal fade" id="formUsuarioGoogle" tabindex="-1" role="dialog" aria-labelledby="formUsuarioGoogle" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Datos Necesarios Usuario</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="formGoogleU" action="{{url('/Productos/FinalizarCompraGoogle')}}">
                    <div class="single-input-item">
                        <input type="text" placeholder="N° de identificacion" id="identificacion"/>
                    </div>
                    <div class="single-input-item">
                        <input type="text" placeholder="telefono" id="telefono"/>
                    </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  <button type="button" id="btnDatosGoogleU" class="btn btn-primary">Enviar</button>
                </div>
            </form>
              </div>
            </div>
          </div>

<div class="cart-main-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Cart Table Area -->
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="pro-thumbnail">Imagen</th>
                                    <th class="pro-title">Producto</th>
                                    <th class="pro-price">Precio</th>
                                    <th class="pro-quantity">Cantidad</th>
                                    <th class="pro-remove">Eliminar</th>
                                </tr>
                                </thead>
                                <tbody id="tbodyC">
                                   
                                </tbody>
                            </table>
                        </div>
        
                    </div>
                </div>
        
                <div class="row">
                    <div class="col-lg-5 ml-auto">
                        <!-- Cart Calculation Area -->
                        <div class="cart-calculator-wrapper">
                            <div class="cart-calculate-items">
                                <h3>Pedido Total</h3>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <td>Sub Total</td>
                                            <td id="subtotalD"></td>
                                        </tr>
                                        <tr>
                                            <td>Envio</td>
                                            <td>$10.000</td>
                                        </tr>
                                        <tr class="total">
                                            <td>Total</td>
                                            <td class="total-amount" id="totalD"></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <a href="/Productos/finalizarCompra" id="btnProcederPagar" class="sqr-btn d-block">Proceder a pagar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
