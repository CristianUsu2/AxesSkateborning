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
<br>

<div class="page-main-wrapper">
            <div class="container">
                <div class="row">
                    <!-- sidebar start -->
                    <div class="col-lg-3 order-2 order-lg-1">
                        <div class="shop-sidebar-wrap mt-md-28 mt-sm-28">
                            <!-- sidebar categorie start -->
                         
                            <!-- sidebar categorie start -->

                            <!-- manufacturer start -->
                            <div class="sidebar-widget mb-30">
                                <div class="sidebar-title mb-10">
                                    <h3>Manufacturers</h3>
                                </div>
                                <div class="sidebar-widget-body">
                                    <ul>
                                        <li><i class="fa fa-angle-right"></i><a href="#">calvin klein</a><span>(10)</span></li>
                                        <li><i class="fa fa-angle-right"></i><a href="#">diesel</a><span>(12)</span></li>
                                        <li><i class="fa fa-angle-right"></i><a href="#">polo</a><span>(20)</span></li>
                                        <li><i class="fa fa-angle-right"></i><a href="#">Tommy Hilfiger</a><span>(12)</span></li>
                                        <li><i class="fa fa-angle-right"></i><a href="#">Versace</a><span>(16)</span></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- manufacturer end -->

                            <!-- pricing filter start -->
                            <div class="sidebar-widget mb-30">
                                <div class="sidebar-title mb-10">
                                    <h3>Filtrar por Precio</h3>
                                </div>
                                <div class="sidebar-widget-body">
                                    <div class="price-range-wrap">
                                        <div class="range-slider">
                                            <form action="{{route('precio')}}" class="d-flex justify-content-between" method="POST">
                                            @csrf
                                                <input type="number" placeholder="Buscar por Precio" name="precioP"/>
                                                <button id="buscarP" class="filter-btn" type="submit">Filtrar</button>
                                                
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- pricing filter end -->

                            <!-- product size start -->
                            <div class="sidebar-widget mb-30">
                                <div class="sidebar-title mb-10">
                                    <h3>Talla</h3>
                                </div>
                                <div class="sidebar-widget-body">
                                @foreach($tallas as $talla)
                                @if($talla->estado == 1)
                                    <ul>
                                        <li><i class="fa fa-angle-right"></i><a href="{{url('Tallas/'.$talla->id)}}">{{$talla->talla}}</a></li>
                                        
                                    </ul>
                                    @endif
                                    @endforeach
                                </div>
                            </div>

                            <div class="sidebar-widget mb-30">
                                <div class="sidebar-title mb-10">
                                    <h3>Colores</h3>
                                </div>
                                <div class="sidebar-widget-body">
                                @foreach($colores as $color)
                                @if($color->estado == 1)
                                    <ul>
                                        <li><i class="fa fa-angle-right"></i><a href="{{route('colores',$color)}}">{{$color->color}}</a></li>
                                        
                                    </ul>
                                    @endif
                                    @endforeach
                                </div>
                            </div>

                            <!-- product size end -->

                            <!-- product tag start -->
                     
                            <!-- product tag end -->

                            <!-- sidebar banner start -->
                            <div class="sidebar-widget mb-30">
                                <div class="img-container fix img-full">
                                    <a href="#"><img src="assets/img/banner/banner_shop.jpg" alt=""></a>
                                </div>
                            </div>
                            <!-- sidebar banner end -->
                        </div>
                    </div>
                    <!-- sidebar end -->

                    <!-- product main wrap start -->
                    <div class="col-lg-9 order-1 order-lg-2">
                        <div class="shop-banner img-full">
                            <img src="assets/img/banner/banner_static1.jpg" alt="">
                        </div>
                        <!-- product view wrapper area start -->
                        <div class="shop-product-wrapper pt-34">
                            <!-- shop product top wrap start -->
                            <div class="shop-top-bar">
                                <div class="row">
                                    <div class="col-lg-7 col-md-6">
                                        <div class="top-bar-left">
                                            <div class="product-view-mode mr-70 mr-sm-0">
                                                <a class="active" href="#" data-target="grid"><i class="fa fa-th"></i></a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-6">
                                        <div class="top-bar-right">
                                            <div class="product-short">
                                                <p>Ordenar Por : </p>
                                                <select class="nice-select" name="sortby">
                                                    <option value="trending">Relevancia</option>
                                                    <option value="sales">Name (A - Z)</option>
                                                    <option value="sales">Name (Z - A)</option>
                                                    <option value="rating">Price (Low &gt; High)</option>
                                                    <option value="date">Rating (Lowest)</option>
                                                    <option value="price-asc">Model (A - Z)</option>
                                                    <option value="price-asc">Model (Z - A)</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="section-title-2 d-flex justify-content-between mb-28">
                                <h3 style="color:red">PRODUCTOS</h3>
                                <div class="category-append"></div>
                            </div> <!-- section title end -->

                            <!-- shop product top wrap start -->
                            <!-- product item start -->
                            <div class="shop-product-wrap grid row" id="divPadreProductos">
                                @foreach ($productos as $producto)
@foreach ($imagenesA as $p)
  {{$p}}
 @endforeach
                                <div class="col-lg-3 col-md-4 col-sm-6" >
                               
                                    <!-- product single grid item start -->
                                    <div class="product-item fix mb-30">
                                        <div class="product-thumb">
                                        <a href="{{url('/Productos/detalleProducto'.$producto->id)}}"  id="imagenes">
                                    
                                   
                                   
                                    </a>
                                </div>
                                        </div>
                                        <div class="product-content">
                                        <h4><a href="product-details.html">{{$producto->nombre}}</a></h4>
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
                                    <!-- product single grid item end -->
                                    <!-- product single list item start -->
                                   
                                    @endforeach

                            </div>
                            <!-- product item end -->
                        </div>
                        <!-- product view wrapper area end -->

                        <!-- start pagination area -->
                        <div class="paginatoin-area text-center pt-28">
                            <div class="row">
                                <div class="col-12">
                                    <ul class="pagination-box">
                                   
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- end pagination area -->

                    </div>
                    <!-- product main wrap end -->
                </div>
            </div>
        </div>
 @endsection  
