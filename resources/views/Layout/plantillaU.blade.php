<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" id="csrf" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../Usuario/fontawesome-free-5.15.1-web/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../Usuario/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../Usuario/css/helper.min.css">
    <link rel="stylesheet" type="text/css" href="../Usuario/css/plugins.css">
    <link rel="stylesheet" type="text/css" href="../Usuario/css/style.css">
     <link rel="stylesheet" type="text/css" href="../Usuario/css/chat.css">
    <link rel="stylesheet" type="text/css" href="../Usuario/css/skin-default.css">
    <link rel="icon" href="../Usuario/img/logo.jpeg" />
    <title>Tienda Axes</title>
  </head>
  <body>
  <input type="hidden" value="{{csrf_token()}}" id="csrf" />
      <div class="wrapper">  
        <!-- header area start -->
        <header>

            <!-- header top start -->
            <div class="header-top-area bg-gray text-center text-md-left">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-5">
                        <div class="header-call-action">
                                <a href="mailto:axesskateboarding@gmail.com">
                                    <i class="fa fa-envelope"></i>
                                  Comúnicate axesskateboarding@gmail.com
                                </a>
                                <a href="https://wa.me/573016729248">
                                    <i class="fa fa-phone"></i>
                                   Comúnicate WhatsApp +57 301 6729248
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-7">
                            <div class="header-top-right float-md-right float-none">
                                <nav>
                                    <ul>
                                        <li>
                                            <div class="dropdown header-top-dropdown">
                                                <a class="dropdown-toggle" id="myaccount" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    @php 
                                                   
                                                    $datosS=session('datosU')
                                                   
                                                    @endphp
                                                    @if (($datosS!=null))
                                                       @foreach ($datosS as $item)
                                                     
                                                       Bienvenido, {{$item->name}}
                                                       @endforeach 
                                                       
                                                        <i class="fa fa-angle-down"></i>
                                                    @else
                                                     
                                                    <i class="fas fa-user"></i>   Mi Cuenta
                                                    <i class="fa fa-angle-down"></i>
                                                    @endif
                                                   
                                                </a>
                                               @if ($datosS==null)
                                               <div class="dropdown-menu" aria-labelledby="myaccount" id="OpcionesU">
                                                <a class="dropdown-item" href="{{route('login')}}"><i style="margin-right:3px;" class="fas fa-sign-in-alt"></i> Iniciar Sesión</a>
                                               </div>
                                               @else
                                                @if (session()->has('datosU'))
                                                <div class="dropdown-menu" aria-labelledby="myaccount" >
                                                    <input type="hidden" id="idUsu" value="{{$item->Id_Usuarios}}" />
                                                    <a class="dropdown-item" href="{{url('/Informacion/'.$item->Id_Usuarios)}}"><i style="margin-right:5px;" class="fas fa-user"></i>Mi Perfil</a>
                                                    <a class="dropdown-item" href="{{route('PedidosU')}}"><i style="margin-right:5px;" class="fa fa-truck"></i>Mis Pedidos</a>
                                                    <a class="dropdown-item" href="{{route('loginCerrar')}}"><i style="margin-right:5px;" class="fas fa-sign-out-alt"></i>Cerrar Sesión</a>
                                                   </div>    
                                                @endif
                                                 
                                               @endif
                                                
                                            </div>
                                        </li>
                                        <li>
                                        <i class="fas fa-shopping-cart"></i>    <a href="{{route('detalleCompra')}}">Mi Carrito</a>
                                        </li>
                                        <li>
                                        <button id="alerta" type="button" style="border:none; background:none;"><i class="fas fa-bell"></i></button>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>

            <div class="header-middle-area pt-20 pb-20">
              <div class="container">
                  <div class="row align-items-center">
                      <div class="col-lg-3">
                          <div class="brand-logo">
                              <a href="/">
                                  <img src="../Usuario/img/logo.jpeg" alt="brand logo">
                              </a>
                          </div>
                      </div> <!-- end logo area -->
                      <div class="col-lg-9">
                          <div class="header-middle-right">
                              <div class="header-middle-shipping mb-20">
                                  <div class="single-block-shipping">
                                      <div class="shipping-icon">
                                          <i class="far fa-clock"></i>
                                      </div>
                                      <div class="shipping-content">
                                      <h5>Horario de Atención</h5>
                                          <span>Lunes - Sábado: 7:00 A.M - 6:00 P.M</span>
                                      </div>
                                  </div> <!-- end single shipping -->
                                  <div class="single-block-shipping">
                                      <div class="shipping-icon">
                                          <i class="fa fa-truck"></i>
                                      </div>
                                      <div class="shipping-content">
                                          <h5>Costo del Envío</h5>
                                          <span>El valor del envío es de $10.000 COP</span>
                                      </div>
                                  </div> <!-- end single shipping -->
                                  <div class="single-block-shipping">
                                      <div class="shipping-icon">
                                          <i class="far fa-money-bill-alt"></i>
                                      </div>
                                      <div class="shipping-content">
                                          <h5>Descuentos</h5>
                                          <span>Se hacen de forma constante</span>
                                      </div>
                                  </div> <!-- end single shipping -->
                              </div>
                              @if(Session::has("success1"))
                            <div class="alert alert-success alert-dismissible"><button type="button" class="close">&times;</button>{{Session::get('success1')}}</div>
                                 @elseif(Session::has("failed"))
                            <div class="alert alert-danger alert-dismissible"><button type="button" class="close">&times;</button>{{Session::get('failed')}}</div>
                            @elseif(Session::has("failed1"))
                            <div class="alert alert-danger alert-dismissible"><button type="button" class="close">&times;</button>{{Session::get('failed1')}}</div>
                            @elseif(Session::has("failed2"))
                            <div class="alert alert-danger alert-dismissible"><button type="button" class="close">&times;</button>{{Session::get('failed2')}}</div>
                             @endif
                              <div class="header-middle-block">
                                  <div class="header-middle-searchbox">
                                  <form action="{{route('buscador')}}" method="POST">
                                    @csrf
                                    
                                      <input type="text" name="productoB" placeholder="Buscar Producto...">
                                      <button type="submit" id="buscar" class="search-btn"><i class="fa fa-search"></i></button>
                                      </form>
                                  </div>
                                  <div class="header-mini-cart">
                                      <div class="mini-cart-btn">
                                          <i class="fa fa-shopping-cart"></i>
                                          <span class="cart-notification" id="iconoTotal"></span>
                                      </div>
                                      <div class="cart-total-price">
                                          <span>total</span>
                                          <span id="totalC"></span>
                                      </div>
                                      <ul class="cart-list" id="carrito">
                                          
                                          
                                      </ul>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

  
        <!-- main menu area end -->

    </header>

    <br>

    <main class="main">

         @yield('paginas')
        </main>


        
  <footer>

    <!-- footer main start -->
    <div class="footer-widget-area pt-40 pb-38 pb-sm-10">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-widget mb-sm-30">
                        <div class="widget-title mb-10 mb-sm-6">
                            <h4>Contactanos</h4>
                        </div>
                        <div class="widget-body">
                            <ul class="location">
                                <li><i class="fa fa-envelope"></i>axesskateboarding@gmail.com</li>
                                <li><i class="fa fa-phone"></i>+57 301 6729248</li>
                                <li><i class="fa fa-map-marker"></i>CC EL DIAMANTE</li>
                            </ul>
                            <a class="map-btn" href="https://www.google.com/maps/place/El+diamante/@6.2612102,-75.5918983,17z/data=!3m1!4b1!4m5!3m4!1s0x8e442911a47ade77:0x43ad415a11e85407!8m2!3d6.2612102!4d-75.5897096?hl=es">Abrir en Google Maps</a>
                        </div>
                    </div> <!-- single widget end -->
                </div> <!-- single widget column end -->
                <div class="col-md-3 col-sm-6">
                    <div class="footer-widget mb-sm-30">
                        <div class="widget-title mb-10 mb-sm-6">
                            <h4>Redes Sociales</h4>
                        </div>
                        <div class="widget-body">
                            <ul>
                                <li><a href="https://www.facebook.com/AXES-Skateboarding-100422468179966"><i style="color:blue; margin-right:5px;" class="fab fa-facebook-f"></i>Siguenos en Facebook</a></li>
                                <li><a href="https://www.instagram.com/axes_sb/?hl=es"><i style="color:orange; margin-right:5px;" class="fab fa-instagram"></i>Siguenos en Instagram</a></li>
                                <li><a href="https://www.youtube.com/"><i style="color:red; margin-right:5px;" class="fab fa-youtube"></i>Siguenos en Youtube</a></li>

                            </ul>
                        </div>
                    </div> <!-- single widget end -->
                </div> <!-- single widget column end -->
           
                <div class="col-md-3 col-sm-6">
                    <div class="footer-widget mb-sm-30">
                        <div class="widget-title mb-10 mb-sm-6">
                            <h4>Métodos de Pago</h4>
                        </div>
                        <div class="widget-body">
                            <ul>
                                <li><i style="color:gray; margin-right:5px;" class="fas fa-credit-card"></i>Tarjeta de crédito</li>
                                <li><i style="color:orange; margin-right:5px;" class="fab fa-cc-mastercard"></i>Mastercard</li>
                                <li><i style="color:blue; margin-right:5px;" class="fab fa-cc-visa"></i>Visa</li>
                                <li><i style="color:green; margin-right:5px;" class="fas fa-motorcycle"></i>Domicilio</li>
                            </ul>
                        </div>
                    </div> <!-- single widget end -->
                </div> <!-- single widget column end -->

                <div class="col-md-3 col-sm-6">
                    <div class="footer-widget mb-sm-30">
                        <div class="widget-title mb-10 mb-sm-6">
                            <h4>Mas Información de la Empresa</h4>
                        </div>
                        <div class="widget-body">
                           <p style="text-aling:center; justify-content:center;"> Esta empresa se dedica a la venta de productos 100% colombianos para el deporte Skateboar.</p>
                        </div>
                    </div> <!-- single widget end -->
                </div> <!-- single widget column end -->
            </div>
        </div>
    </div>
    <!-- footer main end -->

    <!-- footer bootom start -->
    <div class="footer-bottom-area bg-gray pt-20 pb-20">
        <div class="container">
            <div class="footer-bottom-wrap">
                <div class="copyright-text">
                    <p>©2021 Todos los Derechos Reservados |  <strong>AXES SKATEBOARDING</strong></p>
                </div>
                <div class="payment-method-img">
                   <a style="color:#000;" href="{{route('terminos')}}"><p>Términos y Condiciones | </a> <a style="color:#000;" href="{{route('privacidad')}}">Política y Privacidad</a> </p>
                </div>
            </div>
        </div>
    </div>
    <!-- footer bootom end -->

</footer>
<!-- footer area end -->


<!-- Quick view modal end -->
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

<div id="body"> 
  
      <div id="chat-circle" class="btn btn-raised">
        <div id="chat-overlay"></div>
        <i class="fas fa-comment"></i>
	  </div>
  
       <div class="chat-box">
         <div class="chat-box-header">
          Chat en linea
         <span class="chat-box-toggle"><i class="material-icons">Cerrar</i></span>
       </div>
      <div class="chat-box-body">
        <div class="chat-box-overlay">   
        </div>
      <div class="chat-logs">
       
      </div><!--chat-log -->
    </div>
    <div class="chat-input">      
      <form>
        <input type="text" id="chat-input" placeholder="Enviar mensaje ..."/>
      <button type="submit" class="chat-submit" id="chat-submit"><i class="material-icons">Enviar</i></button>
      </form>      
    </div>
  </div>
  
  
  
  
</div>
<!-- Scroll to top start -->
<div class="scroll-top not-visible">
  <i class="fa fa-angle-up"></i>
</div>

<script>
  const divsImagenes=document.querySelector("#divPadreProductos");
  if(divsImagenes!=null){
  const nodos=divsImagenes.querySelectorAll("#imagenes");
  nodos.forEach(e=>{e.firstElementChild.classList.remove("img-sec")
                    e.firstElementChild.classList.add("img-pri")  
  });
}
</script>
<script src="https://www.gstatic.com/firebasejs/8.3.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.19.1/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.19.1/firebase-firestore.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.3.1/firebase-analytics.js"></script>
<script>
  var firebaseConfig = {
    apiKey: "AIzaSyADbRq5ER8UsC7-XnQ2srTiaoAsKt2qryg",
    authDomain: "axesskateborning-e0bf9.firebaseapp.com",
    projectId: "axesskateborning-e0bf9",
    storageBucket: "axesskateborning-e0bf9.appspot.com",
    messagingSenderId: "782465290202",
    appId: "1:782465290202:web:35da585c1a5cd19f587ae3",
    measurementId: "G-YB04YWTL2V" 
  };
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();
  const auth = firebase.auth();
  const db=firebase.firestore();
</script>
<script src="../Usuario/js/configFirebase.js"></script>
<script src="../Usuario/js/cart.js"></script>
<script src="../Usuario/js/detailscart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/core.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/md5.js"></script>
<script src="../Usuario/js/PayU.js"></script>
<script src="../Usuario/js/envios.js"></script>
<script src="../Usuario/js/jquery-3.3.1.min.js"></script>
<script src="../Usuario/js/chat.js"></script>
<script src="../Usuario/js/modernizr-3.6.0.min.js"></script>
<script src="../Usuario/js/popper.min.js"></script>
<script src="../Usuario/js/bootstrap.min.js"></script>
<script src="../Usuario/js/plugins.js"></script>
<script src="../Usuario/js/ajax-mail.js"></script>
<script src="../Usuario/js/main.js"></script>

  </body>
</html>