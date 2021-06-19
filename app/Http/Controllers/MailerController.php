<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ControladorUsuario;
use App\Models\User;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use App\Models\Colores;
use App\Models\Categorias;
use App\Models\Tallas;
use App\Models\Productos;
use Response;
use DB;
use Illuminate\Support\Str;

class MailerController extends Controller
{

    // =============== [ Email ] ===================
    public function email()
    {
        return view("Usuario/recuperar");
    }


    // ========== [ Compose Email ] ================
    public function composeEmail(Request $request)
    {
        $request->validate([
            'emailBcc' => 'required|email|min:4|max:50|'
        ]);
        $respuesta = [];
        $dt = "";
        $email = $request->emailBcc;
        $busquedaEmail = User::where('email', '=', $request->emailBcc)->value('email');
        $contra = User::where('password', '=', $busquedaEmail)->value('password');
        require base_path("vendor/autoload.php");
        $mail = new PHPMailer(true);     // Passing `true` enables exceptions
        // Email server settings
        if ($email == $busquedaEmail) {
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';            //  smtp host
            $mail->SMTPAuth = true;
            $mail->Username = 'axesskateboarding@gmail.com';   //  sender username
            $mail->Password = 'johanayjorge';   // sender password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;                          // port - 587/465
            $mail->setFrom($email, 'Tienda Axes');
            $mail->addAddress($email);
            $mail->isHTML(true);                // Set email content format to HTML

            $mail->Subject = 'Recuperar Clave';
            $mail->Body    = '<center style="min-width:580px;width:100%">
            <table style="Margin:0 auto;border-collapse:collapse;border-spacing:0;float:none;margin:0 auto;padding:0;text-align:center;vertical-align:top;width:100%">
                <tbody>
                    <tr style="padding:0;text-align:left;vertical-align:top">
                        <td height="15px" style="Margin:0;border-collapse:collapse!important;color:#322f37;font-family:Helvetica,Arial,sans-serif;font-size:10px;font-weight:400;line-height:10px;margin:0;padding:0;text-align:left;vertical-align:top;word-wrap:break-word">&nbsp;</td>
                    </tr>
                </tbody>
            </table>
        
                <table align="center" class="m_-3617184912195535673container" style="Margin:0 auto;background:#fff;border-collapse:collapse;border-spacing:0;float:none;margin:0 auto;padding:10px;text-align:center;vertical-align:top;width:580px;margin-left:10px!important;margin-right:10px!important">
                <tbody>
                    <tr style="padding:0;text-align:left;vertical-align:top">
                        <td style="Margin:0;border-collapse:collapse!important;color:#322f37;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:left;vertical-align:top;word-wrap:break-word">
                            <table class="m_-3617184912195535673row m_-3617184912195535673header-v2" style="background-color:#fff;background-image:none;background-position:top left;background-repeat:repeat;border-bottom:1px solid #efeef1;border-collapse:collapse;border-spacing:0;display:table;margin:10px 0 15px 0;padding:0;text-align:left;vertical-align:top;width:100%"> 
                                <tbody>
                                    <tr style="padding:0;text-align:left;vertical-align:top">
                                        <th class="m_-3617184912195535673small-12 m_-3617184912195535673columns" style="Margin:0 auto;color:#322f37;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0 auto;padding:0;padding-bottom:0!important;padding-left:20px;padding-right:20px;padding-top:0!important;text-align:left;width:560px">
                                            <table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                                                <tbody>
                                                    <tr style="padding:0;text-align:left;vertical-align:top">
                                                        <th style="Margin:0;color:#322f37;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:left">
                                                            <h1 style="text-align: center; ">AXES SKATEBOARDING</h1>
                                                            <hr style="height:3px;border:none;background:linear-gradient(274deg, #46c9d0d8, #6262e2d2 44%, #c862f7d8)">
                                                        </th>
                                                    </tbody>
                                                </table>
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
        
                                <table class="m_-3617184912195535673row" style="border-collapse:collapse;border-spacing:0;display:table;padding:0;text-align:left;vertical-align:top;width:100%">
                                    <tbody>
                                        <tr style="padding:0;text-align:left;vertical-align:top">
                                            <th class="m_-3617184912195535673small-12 m_-3617184912195535673columns" style="Margin:0 auto;color:#322f37;font-family:Helvetica,Arial,sans-serif;font-size:18px;font-weight:500;line-height:1.3;margin:0 auto;padding:0;padding-bottom:0!important;padding-left:20px;padding-right:20px;padding-top:0!important;text-align:left;width:560px">
                                                <table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                                                    <tbody>
                                                        <tr style="padding:0;text-align:left;vertical-align:top">
                                                            <th style="Margin:0;color:#322f37;font-family:Helvetica,Arial,sans-serif;font-size:18px;font-weight:500;line-height:1.3;margin:0;padding:0;text-align:left">
                                                                <h6 style="Margin:0;Margin-bottom:10px;color:inherit;font-family:Helvetica,Arial,sans-serif;font-size:18px;font-weight:500;line-height:1.3;margin:0;margin-bottom:0;padding:0;padding-bottom:0;text-align:center;word-wrap:normal;color:#9147ff">Gracias por comunicarte con Tienda Axes.' . '</h6>
                                                            </th>
                                                            <th style="Margin:0;color:#322f37;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0!important;text-align:left;width:0">
                                                            </th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
        
        
        
                                <table class="m_-3617184912195535673row" style="border-collapse:collapse;border-spacing:0;display:table;padding:0;text-align:left;vertical-align:top;width:100%">
                                    <tbody>
                                        <tr style="padding:0;text-align:left;vertical-align:top">
                                            <th class="m_-3617184912195535673small-12 m_-3617184912195535673columns" style="Margin:0 auto;color:#322f37;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:300;line-height:1.3;margin:0 auto;padding:0;padding-bottom:16px;padding-left:20px;padding-right:20px;padding-top:10px;text-align:left;width:560px">
                                                <table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                                                    <tbody>
                                                        <tr style="padding:0;text-align:left;vertical-align:top">
                                                            <th style="Margin:0;color:#322f37;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:left">
                                                                <p style="Margin:0;Margin-bottom:10px;font-family:Helvetica,Arial,Verdana,font-size:16px;font-weight:300;line-height:24px;margin:0;margin-bottom:0;padding:0;padding-bottom:0;text-align:justify">Este es un correo generado automáticamente. Si desea más información
                                                                conteste a esta dirección de correo. O si desea información
                                                                sobre nuestros productos se puede comunicar
                                                                con nosotros mediante el chat de la Aplicación o a nuestro WhatsApp. ¡Siempre a la orden, Tienda Axes!
                                                                <br><br>
                                                                 </p>
                                                                 <p style="Margin:0;Margin-bottom:10px;font-family:Helvetica,Arial,Verdana,font-size:16px;font-weight:300;line-height:24px;margin:0;margin-bottom:0;padding:0;padding-bottom:0;text-align:justify">
                                                                 Usted solicitó recuperar su contraseña, por favor, haga click en el botón para recuperar su contraseña   
                                                                 <br><br><br><br>
                                                                     <a style="text-decoration:none;
                                                                     font-weight:600;
                                                                     font-size:20px;
                                                                     color:#000000;
                                                                     padding-top:15px;
                                                                     padding-bottom:15px;
                                                                     padding-left:150px;
                                                                     padding-right:150px;
                                                                     background-color:#F69DA1;" href="http://127.0.0.1:8000/CambiarContrase%C3%B1a">Recuperar Contraseña</a>
                                                                 </p>
                                                                 <br><br>
                                                                <hr style="height:3px;border:none;background:linear-gradient(274deg, #46c9d0d8, #6262e2d2 44%, #c862f7d8)">
        
                                                            </th>
                                                            <th style="Margin:0;color:#322f37;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0;padding:0!important;text-align:left;width:0">
                                                            </th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
                                
        
        
                            </td>
                        </tr>
                    </tbody>
                </table>
                
                <table align="center" class="m_-3617184912195535673container" style="Margin:0 auto;background:0 0!important;border-collapse:collapse;border-spacing:0;float:none;margin:0 auto;padding:0;text-align:center;vertical-align:top;width:580px">
                        
                    <table align="center" style="background:0 0!important;border-collapse:collapse;border-spacing:0;margin:20px auto 0 auto;padding:0;text-align:inherit;vertical-align:top;width:580px">
                        <tbody>
                            <tr>
                                <th>
                                    <table style="border-collapse:collapse;border-spacing:0;display:table;padding:0;text-align:left;vertical-align:top;width:100%">
                                        <tbody>
                                            <tr style="padding:0;text-align:left;vertical-align:top">
                                                <th style="Margin:0 auto;color:#322f37;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0 auto;padding:0;padding-bottom:0!important;padding-left:20px;padding-right:10px;padding-top:0!important;text-align:left;width:270px">
                                                    <a href="https://twitter.com/twitch/" style="Margin:0;color:#9147ff;font-family:Helvetica,Arial,sans-serif;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:left;text-decoration:none" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://twitter.com/twitch/&amp;source=gmail&amp;ust=1619220556159000&amp;usg=AFQjCNEug20xhrAM9lzwNhIQFUKt-Iuyyw">
                                                        <img src="https://ci5.googleusercontent.com/proxy/NjrXjBJfWd_KVMGC2RlzLVYSFdY3i6I4jo6h9CG3zyai6S3SMsqcK-Ufc_rmmpLKtvpfpaRsWgDHJkCrfBUEW5JH_9uJelJhBdIka6mmYQM-bLJT95fgwlxWuqjvgUt_bWmNUq1B=s0-d-e1-ft#https://s.jtvnw.net/jtv_user_pictures/hosted_images/email-twitter-logo-20171115.png" width="20" height="20" alt="twitch-twitter" style="border:none;clear:both;display:block;float:right;max-width:100%;outline:0;text-align:right;text-decoration:none;width:auto" class="CToWUd"></a>
                                                    </th>
                                                    <th style="Margin:0 auto;color:#322f37;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0 auto;padding:0;padding-bottom:0!important;padding-left:10px;padding-right:20px;padding-top:0!important;text-align:left;width:270px"><a href="https://www.facebook.com/AXES-Skateboarding-100422468179966" style="Margin:0;color:#9147ff;font-family:Helvetica,Arial,sans-serif;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:left;text-decoration:none" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.facebook.com/twitch/&amp;source=gmail&amp;ust=1619220556159000&amp;usg=AFQjCNG3o1VhrjDfvgSdkK5emCCumBWZEw">
                                                        <img src="https://ci4.googleusercontent.com/proxy/XHffVu34DLJFd5BgnT-FmR1sO6U8aNYtqIngRIAczxlyKN1dB0Fe-00F3bXbo3fVQ4PlEIpJVQrCAsfuBto15Y4neEJHUxd2v0z7gy41unT3YDbJg6bTUgmWOcju7HCKeL18r1pH8A=s0-d-e1-ft#https://s.jtvnw.net/jtv_user_pictures/hosted_images/email-facebook-logo-20171115.png" width="20" height="20" alt="twitch-facebook" style="border:none;clear:both;display:block;float:left;max-width:100%;outline:0;text-align:left;text-decoration:none;width:auto" class="CToWUd"></a>
                                                    </th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </th>
                                </tr>
                                <tr style="padding:0;vertical-align:top">
                                    <th style="color:#322f37;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0">
                                        <p style="color:#322f37;font-family:Helvetica,Arial,Verdana,font-size:16px;font-weight:400;line-height:24px;margin:0;margin-top:5px;margin-bottom:10px;padding:0;padding-bottom:10px;text-align:center">
                                            <small style="color:#706a7c;font-size:14px">© 2021 AXES SKATEBOARDING, todos los derechos reservados</small>
                                        </p>
                                    </th>
                                    <th style="color:#322f37;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0!important;text-align:left;width:0"></th>
                                </tr>
                            </tbody>
                        </table>
                </table>
        </center>';


            $dt = $mail->send();
        }

        // $mail->AltBody = plain text version of email body;

        if (!$dt) {
            $objR = (object)[
                "estado" => 0,
                "email" => $email
            ];
            array_push($respuesta, $objR);
        } else {
            $objR = (object)[
                "estado" => 1,
                "email" => $email
            ];
            array_push($respuesta, $objR);
        }

        return Response::json($respuesta);
    }

    public function notificar()
    {
        set_time_limit(0);
        $busquedaEmail = User::all();
        $ProductosArregloDes = Productos::select("nombre")->where("descuento", ">", "0.0")->get();
            foreach ($busquedaEmail as $u) {
                $email = $u->email;
                MailerController::EmailDescuento($email, $ProductosArregloDes);
            }
        



        // $productoDescuento = Str::replaceFirst('[{"descuento":',':',$productoDesc);

        return 1;
    }


    public function EmailDescuento($email, $ProductosDescuentos)
    {
        require base_path("vendor/autoload.php");
        $mail = new PHPMailer(true);     // Passing `true` enables exceptions
        // Email server settings
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';            //  smtp host
        $mail->SMTPAuth = true;
        $mail->Username = 'axesskateboarding@gmail.com';   //  sender username
        $mail->Password = 'johanayjorge';   // sender password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;                          // port - 587/465
        $mail->setFrom($email, 'Tienda Axes');
        $mail->addAddress($email);
        $mail->isHTML(true);                // Set email content format to HTML

        $mail->Subject = 'Descuentos en nuestros Productos';
        $mail->Body    = '<center style="min-width:580px;width:100%">
        <table style="Margin:0 auto;border-collapse:collapse;border-spacing:0;float:none;margin:0 auto;padding:0;text-align:center;vertical-align:top;width:100%">
            <tbody>
                <tr style="padding:0;text-align:left;vertical-align:top">
                    <td height="15px" style="Margin:0;border-collapse:collapse!important;color:#322f37;font-family:Helvetica,Arial,sans-serif;font-size:10px;font-weight:400;line-height:10px;margin:0;padding:0;text-align:left;vertical-align:top;word-wrap:break-word">&nbsp;</td>
                </tr>
            </tbody>
        </table>
    
            <table align="center" class="m_-3617184912195535673container" style="Margin:0 auto;background:#fff;border-collapse:collapse;border-spacing:0;float:none;margin:0 auto;padding:10px;text-align:center;vertical-align:top;width:580px;margin-left:10px!important;margin-right:10px!important">
            <tbody>
                <tr style="padding:0;text-align:left;vertical-align:top">
                    <td style="Margin:0;border-collapse:collapse!important;color:#322f37;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:left;vertical-align:top;word-wrap:break-word">
                        <table class="m_-3617184912195535673row m_-3617184912195535673header-v2" style="background-color:#fff;background-image:none;background-position:top left;background-repeat:repeat;border-bottom:1px solid #efeef1;border-collapse:collapse;border-spacing:0;display:table;margin:10px 0 15px 0;padding:0;text-align:left;vertical-align:top;width:100%"> 
                            <tbody>
                                <tr style="padding:0;text-align:left;vertical-align:top">
                                    <th class="m_-3617184912195535673small-12 m_-3617184912195535673columns" style="Margin:0 auto;color:#322f37;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0 auto;padding:0;padding-bottom:0!important;padding-left:20px;padding-right:20px;padding-top:0!important;text-align:left;width:560px">
                                        <table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                                            <tbody>
                                                <tr style="padding:0;text-align:left;vertical-align:top">
                                                    <th style="Margin:0;color:#322f37;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:left">
                                                        <h1 style="text-align: center; ">AXES SKATEBOARDING</h1>
                                                        <hr style="height:3px;border:none;background:linear-gradient(274deg, #46c9d0d8, #6262e2d2 44%, #c862f7d8)">
                                                    </th>
                                                </tbody>
                                            </table>
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                          
    
                            <table class="m_-3617184912195535673row" style="border-collapse:collapse;border-spacing:0;display:table;padding:0;text-align:left;vertical-align:top;width:100%">
                                <tbody>
                                    <tr style="padding:0;text-align:left;vertical-align:top">
                                        <th class="m_-3617184912195535673small-12 m_-3617184912195535673columns" style="Margin:0 auto;color:#322f37;font-family:Helvetica,Arial,sans-serif;font-size:18px;font-weight:500;line-height:1.3;margin:0 auto;padding:0;padding-bottom:0!important;padding-left:20px;padding-right:20px;padding-top:0!important;text-align:left;width:560px">
                                            <table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                                                <tbody>
                                                    <tr style="padding:0;text-align:left;vertical-align:top">
                                                        <th style="Margin:0;color:#322f37;font-family:Helvetica,Arial,sans-serif;font-size:18px;font-weight:500;line-height:1.3;margin:0;padding:0;text-align:left">
                                                            <h6 style="Margin:0;Margin-bottom:10px;color:inherit;font-family:Helvetica,Arial,sans-serif;font-size:18px;font-weight:500;line-height:1.3;margin:0;margin-bottom:0;padding:0;padding-bottom:0;text-align:center;word-wrap:normal;color:#9147ff">Conoce nuestros descuentos.' . '</h6>
                                                        </th>
                                                        <th style="Margin:0;color:#322f37;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0!important;text-align:left;width:0">
                                                        </th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
            
    
    
                            <table class="m_-3617184912195535673row" style="border-collapse:collapse;border-spacing:0;display:table;padding:0;text-align:left;vertical-align:top;width:100%">
                                <tbody>
                                    <tr style="padding:0;text-align:left;vertical-align:top">
                                        <th class="m_-3617184912195535673small-12 m_-3617184912195535673columns" style="Margin:0 auto;color:#322f37;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:300;line-height:1.3;margin:0 auto;padding:0;padding-bottom:16px;padding-left:20px;padding-right:20px;padding-top:10px;text-align:left;width:560px">
                                            <table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                                                <tbody>
                                                    <tr style="padding:0;text-align:left;vertical-align:top">
                                                        <th style="Margin:0;color:#322f37;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:left">
                                                            <p style="Margin:0;Margin-bottom:10px;font-family:Helvetica,Arial,Verdana,font-size:16px;font-weight:300;line-height:24px;margin:0;margin-bottom:0;padding:0;padding-bottom:0;text-align:justify">
                                                            Este es un correo generado automáticamente. <br><br>
                                                            Hola a todos, es un gusto para nosotros tenerte en nuesta tienda <strong>AXES SKATEBOARDING</strong>, te queremos mostrar todos los descuentos de nuestros productos.<br><br>
                                                            Tenemos los siguientes productos con descuento: <br><br> <con>'.
                                                            foreach($ProductosArregloDes as $p){
                                                             $p->nombre . '"con un descuento del "<strong>' . $p->descuento . '"%</strong><br><br> Y muchos productos más".
                                                            }
                                                             ¡No te pierdas esta oportunidad y realiza tu compra ahora! <br>¡Siempre a la orden, <strong>AXES SKATEBOARDING</strong>!
                                                            <br><br>
                                                             </p>

                                                             <p style="Margin:0;Margin-bottom:10px;font-family:Helvetica,Arial,Verdana,font-size:16px;font-weight:300;line-height:24px;margin:0;margin-bottom:0;padding:0;padding-bottom:0;text-align:justify">
                                                                Click aqui para ir a nuestra página web y ver la sección de descuentos.  
                                                             <br><br><br>
                                                                 <a style="text-decoration:none;
                                                                 font-weight:600;
                                                                 font-size:20px;
                                                                 color:#000000;
                                                                 padding-top:15px;
                                                                 padding-bottom:15px;
                                                                 padding-left:150px;
                                                                 padding-right:150px;
                                                                 background-color:#F69DA1;" href="http://127.0.0.1:8000/Descuentos">Mostrar Descuentos</a>
                                                             </p>
                                                             <br><br>
                                                            <hr style="height:3px;border:none;background:linear-gradient(274deg, #46c9d0d8, #6262e2d2 44%, #c862f7d8)">
    
                                                        </th>
                                                        <th style="Margin:0;color:#322f37;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0;padding:0!important;text-align:left;width:0">
                                                        </th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                            
    
    
                        </td>
                    </tr>
                </tbody>
            </table>
            
            <table align="center" class="m_-3617184912195535673container" style="Margin:0 auto;background:0 0!important;border-collapse:collapse;border-spacing:0;float:none;margin:0 auto;padding:0;text-align:center;vertical-align:top;width:580px">
                    
                <table align="center" style="background:0 0!important;border-collapse:collapse;border-spacing:0;margin:20px auto 0 auto;padding:0;text-align:inherit;vertical-align:top;width:580px">
                    <tbody>
                        <tr>
                            <th>
                                <table style="border-collapse:collapse;border-spacing:0;display:table;padding:0;text-align:left;vertical-align:top;width:100%">
                                    <tbody>
                                        <tr style="padding:0;text-align:left;vertical-align:top">
                                            <th style="Margin:0 auto;color:#322f37;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0 auto;padding:0;padding-bottom:0!important;padding-left:20px;padding-right:10px;padding-top:0!important;text-align:left;width:270px">
                                                <a href="https://www.instagram.com/axes_sb/?hl=es-la" style="Margin:0;color:#9147ff;font-family:Helvetica,Arial,sans-serif;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:left;text-decoration:none" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://twitter.com/twitch/&amp;source=gmail&amp;ust=1619220556159000&amp;usg=AFQjCNEug20xhrAM9lzwNhIQFUKt-Iuyyw">
                                                    <img src="https://ci4.googleusercontent.com/proxy/XHffVu34DLJFd5BgnT-FmR1sO6U8aNYtqIngRIAczxlyKN1dB0Fe-00F3bXbo3fVQ4PlEIpJVQrCAsfuBto15Y4neEJHUxd2v0z7gy41unT3YDbJg6bTUgmWOcju7HCKeL18r1pH8A=s0-d-e1-ft#https://s.jtvnw.net/jtv_user_pictures/hosted_images/email-instagram-logo-20171115.png" width="20" height="20" alt="twitch-twitter" style="border:none;clear:both;display:block;float:right;max-width:100%;outline:0;text-align:right;text-decoration:none;width:auto" class="CToWUd"></a>
                                                </th>
                                                <th style="Margin:0 auto;color:#322f37;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0 auto;padding:0;padding-bottom:0!important;padding-left:10px;padding-right:20px;padding-top:0!important;text-align:left;width:270px"><a href="https://www.facebook.com/AXES-Skateboarding-100422468179966" style="Margin:0;color:#9147ff;font-family:Helvetica,Arial,sans-serif;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:left;text-decoration:none" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.facebook.com/twitch/&amp;source=gmail&amp;ust=1619220556159000&amp;usg=AFQjCNG3o1VhrjDfvgSdkK5emCCumBWZEw">
                                                    <img src="https://ci4.googleusercontent.com/proxy/XHffVu34DLJFd5BgnT-FmR1sO6U8aNYtqIngRIAczxlyKN1dB0Fe-00F3bXbo3fVQ4PlEIpJVQrCAsfuBto15Y4neEJHUxd2v0z7gy41unT3YDbJg6bTUgmWOcju7HCKeL18r1pH8A=s0-d-e1-ft#https://s.jtvnw.net/jtv_user_pictures/hosted_images/email-facebook-logo-20171115.png" width="20" height="20" alt="twitch-facebook" style="border:none;clear:both;display:block;float:left;max-width:100%;outline:0;text-align:left;text-decoration:none;width:auto" class="CToWUd"></a>
                                                </th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </th>
                            </tr>
                            <tr style="padding:0;vertical-align:top">
                                <th style="color:#322f37;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0">
                                    <p style="color:#322f37;font-family:Helvetica,Arial,Verdana,font-size:16px;font-weight:400;line-height:24px;margin:0;margin-top:5px;margin-bottom:10px;padding:0;padding-bottom:10px;text-align:center">
                                        <small style="color:#706a7c;font-size:14px">© 2021 AXES SKATEBOARDING, todos los derechos reservados</small>
                                    </p>
                                </th>
                                <th style="color:#322f37;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0!important;text-align:left;width:0"></th>
                            </tr>
                        </tbody>
                    </table>
            </table>
    </center>';


        $dt = $mail->send();
    }
}
