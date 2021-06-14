@extends('Layout.plantillaU')
@section('paginas')

        <div class="col-lg-9" id="divPadreProductos">
                <!-- featured category area start -->
                <div class="feature-category-area mt-md-70">
                    <div class="section-title mb-30">
                        <div class="title-icon">
                            <i class="fa fa-bookmark"></i>
                        </div>
                        <h3>Productos con Descuento</h3>
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
                                    <span>Promo</span>
                                </div>
                                <div class="product-action-link">
                                    <a href="#" data-toggle="modal" data-target="#quick_view"> <span
                                            data-toggle="tooltip" data-placement="left" title="Agregar Carrito"><i
                                                class="fas fa-shopping-cart"></i></span> </a>
                                    <a href="{{url('/Productos/detalleProducto'.$producto->id)}}" data-toggle="tooltip" data-placement="left" title="Ver Más"><i
                                            class="fas fa-eye"></i></a>
                                    
                                    
                                </div>
                            </div>
                            <div class="product-content">
                                <h4><a href="product-details.html">{{$producto->nombre}}</a></h4>
                                <div class="pricebox">
                                    <div class="price-box">
                                            <div class="regular-price">
                                            {{!$precioProducto=$producto->precio}}
                                            {{!$valorDescuento=$precioProducto*$producto->descuento}}
                                            {{!$precioProductoDescu=$precioProducto-$valorDescuento}}
                                            ${{$precioProductoDescu}}
                                            </div>
                                            <div class="old-price">
                                                <del>${{$producto->precio}}</del>
                                            </div>
                                        </div>
                                    <div class="ratings">
                                        <span class="good"><i class="fa fa-star"></i></span>
                                        <span class="good"><i class="fa fa-star"></i></span>
                                        <span class="good"><i class="fa fa-star"></i></span>
                                        <span class="good"><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <div class="pro-review">
                                            <span>Más visto</span>
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
               
                <!-- category features area end -->
                {{$productos->links()}}
            </div>

@endsection
