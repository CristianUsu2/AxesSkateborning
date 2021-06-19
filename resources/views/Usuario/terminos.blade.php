@extends('Layout.plantillaU')
@section('paginas')

<style>
    .titulo{
        width: 100%;
        height: 100%;
        margin-bottom:50px ;
    }
    h2{
        font-family: 'Arial';
        color:#000000;
        text-align: center;
        font-size:45px;
    }
    .parrafo p{
        color:#000000;
        width: 60%;
        height: 100%;
        text-align:justify;
        margin: 5px auto;
        font-family: 'Arial';
        font-size: 15px;
    }
</style>


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

<br><br><br>

<div class="container-fluid mt-3">
    <div class="titulo">
    <h2>TÉRMINOS Y CONDICIONES</h2>
    </div>
    <div class="parrafo">
    <p>Este aplicativo web fue diseñado y creado para la promoción y distribución de productos y servicios
    de <strong>Axes Skateboarding.</strong> Todos nuestros productos cumplen con las normas establecidas por
    las entidades regulares de industria y comercio, garantizando la calidad y legalidad de cada producto.
    </p>
    </div>

</div>

@endsection
