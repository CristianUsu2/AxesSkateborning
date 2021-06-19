<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Colores;
use App\Models\Categorias;
use App\Models\Tallas;
use App\Models\Productos;
use App\Models\FotoProducto;
use App\Models\ProductosTallas;
use App\Models\Pedidos;
use App\Models\DetallePedidoProducto;
use App\Models\PagoEnLinea;
use App\Models\ComprobanteDeVenta;
use App\Models\EstadoPedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use UxWeb\SweetAlert\SweetAlert;
use Illuminate\Support\Str;

use Response;

use Exception;

class ControladorUsuario extends Controller
{


  public function index()
  {
    $colores = Colores::where("estado", "=", "1")->get();
    $categorias = Categorias::where("estado", "=", "1")->get();
    $tallas = Tallas::where("estado", "=", "1")->get();
    $producto = Productos::where("estado", "=", "1")
      ->paginate(16);
    $imagenes = Productos::select('productos.id', 'foto_producto.foto')
      ->join('foto_producto', 'foto_producto.id_producto', '=', 'productos.id')
      ->get();

    $tallasP = Productos::join('producto_talla', 'producto_talla.id_producto', '=', 'productos.id')
      ->select("*")
      ->get();
    return view('Usuario/index')->with('colores', $colores)
      ->with('categorias', $categorias)
      ->with('tallas', $tallas)
      ->with('productos', $producto)
      ->with('imagenes', $imagenes)
      ->with('tallasP', $tallasP);
  }

  /*public function productosNuevos(){
    $colores=Colores::where("estado","=", "1")->get();
    $categorias=Categorias::where("estado","=","1")->get();
    $tallas=Tallas::where("estado","=","1")->get();
    $producto=Productos::where("estado","=","1")
                                                ->paginate(6);
    $imagenes= Productos::select('productos.id','foto_producto.foto')
                         ->join('foto_producto','foto_producto.id_producto','=','productos.id')
                         ->get();
                        
    $tallasP=Productos::join('producto_talla','producto_talla.id_producto','=','productos.id')
                         ->select("*")
                         ->get();                       
     return view('Usuario/nuevos')->with('colores',$colores)
     ->with('categorias',$categorias)
     ->with('tallas',$tallas)
     ->with('productos',$producto)
     ->with('imagenes',$imagenes)
     ->with('tallasP', $tallasP);
   }*/

  public function listarTallas()
  {
    /*$envioImagenesIds=[]; 
    $colores=Colores::where("estado","=", "1")->get();
    $categorias=Categorias::where("estado","=","1")->get();
    $tallas=Tallas::where("estado","=","1")->get();
    $imagenes= Productos::select('productos.id','foto_producto.foto')
                           ->join('foto_producto','foto_producto.id_producto','=','productos.id')
                           ->get();
    $tallasP=Productos::join('producto_talla','producto_talla.id_producto','=','productos.id')
                           ->select("*")
                           ->get();       
    $producto=Productos::join("foto_producto","foto_producto.id_producto","=","productos.id")
                         ->join("producto_talla","producto_talla.id_producto","=","productos.id")
                         ->join("colores","colores.id","=","productos.id_color")
                         ->join("categorias","categorias.id","=", "productos.id_categoria")
                         ->where("colores.estado","=","1")
                         ->where("categorias.estado","=","1")
                         ->where("producto_talla.id_talla","=", $p)
                         ->select("productos.id")
                         ->distinct("productos.id")
                         ->get();
     $idsP=$producto->toArray();
     foreach($idsP as $p){
      $imagenesB= Productos::join('foto_producto','foto_producto.id_producto','=','productos.id')
                           ->where("productos.id","=",$p["id"])
                           ->select('foto_producto.foto')
                        ->get();      
      foreach($imagenesB as $f){
        $obj=[
          "idProducto"=>$p["id"],
          "imagenes"=>$f->foto
        ];     
        array_push($envioImagenesIds, $obj); 
      }                              
    
                  
     }
     

     return  view('Usuario/listarTalla')
     ->with('colores',$colores)
                                    ->with('categorias',$categorias)
                                    ->with('tallas',$tallas)
                                    ->with('productos',$producto)
                                    ->with('imagenesA',$envioImagenesIds)
                                    ->with('tallasP', $tallasP);
                                    */
  }

  public function listarColor(Colores $color)
  {
    $categorias = Categorias::where("estado", "=", "1")->get();
    $tallas = Tallas::where("estado", "=", "1")->get();
    $producto = Productos::where("id_color", "=", $color->id)
      ->paginate(6);
    if ($producto == null) {
      $producto = 0;
    }
    $imagenes = Productos::select('productos.id', 'foto_producto.foto')
      ->join('foto_producto', 'foto_producto.id_producto', '=', 'productos.id')
      ->get();

    $tallasP = Productos::join('producto_talla', 'producto_talla.id_producto', '=', 'productos.id')
      ->select("*")
      ->get();
    return view('Usuario/listarColor')->with('colores', $color)
      ->with('categorias', $categorias)
      ->with('tallas', $tallas)
      ->with('productos', $producto)
      ->with('imagenes', $imagenes)
      ->with('tallasP', $tallasP);
  }

  /*VISTAAAAAAA*/
  public function listarP()
  {
    $colores = Colores::where("estado", "=", "1")->get();
    $categorias = Categorias::where("estado", "=", "1")->get();
    $tallas = Tallas::where("estado", "=", "1")->get();
    $producto = Productos::where("estado", "=", "1")
      ->paginate(13);
    $imagenes = Productos::select('productos.id', 'foto_producto.foto')
      ->join('foto_producto', 'foto_producto.id_producto', '=', 'productos.id')
      ->get();

    $tallasP = Productos::join('producto_talla', 'producto_talla.id_producto', '=', 'productos.id')
      ->select("*")
      ->get();
    return view('Usuario/listarP')->with('colores', $colores)
      ->with('categorias', $categorias)
      ->with('tallas', $tallas)
      ->with('productos', $producto)
      ->with('imagenes', $imagenes)
      ->with('tallasP', $tallasP);
  }
  /*logica*/

  public function listarPrecio(Request $request)
  {
    $precio = $request->precioP;
    $colores = Colores::where("estado", "=", "1")->get();
    $categorias = Categorias::where("estado", "=", "1")->get();
    $tallas = Tallas::where("estado", "=", "1")->get();
    $producto = Productos::where("precio", "=", $precio)->paginate(13);
    if ($producto == null) {
      $producto = 0;
    }
    $imagenes = Productos::select('productos.id', 'foto_producto.foto')
      ->join('foto_producto', 'foto_producto.id_producto', '=', 'productos.id')
      ->get();

    $tallasP = Productos::join('producto_talla', 'producto_talla.id_producto', '=', 'productos.id')
      ->select("*")
      ->get();
    return view('Usuario/listarP')->with('colores', $colores)
      ->with('precio', $precio)
      ->with('categorias', $categorias)
      ->with('tallas', $tallas)
      ->with('productos', $producto)
      ->with('imagenes', $imagenes)
      ->with('tallasP', $tallasP);
  }


  public function promociones()
  {

    $colores = Colores::where("estado", "=", "1")->get();
    $categorias = Categorias::where("estado", "=", "1")->get();
    $tallas = Tallas::where("estado", "=", "1")->get();
    $producto = Productos::where("estado", "=", "1")
      ->where("descuento", ">", "0.1")
      ->paginate(6);
    $imagenes = Productos::select('productos.id', 'foto_producto.foto')
      ->join('foto_producto', 'foto_producto.id_producto', '=', 'productos.id')
      ->get();

    $tallasP = Productos::join('producto_talla', 'producto_talla.id_producto', '=', 'productos.id')
      ->select("*")
      ->get();

    return view("Usuario/promociones")
      ->with('colores', $colores)
      ->with('categorias', $categorias)
      ->with('tallas', $tallas)
      ->with('productos', $producto)
      ->with('imagenes', $imagenes)
      ->with('tallasP', $tallasP);
  }



  public function categoriaU(Categorias $categoria)
  {
    $colores = Colores::where("estado", "=", "1")->get();
    $producto = Productos::where('id_categoria', $categoria->id)
      ->where("estado", "=", "1")
      ->select("*")
      ->paginate(6);

    $tallas = Tallas::where("estado", "=", "1")->get();
    $imagenes = Productos::select('productos.id', 'foto_producto.foto')
      ->join('foto_producto', 'foto_producto.id_producto', '=', 'productos.id')
      ->get();

    return view('Usuario/categoriaU')
      ->with('colores', $colores)
      ->with('Categorias', $categoria)
      ->with('productos', $producto)
      ->with('imagenes', $imagenes)
      ->with('tallas', $tallas);
  }

  public function terminos()
  {
    $categorias = Categorias::where("estado", "=", "1")->get();
    return view('Usuario/terminos')->with('categorias', $categorias);
  }
  public function privacidad()
  {
    $categorias = Categorias::where("estado", "=", "1")->get();

    return view('Usuario/privacidad')->with('categorias', $categorias);
  }

  public function datosU($id)
  {
    $UserB = User::find($id);
    return view('Usuario/informacion')->with('usuario', $UserB);;
  }

  public function buscarD()
  {
    $productos = Productos::where("estado", "=", "1")
      ->select("*")
      ->paginate(5);

    $colores = Colores::where("estado", "=", "1")->get();
    $categorias = Categorias::where("estado", "=", "1")->get();

    $imagenes = Productos::select('productos.id', 'foto_producto.foto')
      ->join('foto_producto', 'foto_producto.id_producto', '=', 'productos.id')
      ->get();

    return view('Usuario/buscarD')
      ->with('imagenes', $imagenes)
      ->with('productos', $productos)
      ->with('colores', $colores)
      ->with('Categorias', $categoria);
  }
  public function buscar(Request $request)
  {

    if (trim($request->productoB) == null) {
      return back()->with("failed", "Este campo es obligatorio.");
    }

    if ($request) {
      $consulta = trim($request->get('productoB'));
      $productos = Productos::where('nombre', 'like', '%' . $consulta . '%')
        ->orderBy('id', 'asc')
        ->get();
      if ($productos . Str::length(1)) {
        $productos = Productos::where("estado", "=", "1")
          ->select("*")
          ->where('nombre', 'like', '%' . $consulta . '%')
          ->paginate(5);
        $colores = Colores::where("estado", "=", "1")->get();
        $categorias = Categorias::where("estado", "=", "1")->get();
        $tallas = Tallas::where("estado", "=", "1")->get();
        $imagenes = Productos::select('productos.id', 'foto_producto.foto')
          ->join('foto_producto', 'foto_producto.id_producto', '=', 'productos.id')
          ->get();
        if ($productos->isEmpty()) {
          return back()->with("failed4", "No se encontraron resultados para la busqueda");
        }
        return view('Usuario/buscarD')
          ->with('productos', $productos)
          ->with('imagenes', $imagenes)
          ->with('tallas', $tallas)
          ->with('colores', $colores)
          ->with('Categorias', $categorias);
      }
    }
  }


  public function update(Request $request)
  {
    $request->validate([
      'correo' => 'required|email|min:4|max:50|',
      'contraseña' => 'required|min:2|max:30',
      'confirmarContraseña' => 'required|min:2|max:30'
    ]);

    $correoC = User::where('email', '=', $request->correo)->first();

    if ($correoC && $request->contraseña == $request->confirmarContraseña) {
      $password = bcrypt($request->contraseña);
      $correoC->password = $password;
      $correoC->save();
    }

    if (!$correoC) {
      return back()->with("failed", "Ocurrio un error, no pudimos cambiar su contraseña, por favor verifique sus datos y vuelva a intentarlo.");
    } else {
      return back()->with("success", "Su contraseña fue cambiada exitosamente.");
    }


    return back()->with('error', 'No se pudo modificar la contraseña.');
  }

  public function informacionU(Request $request)
  {
    $usuM = User::find($request->IdUsuario);
    if ($usuM != null) {
      $usuM->identificacion = $request->identificacion;
      $usuM->name = $request->nombre;
      $usuM->email = $request->email;
      $usuM->apellido = $request->apellido;
      $usuM->telefono = $request->telefono;
      $usuM->save();
      return back()->with("success", "Su datos fueron cambiados exitosamente.");
    }
    if ($usuM->telefono == 222222) {
      return back()->with("failed", "Ocurrio un error, no pudimos modificar sus datos, por favor vuelva a intentarlo.");
    }
  }

  public function detalleCompra()
  {
    $categoria = Categorias::all();
    return view('Usuario/detalleCompra')->with("categorias", $categoria);
  }
  public function cambioC()
  {
    return view('Usuario/reseteo');
  }

  public function detalleProd($idProducto)
  {
    $producto = Productos::find($idProducto);
    $imagenes = Productos::join('foto_producto', function ($join) use ($producto) {
      $join->on('foto_producto.id_producto', '=', 'productos.id')
        ->where('foto_producto.id_producto', '=', $producto->id);
    })
      ->select("foto")
      ->get();
    $tallas = Productos::join('producto_talla', function ($join) use ($producto) {
      $join->on('producto_talla.id_producto', '=', 'productos.id')
        ->where('producto_talla.id_producto', '=', $producto->id);
    })
      ->select("*")
      ->get();
    $tallaP = Tallas::all();
    $colores = Colores::all();
    $categorias = Categorias::all();
    return view('Usuario/detalleProd')
      ->with('ProductoSelecc', $producto)
      ->with('ImagenesProducto', $imagenes)
      ->with('tallasProducto', $tallas)
      ->with('tallas', $tallaP)
      ->with('categoria', $categorias)
      ->with('colores', $colores);
  }

  public function inicio()
  {
    return view('Usuario/inicio');
  }

  public function FinalizarCompra()
  {
    /*$request->validate([
      'documento' => 'required|min:4|max:50|',
     'nombre' => 'required|min:2|max:30',
     'apellido' => 'required|min:2|max:30',
     'correo' => 'required|email|min:2|max:30',
     'telefono' => 'required|min:7|max:12',
     'direccion' => 'required|email|min:6|max:50|'
     ]);*/
    $categoria = Categorias::all();
    $sesion = session('datosU');
    $pedidos = Pedidos::all();
    $ultimoPedido = $pedidos->last();
    if ($ultimoPedido == null) {
      $pedido = new Pedidos();
      $pedido->Id_Pedido = 1;
      return view('Usuario/finalizarCompra')->with('usuario', $sesion)
        ->with('pedido', $pedido)
        ->with('categorias', $categoria);
    }

    if ($sesion == null) {
      return back()->with("failed3", "Debes iniciar sesión para finalizar la compra.");
    }

    foreach ($sesion as $u) {
      $id = $u->Id_Usuarios;
    }

    return view('Usuario/finalizarCompra')->with('usuario', $sesion)
      ->with('pedido', $ultimoPedido)
      ->with('categorias', $categoria);
  }
  public function ValidacionUsuario(Request $request)
  {
    $res = -1;
    if ($request->email != null) {
      $user = User::where("email", "=", $request->email)->get();
      if (!$user->isEmpty()) {
        $res = $user;
      }
    } else if ($request->id != null) {
      $user = User::find($request->id);
      if ($user != null) {
        $res = $user;
      }
    }
    return Response::json($res);
  }

  public function FinalizarCompraGoogle(Request $request)
  {
    $res = -1;
    if ($request->name != null && $request->email != null && $request->identificacion != null && $request->apellido != null && $request->telefono != null) {
      try {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->identificacion = $request->identificacion;
        $user->estado = 1;
        $user->id_rol = 1;
        $user->apellido = $request->apellido;
        $user->telefono = $request->telefono;
        $user->save();
      } catch (Exception $e) {
        return Response::json($e->getMessage());
      }
      $usuario = User::where("email", "=", $user->email)->get();
      session(['datosU' => $usuario]);
      $res =1;
    } else {
      $user = User::where("email", "=", $request->email)->get();
      if (!$user->isEmpty()) {
        session(['datosU' => $user]);
        $res = 2;
      }
    }
    return Response::json($res);
  }

  public function login()
  {

    return view('Usuario/login');
  }

  public function register(Request $request)
  {
    $res = null;
    $request->validate([
      'nombre' => 'required|min:2|max:20',
      'apellido' => 'required|min:2|max:20',
      'correo' => 'required|email|min:4|max:50|',
      'identificacion' => 'required|min:7|max:12|',
      'contraseña' => 'required|min:2|max:30',
      'ConfirmarContraseña' => 'required|min:2|max:30',
      'telefono' => 'required|min:2|max:11'
    ]);
    if ($request->contraseña == $request->ConfirmarContraseña) {
      try {
        $registro = new User();
        $registro->name = $request->nombre;
        $registro->email = $request->correo;
        $registro->identificacion = $request->identificacion;
        $incriptado = Hash::make($request->contraseña);
        $registro->password = $incriptado;
        $registro->apellido = $request->apellido;
        $registro->telefono = $request->telefono;
        $registro->id_rol = 1;
        $registro->estado = 1;
        $registro->save();
      
      } catch (Exception $e) {
        return Response::json($e->getMessage());
      }
      $res = 1;
    }
    return Response::json($res);
  }

  public function loginV(Request $request)
  {
    $res = null;
    $request->validate([
      'Correo' => 'required|email|min:4|max:50|',
      'Contraseña' => 'required|min:2|max:30'

    ]);
    $busquedaEmail = User::where('email', '=', $request->Correo)->value('email');
    $busquedaEncrip = User::where('email', '=', $request->Correo)->value('password');
    $busquedaRol = User::where('email', '=', $request->Correo)->value('id_rol');
    $busquedaId = User::where('email', '=', $request->Correo)->value('Id_Usuarios');
    $DatosUsuario = [];

    if ($busquedaEmail != null && $busquedaEncrip != null && $busquedaRol != null && $busquedaId != null) {
      array_push($DatosUsuario, $busquedaEmail, $busquedaEncrip, $busquedaRol, $busquedaId);
      if ($DatosUsuario[0] == $request->Correo) {
        if (password_verify($request->Contraseña, $DatosUsuario[1])) {

          if ($DatosUsuario[2] == 2) {
            $usuario = User::where('Id_Usuarios', '=', $DatosUsuario[3])->get();
            session(['datosU' => $usuario]);
            $res = 2;
          } else  if ($DatosUsuario[2] == 1) {
            $usuario = User::where('Id_Usuarios', '=', $DatosUsuario[3])->get();
            session(['datosU' => $usuario]);

            $res = 1;
          }
        }
      }
    }
    // return back()->with("login","Ocurrió un error, los datos no coinciden.");
    return Response::json($res);
  }

  public function loginC()
  {
    session()->forget('datosU');
    return redirect()->action([ControladorUsuario::class, "index"]);
  }



  public function GuardarCompra(Request $request)
  {
    $fecha = date("Y-m-d H:i:s");
    $pedido = new Pedidos();
    $pedido->direccion = $request->direccion;
    $pedido->fecha = $fecha;
    $pedido->id_estado = 1;
    $pedido->id_usuario = $request->idUsuario;
    $pedido->save();

    foreach ($request->talla as $fila => $value) {
      $detallePedido = new DetallePedidoProducto();
      $detallePedido->cantidad = $request->cantidad[$fila];
      $detallePedido->Total = $request->total;
      $detallePedido->Sub_Total = $request->subtotal;
      $detallePedido->EstadoD = "Generado";
      $detallePedido->id_pedido = $pedido->Id_Pedido;
      $detallePedido->id_producto = $request->idProducto[$fila];
      $detallePedido->talla = $value;
      $detallePedido->save();
      ControladorUsuario::ActualizarStock($request->idProducto[$fila], $request->cantidad[$fila], $value);
    }
    try {
      $comprobante = new ComprobanteDeVenta();
      $comprobante->Fecha = $fecha;
      $comprobante->id_pedido = $pedido->Id_Pedido;
      $comprobante->save();
    } catch (Exception $e) {
      return response()->json($e->getMessage());
      return "error comprobante";
    }
    try {
      $pagoEnLinea = new PagoEnLinea();
      $pagoEnLinea->Tipo_Pago = "ContraEntrega Domicilio";
      $pagoEnLinea->Valor_Pago = $request->total;
      $pagoEnLinea->Fecha = $fecha;
      $pagoEnLinea->id_tipo_pago = 1;
      $pagoEnLinea->id_pedido = $pedido->Id_Pedido;
      $pagoEnLinea->save();
    } catch (Exception $e) {
      return response()->json($e->getMessage());
      return "Erro en pago en linea";
    }

    return redirect()->action([ControladorUsuario::class, "PedidosUsuario"]);
  }



  public function ActualizarStock($id, $cantidad, $talla): void
  {
    $producto = Productos::find($id);
    $tallaS = Tallas::where("talla", "=", $talla)->get();
    $tallaid = 0;
    foreach ($tallaS as $ta) {
      $tallaid = $ta->id;
    }
    $stockAnterior = $producto->stock;
    $stockActual = $stockAnterior - $cantidad;
    $producto->stock = $stockActual;
    $producto->save();
    $tallasProducto = ProductosTallas::where('id_producto', '=', $id)
      ->where('id_talla', '=', $tallaid)
      ->get();

    $idProductoTalla = 0;
    foreach ($tallasProducto as $tP) {
      $idProductoTalla = $tP->id;
    }
    $buscarRegistroTallaProducto = ProductosTallas::find($idProductoTalla);
    $buscarRegistroTallaProducto->cantidad = $buscarRegistroTallaProducto->cantidad - $cantidad;
    $buscarRegistroTallaProducto->save();
  }


  public function PedidosUsuario()
  {
    $sesion = session('datosU');
    $idUsuario;
    foreach ($sesion as $usua) {
      $idUsuario = $usua->Id_Usuarios;
    }
    $usuario = User::find($idUsuario);
    $productos = Productos::all();
    $pedidosT = Pedidos::all();
    $estadosPedido = EstadoPedido::all();
    $pedidos = Pedidos::join("detalle_pedido_productos", "detalle_pedido_productos.id_pedido", "=", "pedidos.Id_pedido")
      ->join("pago_en_lineas", "pago_en_lineas.id_pedido", "=", "pedidos.Id_pedido")
      ->where('id_usuario', '=', $usuario->Id_Usuarios)
      ->select("*")
      ->paginate(10);

    return view('Usuario/PedidosU')->with('pedidos', $pedidos)
      ->with('productos', $productos)
      ->with('pedidosT', $pedidosT)
      ->with('estadoPedido', $estadosPedido)
      ->with('usuario', $sesion);
  }
}
