@extends('.Layout.plantillaU')
@section('paginas')

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
                                       
                                        <li><a href="#">Productos <i class="fa fa-angle-down"></i></a>
                                            <ul class="dropdown">
                                                <li><a href="#">shop grid layout <i class="fa fa-angle-right"></i></a>
                                                    <ul class="dropdown">
                                                        <li><a href="shop-grid-left-sidebar.html">shop grid left
                                                                sidebar</a></li>
                                                        <li><a href="shop-grid-left-sidebar-3-col.html">left
                                                                sidebar 3 col</a></li>
                                                        <li><a href="shop-grid-right-sidebar.html">shop grid right
                                                                sidebar</a></li>
                                                        <li><a href="shop-grid-right-sidebar-3-col.html">grid right
                                                                sidebar 3 col</a></li>
                                                        <li><a href="shop-grid-full-3-col.html">shop grid full 3
                                                                column</a></li>
                                                        <li><a href="shop-grid-full-4-col.html">shop grid full 4
                                                                column</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">shop list layout <i class="fa fa-angle-right"></i></a>
                                                    <ul class="dropdown">
                                                        <li><a href="shop-list-left-sidebar.html">shop list left
                                                                sidebar</a></li>
                                                        <li><a href="shop-list-right-sidebar.html">shop list right
                                                                sidebar</a></li>
                                                        <li><a href="shop-list-full.html">shop list full width</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">products details <i class="fa fa-angle-right"></i></a>
                                                    <ul class="dropdown">
                                                        <li><a href="product-details.html">product details</a></li>
                                                        <li><a href="product-details-affiliate.html">product
                                                                details
                                                                affiliate</a></li>
                                                        <li><a href="product-details-variable.html">product details
                                                                variable</a></li>
                                                        <li><a href="product-details-group.html">product details
                                                                group</a></li>
                                                        <li><a href="product-details-box.html">product details box
                                                                slider</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
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

<div class="checkout-page-wrapper">
            <div class="container">             
        
                <div class="row">
                    <!-- Checkout Billing Details -->
                    <div class="col-lg-6">
                        <div class="checkout-billing-details-wrap">
                            <h2>Datos Personales</h2>
                            <div class="billing-form-wrap">
                                <form method="post" action="{{url('/Productos/finalizarCompra')}}"  id="formFinalizar">
                                    @csrf
                                    <input name="referenceCode" type="hidden"  value="{{$pedido}}" id="referenceCode">
                                   @foreach($usuario as $u)                                 
                                <div class="single-input-item">
                                     <input type="hidden" name="idUsuario" value="{{$u->Id_Usuarios}}"/>
                                        <label for="documento" class="required">Documento</label>
                                        <input type="text" name="documento" id="documento" value="CC{{$u->identificacion}}" placeholder="Documento" disabled>
                                    </div>
                                    <div class="row">
            
                                        <div class="col-md-6">
                                            <div class="single-input-item">
                                                <label for="f_name" class="required">Nombre</label>
                                                <input type="text" name="nombre" id="f_name" value="{{$u->name}}" placeholder="Nombre" required />
                                            </div>
                                        </div>
        
                                        <div class="col-md-6">
                                            <div class="single-input-item">
                                                <label for="l_name" class="required">Apellido</label>
                                                <input type="text" name="apellido" id="l_name" value="{{$u->apellido}}" placeholder="Apellido" required />
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="single-input-item">
                                        <label for="email" class="required">Correo</label>
                                        <input type="email" name="correo" id="email" value="{{$u->email}}" placeholder="Correo Electronico" required />
                                    </div>
                                    
                                    <div class="single-input-item">
                                                <label for="town_2" class="required">Ciudad</label>
                                                <input type="text" id="town_2"  placeholder="Ciudad" />
                                            </div>

                                    <div class="single-input-item">
                                        <label for="phone" class="required">Teléfono</label>
                                        <input type="text" id="phone" name="telefono"  value="{{$u->telefono}}" placeholder="Teléfono" />
                                    </div>
      
                                    <div class="single-input-item">
                                        <label for="phone" class="required">Direccion</label>
                                        <input type="text" name="direccion" id="direccion"  placeholder="Calle ..." />
                                    </div>
                                    @endforeach
                                
                            </div>
                        
                        
                          
                        </div>
                    </div>
        
                    <!-- Order Summary Details -->
                    <div class="col-lg-6">
                        <div class="order-summary-details mt-md-26 mt-sm-26">
                            <h2>Su resumen del Pedido</h2>
                            <div class="order-summary-content mb-sm-4">
                                <!-- Order Summary Table -->
                                <div class="order-summary-table table-responsive text-center">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Productos</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbodyFinalizarCompra">
                                            
                                           
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>Sub Total</td>
                                                <td><strong id="subtotalD"></strong></td>
                                            </tr>
                                       
                                            <tr>
                                                <td>Total + Envío</td>
                                                <td><strong id="totalD"></strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- Order Payment Method -->
                                <div class="order-payment-method">
                                    <div class="single-payment-method show">
                                        <div class="payment-method-name">
                        
                                    </div>
                                
                                    <button type="submit" id="contraEntrega" class="btn btn-dark">Contra Entrega</button>
                                </form>
                                
                                      <form id="formPayUdatos"   method="post" action="https://sandbox.api.payulatam.com/payments-api/4.0/service.cgi"> 
                                      
                                      
                                     </form>
                                    
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection
