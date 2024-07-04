<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Crudcontroller 
{
    public function client(){
            $datos = DB::table('cliente')
                        ->select('*')
                        ->get();
        //$datos=DB::select("SELECT * FROM cliente");
        return view ('clientes.clien')->with("datos", $datos);
    }

public function create(Request $request) {
    $data = [
        'nombre' => $request->nombre,
        'apellido' => $request->apellido,
        'direccion' => $request->direccion,
        'dni' => $request->dni,
        'cuit' => $request->cuit,
        'telefono' => $request->telefono,
    ];
    $sql = DB::table('cliente')->insert($data);

    if ($sql) {
        return back()->with('correcto', 'Cliente registrado correctamente');
    } else {
        return back()->with('incorrecto', 'Error al registrar');
    }
  }
  public function update(Request $request) {
    try {
        $sql = DB::update("update cliente set nombre=?, apellido=?, direccion=?, dni=?, cuit=?, telefono=? where id_cliente=?", [
            $request->nombre,
            $request->apellido,
            $request->direccion,
            $request->dni,
            $request->cuit,
            $request->telefono,
            $request->id_cliente,
        ]);
        return back()->with("correcto", "Cliente modificado correctamente");
    } catch (\Throwable $th) {
      return back()->with("incorrecto", "Error al modificar");
  
    }
  }
  public function delete($id_cliente) {
    try {
        $sql = DB::delete("delete from cliente where id_cliente=$id_cliente", [
            
        ]);
    } catch (\Throwable $th) {
        $sql = 0;
    }
  
    if ($sql) {
        return back()->with("correcto", "Cliente eliminado correctamente");
    } else {
        return back()->with("incorrecto", "Error al eliminar");
    }
  }
  };
  

