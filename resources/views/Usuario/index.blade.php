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


<div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="slider-wrapper-area">
                    <div class="hero-slider-active hero__1 slick-dot-style hero-dot">
                        <div class="single-slider" style="background-image: url(../Usuario/img/carrousel.jpg);">
                            <div class="container p-0">
                                <div class="slider-main-content">
                                    
                                  
                                </div>
                            </div>
                        </div>
                        <div class="single-slider" style="background-image: url(../Usuario/img/slider12_bg.jpg);">
                            <div class="container p-0">
                                <div class="slider-main-content">
                                    <div class="slider-content-img">
                                        <img src="../Usuario/img/slider11_lable1.png" alt="">
                                        <img src="../Usuario/img/slider11_lable2.png" alt="">
                                        <img src="../Usuario/img/slider11_lable3.png" alt="">
                                    </div>
                                    <div class="slider-text">
                                        <div class="slider-label">
                                            <img src="../Usuario/img/slider11_lable4.png" alt="">
                                        </div>
                                        <h1>samson s90</h1>
                                        <p>Typi Non Habent Claritatem Insitam; Est Usus Legentis</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    
    <div class="banner-area mt-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 order-1">
                    <div class="img-container img-full fix imgs-res mb-sm-30">
                        <a href="#">
                            <img src="../Usuario/img/banner_left.jpg" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5 order-sm-3">
                    <div class="img-container img-full fix mb-30">
                        <a href="#">
                            <img src="../Usuario/img/banner_static_top1.jpg" alt="">
                        </a>
                    </div>
                    <div class="img-container img-full fix mb-30">
                        <a href="#">
                            <img src="../Usuario/img/banner_static_top2.jpg" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 order-2 order-md-3">
                    <div class="img-container img-full fix">
                        <a href="#">
                            <img src="../Usuario/img/banner_static_top3.jpg" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
  


<div class="page-wrapper pt-6 pb-28 pb-md-6 pb-sm-6 pt-xs-36">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="home-sidebar">

                    <!-- best seller area start -->
                    <div class="main-sidebar category-wrapper mb-24">
                        <div class="section-title-2 d-flex justify-content-between mb-28">
                            <h3>Promociones</h3>
                            <div class="category-append"></div>
                        </div> <!-- section title end -->
                        <div class="category-carousel-active row" data-row="4">
                            <div class="col">
                            @foreach($productos as $producto)

                                <div class="category-item">
                                    <div class="category-thumb">
                                        <a href="product-details.html">
                                            <img src="../Usuario/img/product-img1.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="category-content">
                                        <h4><a href="product-details.html">{{$producto->nombre}}</a></h4>
                                        <div class="price-box">
                                            <div class="regular-price">
                                                $150.00
                                            </div>
                                            <div class="old-price">
                                                <del>$180.00</del>
                                            </div>
                                        </div>
                                        <div class="ratings">
                                            <span class="good"><i class="fa fa-star"></i></span>
                                            <span class="good"><i class="fa fa-star"></i></span>
                                            <span class="good"><i class="fa fa-star"></i></span>
                                            <span class="good"><i class="fa fa-star"></i></span>
                                            <span><i class="fa fa-star"></i></span>
                                            <div class="pro-review">
                                                <span>1 review(s)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end single item -->
                                @endforeach

                            </div> <!-- end single item column -->     
             
                        </div>
                        
                    </div>
                    <!-- best seller area end -->

                   

                   

                </div>
            </div>
            <!-- end home sidebar -->

            <div class="col-lg-9" id="divPadreProductos">
                <!-- featured category area start -->
                <div class="feature-category-area mt-md-70">
                    <div class="section-title mb-30">
                        <div class="title-icon">
                            <i class="fa fa-bookmark"></i>
                        </div>
                        <h3>Productos Nuevos</h3>
                    </div> <!-- section title end -->
                    <!-- featured category start -->
                    <div class="featured-carousel-active slick-padding slick-arrow-style">
                        <!-- product single item start -->
                        @foreach ($productos as $producto)
                        <div class="product-item fix">
                            <div class="product-thumb">
                                <a href="{{url('/Productos/detalleProducto'.$producto->id)}}"  id="imagenes">
                                    @foreach ($imagenes as $imagen)
                                    @if($imagen->id == $producto->id)
                                    <img src="{{asset('storage').'/'.$imagen->foto}}" class="img-sec" width="200" height="200"  alt="">
                                    @endif
                                    @endforeach
                                   
                                   
                                </a>
                                <div class="product-label">
                                    <span>nuevo</span>
                                </div>
                                <div class="product-action-link">
                                    <a href="#" data-toggle="modal" data-target="#quick_view"> <span
                                            data-toggle="tooltip" data-placement="left" title="Quick view"><i
                                                class="fas fa-shopping-cart"></i></span> </a>
                                    <a href="{{url('/Productos/detalleProducto'.$producto->id)}}" data-toggle="tooltip" data-placement="left" title="Wishlist"><i
                                            class="fas fa-eye"></i></a>
                                    
                                    
                                </div>
                            </div>
                            <div class="product-content">
                                <h4><a href="product-details.html">{{$producto->nombre}}</a></h4>
                                <div class="pricebox">
                                    <span class="regular-price">{{$producto->precio}}</span>
                                    <div class="ratings">
                                        <span class="good"><i class="fa fa-star"></i></span>
                                        <span class="good"><i class="fa fa-star"></i></span>
                                        <span class="good"><i class="fa fa-star"></i></span>
                                        <span class="good"><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <div class="pro-review">
                                            <span>1 review(s)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- product single item end -->
                        <!-- product single item start -->
                      
                        <!-- product single item end -->
                    </div>
                    <!-- featured category end -->
                </div>

                <br>
                <br>
                <!-- category features area start -->
                <div class="feature-category-area mt-md-70">
                    <div class="section-title mb-30">
                        <div class="title-icon">
                            <i class="fa fa-bookmark"></i>
                        </div>
                        <h3>Productos Nuevos</h3>
                    </div> <!-- section title end -->
                    <!-- featured category start -->
                    <div class="featured- slick-padding ">
                        <!-- product single item start -->
                        @foreach ($productos as $producto)
                        <div class="product-item fix">
                            <div class="product-thumb">
                                <a href="{{url('/Productos/detalleProducto'.$producto->id)}}"  id="imagenes">
                                    @foreach ($imagenes as $imagen)
                                    @if($imagen->id == $producto->id)
                                    <img src="{{asset('storage').'/'.$imagen->foto}}" class="img-sec" width="200" height="200"  alt="">
                                    @endif
                                    @endforeach
                                   
                                   
                                </a>
                                <div class="product-label">
                                    <span>nuevo</span>
                                </div>
                                <div class="product-action-link">
                                    <a href="#" data-toggle="modal" data-target="#quick_view"> <span
                                            data-toggle="tooltip" data-placement="left" title="Quick view"><i
                                                class="fas fa-shopping-cart"></i></span> </a>
                                    <a href="{{url('/Productos/detalleProducto'.$producto->id)}}" data-toggle="tooltip" data-placement="left" title="Wishlist"><i
                                            class="fas fa-eye"></i></a>
                                    
                                    
                                </div>
                            </div>
                            <div class="product-content">
                                <h4><a href="product-details.html">{{$producto->nombre}}</a></h4>
                                <div class="pricebox">
                                    <span class="regular-price">{{$producto->precio}}</span>
                                    <div class="ratings">
                                        <span class="good"><i class="fa fa-star"></i></span>
                                        <span class="good"><i class="fa fa-star"></i></span>
                                        <span class="good"><i class="fa fa-star"></i></span>
                                        <span class="good"><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <div class="pro-review">
                                            <span>1 review(s)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- product single item end -->
                        <!-- product single item start -->
                      
                        <!-- product single item end -->
                    </div>
                    <!-- featured category end -->
                </div>
                <!-- category features area end -->
                {{$productos->links()}}
            </div>
        </div>
    </div>
</div>

         
@endsection

