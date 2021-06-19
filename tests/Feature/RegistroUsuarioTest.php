<?php

namespace Tests\Feature;

use Faker\Core\Number;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegistroUsuarioTest extends TestCase
{
     use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
   

    public function test_RegistroUsuario(){
       
     $response=$this->post('/InicioSesionR',[
        'nombre' => 'testeo',
        'apellido' => 'usuga',
        'correo' => 'testeousuga@gmail.com',
        'identificacion' => '1000637680',
        'contraseña' => '12345',
        'ConfirmarContraseña' => '12345',
        'telefono' => '5850567',
        'id_rol'=> 1,
        'estado'=> 1
     ]);
     $response->assertJsonStructure(["nombre","apellido","correo","identificacion","contraseña","ConfirmarContraseña","telefono"])
                                     ->assertJson((['name'=>'testeo']))
                                     ->assertJson((['apellido'=>'usuga']))
                                     ->assertJson((['identificacion'=>'1000637680']))
                                    ->assertStatus(200);

     $this->assertDatabaseHas('users',['nombre'=>'testeo','apellido'=>'usuga','correo'=>'testeousuga@gmail.com',
                              'identificacion'=>'1000637680']);
    }
}
