<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrudcontrollerP
{
    public function produc(){
        $datosP=DB::select("SELECT * FROM producto");
      // se utiliza  dd($datos); para comprobar que se esten pasando bien lso datos
      // $datos=DB::table("marcas")->select('id_marca', 'nombre');
      $marcas = DB::table('marca')->get(); // Obtener la lista de proveedores
      return view('productos.produc', compact('datosP', 'marcas'));
  }
   
    
public function create(Request $request) {
  try {

    $sql=DB::insert("insert into producto(nombre, descripcion, cantidad, id_marca) values (?,?,?,?)", [
      $request -> nombre_producto,
      $request ->descripcion,
      $request -> stock,
      $request -> id_marca,
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
      $sql = DB::update("update producto set nombre=?, descripcion=?, cantidad=?, id_marca=? where id_producto=?", [
          $request->nombre_producto,
          $request->descripcion,
          $request->stock,
          $request->id_marca,
          $request->id_producto,
      ]);
      return back()->with("correcto", "Producto modificado correctamente");
  } catch (\Throwable $th) {
    return back()->with("incorrecto", "Error al modificar");
  }
}
public function delete($id_producto) {
  try {
      $sql = DB::delete("delete from producto where id_producto = $id_producto", []);
      return back()->with("correcto", "Producto eliminado correctamente");
  } catch (\Throwable $th) {
      return back()->with("incorrecto", "Error al eliminar");
  }
}
};
