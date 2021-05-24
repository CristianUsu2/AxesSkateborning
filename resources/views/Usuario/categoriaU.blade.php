@extends('Layout.plantillaU')
@section('paginas')

<div class="page-main-wrapper">
            <div class="container">
                        
                <div class="row">
                
                    <div class="col-lg-3 order-2 order-lg-1">
                        <div class="shop-sidebar-wrap mt-md-28 mt-sm-28">
                        <br>
                             <br>
                             <br>
                            <div class="sidebar-widget mb-30">
                                <div class="sidebar-category">
                                    <ul>
                                        <li class="title"><i class="fa fa-bars"></i>Categoria</li>
                                        <li><a href="#">{{$Categorias->Nombre_Categoria}}</a></li>
                                     
                                    </ul>
                                </div>
                            </div>

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

                        

                            <div class="sidebar-widget mb-30">
                                <div class="sidebar-title mb-10">
                                    <h3>Tallas Disponibles</h3>
                                </div>
                                <div class="sidebar-widget-body">
                                    <ul>
                                    @foreach($tallas as $talla)
                                        <li><i class="fa fa-angle-right"></i><a>{{$talla->talla}}</a></li>
                                     @endforeach
                                    </ul>
                                </div>
                            </div>

                            <div class="sidebar-widget mb-30">
                                <div class="sidebar-title mb-10">
                                    <h3>Etiquetas</h3>
                                </div>
                                <div class="sidebar-widget-body">
                                    <div class="product-tag">
                                        <a>Bolsos</a>
                                        <a>Camisas</a>
                                        <a>Zapatos</a>
                                        <a>Gorras</a>                                    
                                        <a>Deporte Skate</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-9 order-1 order-lg-2">
                            
                        <div class="shop-product-wrapper pt-34">
       </div>
       </div>

        
            <div class="col-lg-9" id="divPadreProductos">
        
                <div class="feature-category-area mt-md-70">
                    <div class="section-title mb-30">
                        <div class="title-icon">
                            <i class="fa fa-bookmark"></i>
                        </div>
                        <h3>Categoria: {{$Categorias->Nombre_Categoria}}</h3>
                    </div> 
                    <div class="featured-carousel-active slick-padding slick-arrow-style">
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
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
       
              

                        <div class="paginatoin-area text-center pt-28">
                            <div class="row">
                                <div class="col-12">
                                    <ul class="pagination-box">
                                       {{$productos->links()}}
                                    </ul>
                                </div>
                            </div>
                        </div>
          
    </div>
    </div>
      </div>
@endsection