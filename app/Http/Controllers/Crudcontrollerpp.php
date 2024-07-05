<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Crudcontrollerpp
{
    public function prov(){
        $datospp=DB::select("SELECT * FROM proveedor");
      // se utiliza  dd($datos); para comprobar que se esten pasando bien lso datos
      // $datos=DB::table("marcas")->select('id_marca', 'nombre');
      return view ('proveedores.prov')->with("datospp", $datospp);
  }
   
    
public function create(Request $request) {
  try {

    $sql=DB::insert("insert into proveedor(nombre, mail, direccion) values (?,?,?)", [
      $request -> nombre_proveedor,
      $request ->mail,
      $request -> direccion,
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
      $sql = DB::update("update proveedor set nombre=?, mail=?, direccion=? where id_proveedor=?", [
          $request->nombre_proveedor,
          $request->mail,
          $request->direccion,
          $request->id_proveedor,
      ]);
      return back()->with("correcto", "Producto modificado correctamente");
  } catch (\Throwable $th) {
    return back()->with("incorrecto", "Error al modificar");
  }
}
public function delete($id_proveedor) {
  try {
      $sql = DB::delete("delete from proveedor where id_proveedor = $id_proveedor", []);
      return back()->with("correcto", "Producto eliminado correctamente");
  } catch (\Throwable $th) {
      return back()->with("incorrecto", "Error al eliminar");
  }
}
};
