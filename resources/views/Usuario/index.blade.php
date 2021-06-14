@extends('Layout.plantillaU')
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
                                                <li><a href="{{route('promo')}}">Descuentos<i class="fas fa-percent"></i></a>
                                                    
                                                </li>
                                                <li><a href="#">shop grid layout <i class="fa fa-angle-right"></i></a>
                                                    
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


<div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="slider-wrapper-area">
                    <div class="hero-slider-active hero__1 slick-dot-style hero-dot">
                        <div class="single-slider" style="background-image: url(../Usuario/img/carrousel.jpg);">
                    
                        </div>
                      
                    </div>
                </div>
            </div>
        </div>
</div>

        <br><br><br>


        <div class="product-feature-wrapper mb-lg-6">
            <div class="container">
                <div class="row">
                    <!-- hot deals area start -->
                    <div class="col-lg-6">
                        <div class="hot-deals-wrap3 mb-30 mb-md-36 mb-sm-22 mt-xs-28">
                            <div class="section-title-2 d-flex justify-content-between mb-28">
                                 <h3>Más Vistos</h3>
                                 <div class="category-append"></div>
                            </div> <!-- section title end -->
                            <div class="deals-carousel-active2 slick-padding slick-arrow-style">
                                <!-- product single item start -->
                                <div class="product-item fix">
                                    <div class="product-thumb">
                                        <a href="product-details.html">
                                            <img src="assets/img/product/product-f-1.jpg" class="img-pri" alt="">
                                            <img src="assets/img/product/product-f-2.jpg" class="img-sec" alt="">
                                        </a>
                                        <div class="product-label">
                                            <span>hot</span>
                                        </div>
                                        <div class="product-action-link">
                                            <a href="#" data-toggle="modal" data-target="#quick_view"> <span data-toggle="tooltip" data-placement="left" title="Quick view"><i class="fa fa-search"></i></span> </a>
                                            <a href="#" data-toggle="tooltip" data-placement="left" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="left" title="Compare"><i class="fa fa-refresh"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="fa fa-shopping-cart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h4><a href="product-details.html">vertual product 01</a></h4>
                                        <div class="pricebox">
                                            <span class="regular-price">$70.00</span>
                                            <div class="ratings">
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                                <div class="pro-review">
                                                    <span>100 vistas - Valoraciones(5)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                                <!-- product single item end -->
                            </div>
                        </div>
                    </div>
                    <!-- hot deals area end -->
                    <!-- most view area start -->
                    <div class="col-lg-6">
                        <div class="hot-deals-wrap3 mb-30 mb-md-22 mb-sm-22 mt-sm-14">
                            <div class="section-title-2 d-flex justify-content-between mb-28">
                                 <h3>featured</h3>
                                 <div class="category-append"></div>
                            </div> <!-- section title end -->
                            <div class="deals-carousel-active2 slick-padding slick-arrow-style">
                                <!-- product single item start -->
                                <div class="product-item fix">
                                    <div class="product-thumb">
                                        <a href="product-details.html">
                                            <img src="assets/img/product/product-s-5.jpg" class="img-pri" alt="">
                                            <img src="assets/img/product/product-s-6.jpg" class="img-sec" alt="">
                                        </a>
                                        <div class="product-label">
                                            <span>hot</span>
                                        </div>
                                        <div class="product-action-link">
                                            <a href="#" data-toggle="modal" data-target="#quick_view"> <span data-toggle="tooltip" data-placement="left" title="Quick view"><i class="fa fa-search"></i></span> </a>
                                            <a href="#" data-toggle="tooltip" data-placement="left" title="Wishlist"><i class="fa fa-heart-o"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="left" title="Compare"><i class="fa fa-refresh"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="fa fa-shopping-cart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h4><a href="product-details.html">vertual product 01</a></h4>
                                        <div class="pricebox">
                                            <span class="regular-price">$70.00</span>
                                            <div class="ratings">
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span class="good"><i class="fa fa-star"></i></span>
                                                <span><i class="fa fa-star"></i></span>
                                                <div class="pro-review">
                                                <span>65 vistas - Valoraciones(5)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                                <!-- product single item end -->
                            </div>
                        </div>
                    </div>
                    <!-- most view area end -->
                </div>
            </div>
        </div>
   
        <!-- hero slider end -->

        <!-- page wrapper start -->
        <div class="page-wrapper pt-20">
            <div class="container">
                <div class="row">
                    <!-- sidebar start -->
                    <div class="col-lg-3 order-2 order-lg-1">
                        <!-- category menu start -->
                      
                        <!-- category menu end -->

                        <!-- sidebar banner start -->
                        <div class="home-single-sidebar mb-30 mt-md-36">
                            <div class="img-container fix img-full">
                                <a href="#">
                                    <img src="assets/img/banner/banner_left2.jpg" alt="">
                                </a>
                            </div>
                        </div>
                        <!-- sidebar banner end -->

                        <!-- best seller area start -->
                        <div class="main-sidebar category-wrapper fix mb-24">
                            <div class="section-title-2 d-flex justify-content-between mb-28">
                                <h3>Descuentos</h3>
                                <div class="category-append"></div>
                            </div> <!-- section title end -->
                            <div class="category-carousel-active row" data-row="3">
                            @foreach($productos as $p)
                            @if($p->descuento>=0.1 && $p->descuento <=0.6)
                                <div class="col">
                                    <div class="category-item">
                                        <div class="category-thumb">
                                            <a href="product-details.html">
                                                <img src="assets/img/product/product-img1.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="category-content">
                                        <h4><a href="{{url('/Productos/detalleProducto'.$p->id)}}">{{$p->nombre}}</a></h4>
                                            <div class="price-box">
                                            @if($p->descuento>=0.1)

                                        {{!$precioProducto=$p->precio}}
                                            {{!$valorDescuento=$precioProducto*$p->descuento}}
                                            {{!$precioProductoDescu=$precioProducto-$valorDescuento}}
                                                <div class="regular-price">
                                                    ${{$precioProductoDescu}}
                                                </div>
                                                <div class="old-price">
                                                    <del>${{$p->precio}}</del>
                                                </div>
                                                @endif
                                            </div>
                                           
                                        </div>
                                    </div> <!-- end single item -->
                                </div> <!-- end single item column -->
                                @endif
                               @endforeach
                            </div>
                        </div>
                        <!-- best seller area end -->                   

                    </div>
                    <!-- sidebar end -->
                    <!-- main wrapper start -->
                    <div class="col-lg-9 order-1 order-lg-2" id="divPadreProductos">
                        <!-- category tab area start -->
                        <div class="category-tab-area mb-30 mt-md-16 mt-sm-16">
                            <div class="category-tab">
                                <ul class="nav">
                                    <li>
                                        <i class="fa fa-star-o"></i>
                                    </li>
                                    <li>
                                        <a class="active" data-toggle="tab" href="#tab_one">Productos</a>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab_one">
                                <div class="feature-category-carousel-wrapper">
                                    <div class="container">
                                        <div class="featured-carousel-active2 row arrow-space slick-arrow-style" data-row="2">
                                        @foreach($productos as $producto)
                                            <!-- product single item start -->
                                            <div class="col">
                                                <div class="product-item fix mb-30">
                                                    <div class="product-thumb">
                                                    <a href="{{url('/Productos/detalleProducto'.$producto->id)}}"  id="imagenes">
                                   
                                   @foreach ($imagenes as $imagen)
                                    @if($imagen->id == $producto->id)
                                            <img src="{{asset('storage').'/'.$imagen->foto}}" class="img-sec" width="200" height="200"  alt="">
                                                @endif
                                     @endforeach                         
                                  </a>
                                                        <div class="product-action-link">
                                                        <a style="margin-top:70px;" href="{{url('/Productos/detalleProducto'.$producto->id)}}" data-toggle="tooltip" data-placement="left" title="Ver Detalle"><i class="fas fa-eye"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-content">
                                                    <h4><a href="{{url('/Productos/detalleProducto'.$producto->id)}}">{{$producto->nombre}}</a></h4>
                                                        <div class="pricebox">
                                                        @if($producto->descuento>=0.1)

                                                        {{!$precioProducto=$producto->precio}}
                                                           {{!$valorDescuento=$precioProducto*$producto->descuento}}
                                                            {{!$precioProductoDescu=$precioProducto-$valorDescuento}}
                                                        <span class="regular-price">${{$precioProductoDescu}}</span>
                                                        <div class="old-price">
                                                                <del>${{$producto->precio}}</del>
                                                            </div>
                                                        @else
                                                        <span class="regular-price">${{$producto->precio}}</span>
                                                        @endif
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            <!-- product single item end -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab_two">
                                
                            </div>
                          
                        </div>
                        <!-- category tab area start -->

                        <!-- banner statistics start -->
                        <div class="banner-statistic banner-style-4 pb-36">
                            <div class="img-container fix img-full">
                                <a href="#">
                                    <img src="assets/img/banner/home3_static5.jpg" alt="">
                                </a>
                            </div>
                        </div>
                        <!-- banner statistics end -->

                        <!-- featured category area start -->
                        <div class="feature-category-area">
                            <div class="section-title mb-30">
                                <div class="title-icon">
                                    <i class="fa fa-gift"></i>
                                </div>
                                <h3>Productos Nuevos</h3>
                            </div> 
                            <!-- section title end -->
                            <!-- featured category start -->
                            <div class="container">
                                <div class="featured-carousel-active2 row slick-arrow-style" data-row="2">
                                @foreach($productos as $producto)
                                @if($producto->created_at >= "2021-06-09")
                                    <!-- product single item start -->
                                    <div class="col">
                                        <div class="product-item fix mb-30">
                                            <div class="product-thumb">
                                            <a href="{{url('/Productos/detalleProducto'.$producto->id)}}"  id="imagenes">
                                   
                                   @foreach ($imagenes as $imagen)
                                    @if($imagen->id == $producto->id)
                                            <img src="{{asset('storage').'/'.$imagen->foto}}" class="img-sec" width="200" height="200"  alt="">
                                                @endif
                                     @endforeach                         
                                  </a>
                                                <div class="product-label">
                                                    <span>Nuevo</span>
                                                </div>
                                                <div class="product-action-link">
                                                <a style="margin-top:70px;" href="{{url('/Productos/detalleProducto'.$producto->id)}}" data-toggle="tooltip" data-placement="left" title="Ver Detalle"><i class="fas fa-eye"></i></a>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                            <h4><a href="{{url('/Productos/detalleProducto'.$producto->id)}}">{{$producto->nombre}}</a></h4>
                                            <div class="pricebox">
                                                        @if($producto->descuento>=0.1)

                                                        {{!$precioProducto=$producto->precio}}
                                                           {{!$valorDescuento=$precioProducto*$producto->descuento}}
                                                            {{!$precioProductoDescu=$precioProducto-$valorDescuento}}
                                                        <span class="regular-price">${{$precioProductoDescu}}</span>
                                                        <div class="old-price">
                                                                <del>${{$producto->precio}}</del>
                                                            </div>
                                                        @else
                                                        <span class="regular-price">${{$producto->precio}}</span>
                                                        @endif
                                                        </div>
                                            </div>
                                        </div>
                                    </div>
                                   @endif
                                    @endforeach
                                    <!-- product single item end -->
                                </div>
                                
                            </div>
                        </div>
                        <!-- featured category area end -->

                    </div>
                
                    <!-- main wrapper end -->
                </div>
            </div>
        </div>
        <!-- page wrapper end -->
         
@endsection

