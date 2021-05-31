@extends('Layout.plantillaU')
@section('paginas')

<div class="col-lg-9" id="divPadreProductos">
        <div class="feature-category-area mt-md-70">
          <h3>Resultados de la Busqueda</h3> 
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
              
@endsection
