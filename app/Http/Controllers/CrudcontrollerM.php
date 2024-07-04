<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrudcontrollerM 
{
    public function marc(){
        $datosM=DB::select("SELECT * FROM marca");
      // se utiliza  dd($datos); para comprobar que se esten pasando bien lso datos
        // $datos=DB::table("marcas")->select('id_marca', 'nombre');
        return view ('marcas.marc')->with("datos", $datosM);
    }
   
    
public function create(Request $request) {
  try {

    $sql=DB::insert("insert into marca(nombre) values (?)", [
      $request -> nombre_marca
    ]);
  
  } catch (\Throwable $th) {
    $sql=0;
  }
  if ($sql=true) {
    return back ()->with("correcto", "producto registrado correctamente");

  } else {
    return back ()->with("incorrecto", "error al registrar");
  }
  
}
public function update(Request $request) {
  try {
      $sql = DB::update("update marca set nombre=? where id_marca=?", [
          $request->nombre_marca,
          $request->id_marca
      ]);
      return back()->with("correcto", "Producto modificado correctamente");
  } catch (\Throwable $th) {
    return back()->with("incorrecto", "Error al modificar");

  }
}
public function delete($id_marca) {
  try {
      $sql = DB::delete("delete from marca where id_marca=$id_marca", [
          
      ]);
  } catch (\Throwable $th) {
      $sql = 0;
  }

  if ($sql) {
      return back()->with("correcto", "Producto eliminado correctamente");
  } else {
      return back()->with("incorrecto", "Error al eliminar");
  }
}
};
