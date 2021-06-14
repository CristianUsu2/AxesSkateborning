<?php

namespace App\Http\Controllers;
use App\Models\Colores;
use App\Models\Categorias;
use App\Models\User;
use App\Models\Tallas;
use App\Models\Productos;
use App\Models\FotoProducto;
use App\Models\ProductosTallas;
use App\Models\Pedidos;
use App\Models\EstadoPedido;
use App\Models\PagoEnLinea;
use App\Models\TipoDePago;
use App\Models\Entrada;
use App\Models\EntradaProducto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use Response;


class ControladorAdmin extends Controller
{
  /*------------Acciones Usuarios ------------------- */
    public function index(){
        return view('Administrador/Index');
    }
    public function usuarios(){
         $users = User::all();
        return view('Administrador/usuarios',compact('users'));

    }

    public function datosA($id){
      $UserA=User::find($id);
       return view('Administrador/editarA')->with('administrador',$UserA);;
     }

    public function perfil(Request $request){
      $usuA=User::find($request->IdUsuario);
      if($usuA !=null){
          try{
            
            $usuA->identificacion=$request->identificacion;
            $usuA->name=$request->nombre;
            $usuA->email=$request->email;
            $usuA->apellido=$request->apellido;
            $usuA->telefono=$request->telefono;
            $usuA->save();
          
            return back()->with("success", "Sus datos han sido modificados correctamente.");


          }catch(Exception $e){
            return back()->with("failed", "Ocurrio un error, no se pudieron modificar sus datos, vuelva a intentarlo.");

          }
      }
    }
    public function estado($Id_Usuarios){
       $UsuB=User::Where("Id_Usuarios","=",$Id_Usuarios)->first();
       try{
      
          if($UsuB->estado==1){
             $UsuB->estado=0;       
          }else{
            $UsuB->estado=1;
          }        
          $UsuB->save();
         
          return back()->with("success", "Cambio de estado éxitoso.");
        }catch(Exception $e){
        
         return response()->json($e.getMessage());
       }
    }

    public function editarUsuario($id){
      $UserB=User::find($id);
      return view('Administrador/Modificar')->with('usuario',$UserB);
    }

    public function ModificarUsuario(Request $request){
      $usuM=User::find($request->IdUsuario);
      if($usuM !=null){
          try{
         
            $usuM->name=$request->NombreN;
            $usuM->email=$request->CorreoN;
            $usuM->Apellido=$request->ApellidoN;
            $usuM->telefono=$request->TelefonoN;
            $usuM->save();
          
            return back()->with("success", "Se han modificado los datos exitosamente.");

          }catch(Exception $e){
           
            return back()->with("failed", "Ocurrio un error, no se han modificado los datos, verifique que si haya realizado modificaciones.");

          }
      }
    } 

    public function crear(Request $request){
      $request->validate([
        'Nombre' => 'required|min:2|max:20',
        'Apellido'=> 'required|min:2|max:20',
        'Correo' => 'required|email|min:4|max:50|',
        'Identificacion' => 'required|min:7|max:12|',
         'Contraseña' => 'required|min:2|max:30',
         'ConfirmarContraseña'=> 'required|min:2|max:30',
         'Telefono' => 'required|min:2|max:11'
     ]);
      try{
      if($request->Contraseña== $request->ConfirmarContraseña){
      
       $registro = new User();
       $registro->name = $request->Nombre;
       $registro->email = $request->Correo;
       $registro->identificacion = $request->Identificacion;
       $incriptado= bcrypt($request->Contraseña);
       $registro->password=$incriptado; 
       $registro->apellido = $request->Apellido;
       $registro->telefono = $request->Telefono;
       $registro->id_rol=1;
       $registro->estado=1;
       $registro->save();
       return back()->with("success", "Se ha registrado el usuario exitosamente.");

      }
      }catch(Exception $e){
        
        return back()->with("failed", "Ocurrio un error, ya existe este usuario o sus datos son similares, por favor ingrese diferentes datos.");
      }
    }

    /*-------------------Acciones categorias ----------------------*/
    public function categorias(){
        $categoria = Categorias::all();
        return view('Administrador/categoria/categorias',compact('categoria'));
    }

    public function Agregar(Request $request){
        $request->validate([
            'Nombre' => 'required|min:2|max:30'
        ]);
        try{
        $categoria = new Categorias();
        $categoria->Nombre_Categoria = $request->Nombre;
        $categoria->save();
        return back()->with("success", "Se ha registrado la categoria exitosamente.");
      }catch(Exception $e){
        return back()->with("failed", "Ocurrio un error, ya existe esta categoria, ingresa una diferente.");

        }
    }

    public function EstadoC($id){
      $busqueda=Categorias::find($id);
      if($busqueda!=null){
      
           if($busqueda->estado == 1){
              $busqueda->estado=0;
           }else{
             $busqueda->estado=1;   
           }
         $busqueda->save();   
         return back()->with("success", "Cambio de estado éxitoso.");
              
     }
  }

    public function editarC($id){
      $categorias=Categorias::find($id);
        return view('Administrador/categoria/editar',compact('categorias'));
    }

    public function ModificarC(Request $request){
      $categoria=Categorias::find($request->id);
      if($categoria !=null){
           $categoria->Nombre_Categoria=$request->Nombre_Categoria;
           $categoria->save();
      }
      return redirect()->action([ControladorAdmin::class,"categorias"]);
    }
    /*---------------Acciones Colores ------------------------------------- */

    public function MostrarColor(){
        $colores=Colores::paginate(5);
      return  view('Administrador/colores/MostrarColor')->with('colores',$colores);
    }
   
    public function EditarColor($id){
       $busqueda=Colores::find($id);
       return view('Administrador/colores/ModificarColor')->with('color',$busqueda);
    }

    public function EstadoColor($id){
        $busqueda=Colores::find($id);
        if($busqueda!=null){
         try{
             if($busqueda->estado == 1){
                $busqueda->estado=0;
             }else{
               $busqueda->estado=1;   
             }
           $busqueda->save();   
           return back()->with("success", "Cambio de estado éxitoso.");
         }catch(Exeption $e){  
            return response()->json($e.getMessage()); 
         }
       }
    }

    public function GuardarColor(Request $request){
      $request->validate([
        'ColorN'=>'required|min:3|max:20|'
      ]);
        try{
        $Ncolor= new Colores();
        $Ncolor->color=$request->ColorN;
        $Ncolor->estado=1;
        $Ncolor->save();
        return back()->with("success", "Se ha registrado el color exitosamente.");
      }catch(Exception $e){
        return back()->with("failed", "Ocurrio un error, ya existe este color, ingrese uno diferente.");

        }
    }


    public function ModificarColor(Request $request){
         $request->validate([
           'color'=>'required/min:3/max:12'
         ]);
         try{
          $busqueda=Colores::find($request->idColor);
          if($busqueda!=null){
            $busqueda->color=$request->colorN;
            $busqueda->save();
            return redirect()->action([ControladorAdmin::class, "MostrarColor"]);
          }
         }catch(Exception $e){
             return response()->$e.getMessage();
         }
    }

    /*-----------------------Acciones tallas------------------- */

    public function MostrarTallas(){
        $registros=Tallas::all();
       return view('Administrador/tallas/MostrarTallas')->with("tallas",$registros);
    }

    public function GuardarTalla(Request $request){
           $request->validate([
            'talla'=>'required'
           ]);
        
          try{
            $talla= new Tallas(); 
            $talla->talla=$request->talla;
            $talla->estado=1;
            $talla->save();
            return back()->with("success", "Su ha agregado la talla correctamente.");
          }catch(Exception $e){
            return back()->with("failed", "Ocurrio un error, esta talla ya existe, ingrese otra talla.");

          } 

    }

    public function EditarTalla(Request $request){
      $request->validate([
       'tallaN'=>'required',
       'idTalla'=>'required'
      ]);
       $Btalla=Tallas::find($request->idTalla);
       if($Btalla!=null){
         try{
         $Btalla->talla=$request->tallaN;
         $Btalla->save();
         return redirect()->action([ControladorAdmin::class,"MostrarTallas"]);
         }catch(Exception $e){
           return response()->json($e.getMessage());
         }
       }
      
    }

    public function ModificarTalla($id){
         $busquedaTalla=Tallas::find($id);
        return view('Administrador/tallas/ModificarTallas')->with('tallaB', $busquedaTalla);
    }

    public function EstadoTalla($id){
      $busquedaT=Tallas::find($id);
      if($busquedaT!=null){
        if($busquedaT->estado==0){
             $busquedaT->estado=1;
        }else{
          $busquedaT->estado=0;
        }
        $busquedaT->save();
      }
      return back()->with("success", "Cambio de estado éxitosamente.");

    }

   /*----------Accciones productos------------ */
public function EditarProductos($id){
  $productoB=Productos::find($id);
  $colores=Colores::all();
  $categorias=Categorias::all();
  $talla=Tallas::all();
   $tallasE=Productos::join('producto_talla',function($join) use ($productoB){
                            $join->on('producto_talla.id_producto','=','productos.id')
                            ->where('producto_talla.id_producto','=',$productoB->id);
                           })
                            ->select("*")
                            ->get();

   $imagenesE=Productos::join('foto_producto',function($join) use ($productoB){
                              $join->on('foto_producto.id_producto','=','productos.id')
                              ->where('foto_producto.id_producto','=',$productoB->id);
                             })
                               ->select("*")
                               ->get();
   return view('Administrador/productos/EditarProducto')
                                                  ->with('tallasE',$tallasE)
                                                  ->with('productoB',$productoB)
                                                  ->with('colores',$colores)
                                                  ->with('categorias',$categorias)
                                                  ->with('tallas',$talla)
                                                  ->with('imagenesE',$imagenesE);
}

public function ModificarTablasIntermedias($idProducto,$request){
  $arrayIdTallaEditar=[];
  $arrayIdImagenesEditar=[];
  $productoTallaE=ProductosTallas::where('id_producto','=',$idProducto)->get();
  $productoImagenE=FotoProducto::where('id_producto','=',$idProducto)->get();
  foreach($productoTallaE as $productoE){
  array_push($arrayIdTallaEditar, $productoE->id);
  }
  foreach($productoImagenE as $productoImagE){
 array_push($arrayIdImagenesEditar,$productoImagE->id);
  }
  foreach($arrayIdTallaEditar as $fila=>$value){
  $buscarDetalleE=ProductosTallas::find($value);
  $buscarDetalleE->id_talla=$request->tallas[$fila];
  $buscarDetalleE->save();
  }
  foreach ($arrayIdImagenesEditar as $key => $value) {
   $buscarImagenProducto=FotoProducto::find($value);
   $buscarImagenProducto->foto=$request->imagenes[$key]->store('uploads','public');
   $buscarImagenProducto->save();  
  }
  return true;
}

public function ModificarProductos(Request $request){
  $productoE=Productos::find($request->idProducto);
  if($productoE !=null){
    try{
    $productoE->nombre=$request->nombre;
    $productoE->precio=$request->precio;
    $productoE->descuento=$request->descuento;
    $productoE->descripcion=$request->descripcion;
    $productoE->id_color=$request->color;
    $productoE->id_categoria=$request->categoria;  
    $productoE->save();
    $res= ControladorAdmin::ModificarTablasIntermedias($productoE->id,$request);
    
    return back()->with("success", "Se han modificado los datos exitosamente.");
  
     }catch(Exception $e){
      return back()->with("failed", "Ocurrio un error, no se pudo modificar el producto, revise todos los campos.");
    }
  }  
  return response()->json($productoTallaE);

}

public function MostrarProductos(){
 $colores=Colores::where("estado","=", "1")->get();
 $categorias=Categorias::where("estado","=","1")->get();
 $tallas=Tallas::where("estado","=","1")->get();
 $producto=Productos::all();
 $imagenes= Productos::select('productos.id','foto_producto.foto')
                      ->join('foto_producto','foto_producto.id_producto','=','productos.id')
                      ->get();
                     
 $tallasP=Productos::join('producto_talla','producto_talla.id_producto','=','productos.id')
                      ->select("*")
                      ->get();
return view('Administrador/productos/MostrarProductos')
                                     ->with('colores',$colores)
                                     ->with('categorias',$categorias)
                                     ->with('tallas',$tallas)
                                     ->with('productos',$producto)
                                     ->with('imagenes',$imagenes)
                                     ->with('tallasP', $tallasP);
}

public function GuardarTablaFotoProducto($imagenes,$producto){
  $res=false;
  try{
  foreach($imagenes as $imagen){
   $fotoProducto=new FotoProducto();
   $fotoProducto->foto=$imagen->store('uploads','public');
   $fotoProducto->id_producto=$producto->id;
   $fotoProducto->save();
  }
  $res=true;
  }catch(Exception $e){
    return "Error Imagenes";
  }
  return $res;
}

public function GuardarTallaIntermedia($tallas,$cantidadesTallas,$producto){
foreach($tallas as $filas =>$talla){
  $producto_talla= new ProductosTallas();
  $producto_talla->cantidad=$cantidadesTallas[$filas];
  $producto_talla->id_talla=$talla;
  $producto_talla->id_producto=$producto->id;
  $producto_talla->save();
}
return true;
}

public function GuardarProductos(Request $request){
  $request->validate([
    'nombre' => 'required|min:2|max:30',
    'stock'=> 'required|min:2|max:20',
    'precio' => 'required|min:4|max:50|',
    'descuento' => 'required|min:0|max:50|',
     'descripcion' => 'required|min:0|max:150',
     'tallas'=> 'required',
     'categoria'=>'required',
     'color' =>'required',
     'imagenes' =>'required'
 ]);

  try{
     $producto= new Productos(); 
     $producto->nombre=$request->nombre;
     $producto->stock=$request->stock;
     $producto->precio=$request->precio;
     $producto->descuento=$request->descuento;
     $producto->estado=1;
     $producto->descripcion = $request->descripcion;
     $producto->id_color=$request->color;
     $producto->id_categoria=$request->categoria;
     $producto->save();
     $tallas=[];
     $cantidadesTallas=[];
     $tallas=$request->tallas;
     $cantidadesTallas=$request->cantidadTalla;
     if($request->hasFile('imagenes')){
       $imagenes=$request->file('imagenes');
        $r=ControladorAdmin::GuardarTablaFotoProducto($imagenes, $producto);
       if($r){
         $res=ControladorAdmin::GuardarTallaIntermedia($tallas,$cantidadesTallas,$producto);
         if($res){
          return back()->with("success", "Producto creado éxitosamente.");

         }
       }
     }
  
  }catch(Exception $e){
  
   return $e->getMessage();
  }
  
 return response()->json($request);
}

public function EstadoProductos($id){
 $busquedaProducto=Productos::find($id);
 try{
   if($busquedaProducto!=null){
     if($busquedaProducto->estado==1){
        $busquedaProducto->estado=0;
      }else{
       $busquedaProducto->estado=1;  
      }
     $busquedaProducto->save();
     return back()->with("success", "Cambio de estado éxitosamente.");
    } 
  }catch(Exception $e){
   return $e.getMensagge();
  }   
}
  
public function VistaDescuentosProductos(){
  $productos=Productos::all();
    return view('Administrador/productos/DescuentosProductos')->with('productos', $productos);
}  
  
public function DescuentosProductos(Request $request){
  $respuesta=-1;
  if($request->id !=null && $request->descuento ==null){
    $producto=Productos::find($request->id);
    if($producto!=null){
     $respuesta=$producto->precio;
    }
  }else if($request->id !=null && $request->descuento !=null && $request->accion==1){
    $producto=Productos::find($request->id);
    if($producto!=null){
      $precioProducto=$producto->precio;
      $valorDescuento=$precioProducto*$request->descuento;
      $precioProductoDescu=$precioProducto-$valorDescuento;
      $respuesta=$precioProductoDescu;
    }
  }else{
    $producto=Productos::find($request->id);
    if($producto!=null){
      try{
      $producto->descuento=$request->descuento;
      $producto->save();
      $respuesta=1;
      }catch(Exception $e){
        $respuesta=-1;
      }
    }
   }

 return Response::json($respuesta);
}


   /*Accciones pedidos */
   public function MostrarPedidos(){
    $productos=Productos::all();
    $pedidosT=Pedidos::all();
    $estadosPedido=EstadoPedido::all();
    $pedidos=Pedidos::join("detalle_pedido_productos", "detalle_pedido_productos.id_pedido", "=", "pedidos.Id_pedido")
                     ->join("pago_en_lineas", "pago_en_lineas.id_pedido","=","pedidos.Id_pedido")
                     ->join("users","users.Id_Usuarios","=","pedidos.id_usuario")
                     ->select("*")
                     ->get();
                    

    return view('Administrador/pedidos/MostrarPedidos')->with('pedidos', $pedidos)
                                   ->with('productos', $productos)
                                   ->with('pedidosT',$pedidosT)
                                   ->with('estadoPedido', $estadosPedido);  
   }

   public function EditarEstadoPedido($id){
     $estadosPedidos=EstadoPedido::all();
    $pedidos=Pedidos::join("detalle_pedido_productos", "detalle_pedido_productos.id_pedido", "=", "pedidos.Id_pedido")
                     ->join("pago_en_lineas", "pago_en_lineas.id_pedido","=","pedidos.Id_pedido")
                     ->join("users","users.Id_Usuarios","=","pedidos.id_usuario")
                     ->where("pedidos.Id_pedido","=",$id)
                     ->select("*")
                     ->get();
                     
      return view('Administrador/pedidos/EditarPedido')->with('pedidos',$pedidos)
                                                       ->with('estadoPedido', $estadosPedidos);               
   }

   public function CambiarEstadoPedido(Request $pedido){
    $pedidoB=Pedidos::find($pedido->idpedido);
    $pedidoB->id_estado=$pedido->estadoPedido;
    $pedidoB->save();
    
    return redirect()->action([ControladorAdmin::class , "MostrarPedidos"]);
   }

   public function MostrarPagosRealizados(){
    $pagos=PagoEnLinea::join("tipo_de_pagos","tipo_de_pagos.Id_Tipo_Pago","=","pago_en_lineas.id_tipo_pago")
                        ->select("*")
                        ->get();
    return view('Administrador/pedidos/MostrarPagosRealizados')->with('pagos',$pagos);
  }

  /*----------------Acciones estado pedidos-------------------- */
  public function MostrarEstadoPedidos(){
    $estadoPedidos=EstadoPedido::all();
    return view('Administrador/estadopedidos/MostrarEstadoPedido')->with('estado',$estadoPedidos);
  }

  public function AgregarEstadoPedido(Request $request ){
   try{
    $EstadoPedido= new EstadoPedido();
    $EstadoPedido->Estado=$request->estado;
    $EstadoPedido->save();
    }catch(Exception $e){
      return $e->getMessage();
    }
    return redirect()->action([ControladorAdmin::class, "MostrarEstadoPedidos"]);

  }
  public function EditarEstadoPedidoBD($id){
    $EstadoModificar=EstadoPedido::find($id);
    return view('Administrador/estadopedidos/EditarEstadoPedido')->with('estadoP', $EstadoModificar);
  }

  public function ModificarEstadoPedidoBD(Request $request){
     $BuscadoEstadoPedido=EstadoPedido::find($request->IdEstadoPedido);
     if($BuscadoEstadoPedido !=null){
       $BuscadoEstadoPedido->Estado=$request->Estado;
       $BuscadoEstadoPedido->save();
     }
    return redirect()->action([ControladorAdmin::class, "MostrarEstadoPedidos"]);
  }

  public function MostrarTiposPago(){
   $tiposPagos=TipoDePago::all();
   return view('Administrador/pedidos/MostrarTipoPago')->with('pago', $tiposPagos);
  }

  /*-------------------------Entrada de productos--------------------------------- */
  public function EntradasProductos(){
    $entradaProductos=EntradaProducto::join("entradas","entrada_productos.Id_entrada","=","entradas.id")
      ->join("productos","productos.id","=","entrada_productos.Id_producto")
      ->select("*")
      ->get();

     return view('Administrador/productos/EntradasProductos')->with("entradaP",$entradaProductos); 
  }

  public function EntradaProducto(){
    $productos=Productos::all();
    return view('Administrador/productos/SumarCantidad')->with('productos', $productos);
  }

  public function VistaRestaProducto(){
    $productos=Productos::all();
    return view('Administrador/productos/RestarCantidad')->with('productos', $productos);
  }

  private function GuardarEntrada($cantidad){
    $respuesta=false;
    try{
      $entrada=new Entrada();
      $entrada->cantidad=$cantidad;
      $entrada->save();
      $respuesta=true;
    }catch(Exception $e){
      $respuesta=$e->getMessage();
    }
      return  $respuesta;
  }

  private function DetalleEntradaProducto($idProducto){
    $respuesta=false;
    $entrada=Entrada::all();
    $entradaUltimo=$entrada->last();
    try{
    $fecha=date("Y-m-d H:i:s");
    $entradaProducto= new EntradaProducto();
    $entradaProducto->Id_entrada=$entradaUltimo->id;
    $entradaProducto->Id_producto=$idProducto;
    $entradaProducto->fecha=$fecha;
    $entradaProducto->save();
    $respuesta=true;
    }catch(Exception $e){
     $respuesta=$e->getMessage();
    }
    return $respuesta;
  }
  

  public function SumarProducto(Request $request){
    $respuesta;
     if($request->id != null && $request->cantidad !=null){
       $EntradaRespuesta=ControladorAdmin::GuardarEntrada($request->cantidad);
       if($EntradaRespuesta == true){
        $EntradaProducto=ControladorAdmin::DetalleEntradaProducto($request->id);
        if($EntradaProducto== true){
          $producto=Productos::find($request->id);
          $cantidadActual=$producto->stock;
          $producto->stock=$cantidadActual+$request->cantidad;
          $producto->save();
          $respuesta=true;
        }    
       }
     }else{
       if($request->id !=null){
         $producto=Productos::find($request->id);
         $producto != null ? $respuesta=$producto->stock :$respuesta=-1;
       }
     }
     return Response::json($respuesta); 
  }

  public function RestarProducto(Request $request){
    $respuesta;
     if($request->id != null && $request->cantidad !=null){      
          $producto=Productos::find($request->id);
          $cantidadActual=$producto->stock;
          $producto->stock=$cantidadActual-$request->cantidad;
          $producto->save();
          $respuesta=true;  
     }else{
       if($request->id !=null){
         $producto=Productos::find($request->id);
         $producto != null ? $respuesta=$producto->stock :$respuesta=-1;
       }
     }
     return Response::json($respuesta); 
  }

   /*---------------Acciones chat----------------- */

   public function Chat(){
     return view('Administrador/chats/ChatAdmin');
   }
   public function DatosUsuarioChat(Request $request){
    $arrayDatosU=[];
    $jsonConvertir=json_encode($request->all());
    $jsonDesconvertir=json_decode($jsonConvertir,true);
    foreach($jsonDesconvertir as $fila){
      $id=$fila['id'];
      $busquedaU=User::where("Id_Usuarios","=",$id)->get();
      array_push($arrayDatosU,$busquedaU);
    }
     return Response::json($arrayDatosU);
   }

}

                    