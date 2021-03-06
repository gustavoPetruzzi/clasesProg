<?php
include_once("accesoDatos.php");
class Producto
{
//--------------------------------------------------------------------------------//
//--ATRIBUTOS
	private $codBarra;
 	private $nombre;
  	private $pathFoto;
//--------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------//
//--GETTERS Y SETTERS
	public function GetCodBarra()
	{
		return $this->codBarra;
	}
	public function GetNombre()
	{
		return $this->nombre;
	}
	public function GetPathFoto()
	{
		return $this->pathFoto;
	}

	public function SetCodBarra($valor)
	{
		$this->codBarra = $valor;
	}
	public function SetNombre($valor)
	{
		$this->nombre = $valor;
	}
	public function SetPathFoto($valor)
	{
		$this->pathFoto = $valor;
	}

//--------------------------------------------------------------------------------//
//--CONSTRUCTOR
	public function __construct($codBarra=NULL, $nombre=NULL, $pathFoto=NULL)
	{
		if($codBarra !== NULL && $nombre !== NULL && $pathFoto !== NULL){
			$this->codBarra = $codBarra;
			$this->nombre = $nombre;
			$this->pathFoto = $pathFoto;
		}
	}

//--------------------------------------------------------------------------------//
//--TOSTRING	
  	public function ToString()
	{
	  	return $this->codBarra." - ".$this->nombre." - ".$this->pathFoto."\r\n";
	}
//--------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------//
//--METODOS DE CLASE
	public static function modificarProductoDB($producto) {
		$objetoAccesoDatos = accesoDatos::DameUnObjetoAcceso();
		$consulta = $objetoAccesoDatos->RetornarConsulta("UPDATE producto SET nombre= :nombre, path_foto = :pathFoto WHERE codigo_barra = :codigo");
		$consulta->bindValue(':codigo', $producto->GetCodBarra(), PDO::PARAM_INT);
		$consulta->bindValue(':nombre', $producto->GetNombre(), PDO::PARAM_STR);
		$consulta->bindValue(':pathFoto', $producto->GetPathFoto(), PDO::PARAM_STR);
		return $consulta->execute();
	}
	public static function buscarProductoDB($codBarra){
		$objetoAccesoDatos = accesoDatos::DameunObjetoAcceso();
		$consulta = $objetoAccesoDatos->RetornarConsulta("SELECT codigo_barra AS codBarra, nombre, path_foto AS pathFoto FROM producto WHERE codigo_barra = :codigo");
		$consulta->bindValue(':codigo', $codBarra, PDO::PARAM_INT);
		$consulta->setFetchMode(PDO::FETCH_CLASS, 'producto');
		$consulta->execute();
		$producto = $consulta->fetch();
		
		return $producto;
	}
	public static function borrarDB($codBarra)
	{
		$objetoAccesoDatos = accesoDatos::DameUnObjetoAcceso();
		$consulta = $objetoAccesoDatos->RetornarConsulta("DELETE FROM producto WHERE codigo_barra = :codigo");
		$consulta->bindValue(':codigo', $codBarra, PDO::PARAM_INT);
		return $consulta->execute();
	}
	public static function borrarProducto($codBarra)
	{
		$resultado['exito'] = true;
		$resultado['error'] = "";
		
		$producto = Producto::buscarProductoDB($codBarra);
		$imagen = "archivos/".$producto->GetPathFoto();
		if(file_exists($imagen)){
			if(!unlink($imagen)){
				$resultado['exito'] = false;
				$resultado['error'] = "No se pudo borrar la imagen";
			}
		}
		else{
			$resultado['exito'] = false;
			$resultado['error'] = "la imagen no existe";
		}
		
		if(!Producto::borrarDB($codBarra)) {
			$resultado['exito'] =  false;
			$resultado['error'] .= " " ."No se pudo borrar el producto de la base";
		}
		
		return $resultado;
	}
	public static function GuardarDB($obj)
	{
		$resultado = FALSE;
		
		$objetoGuardarDatos = accesoDatos::DameUnObjetoAcceso();
		$consulta = $objetoGuardarDatos->RetornarConsulta("INSERT INTO producto (codigo_barra, nombre, path_foto)"
														 ." VALUES(:codigo, :nombre, :path)");
		$consulta->bindValue(':codigo', $obj->GetCodBarra(), PDO::PARAM_INT);
		$consulta->bindValue(':nombre', $obj->GetNombre(), PDO::PARAM_STR);
		$consulta->bindValue(':path', $obj->GetPathFoto(), PDO::PARAM_STR);
		
		return $consulta->execute();
	}
	public static function Guardar($obj)
	{
		$resultado = FALSE;
		
		//ABRO EL ARCHIVO
		$ar = fopen("archivos/productos.txt", "a");
		
		//ESCRIBO EN EL ARCHIVO
		$cant = fwrite($ar, $obj->ToString());
		
		if($cant > 0)
		{
			$resultado = TRUE;			
		}
		fclose($ar);
		$resultado = producto::GuardarDB($obj);
		
		
		return $resultado;
	}
	public static function TraerTodosLosProductos()
	{

		$ListaDeProductosLeidos = array();

		//leo todos los productos del archivo
		$archivo=fopen("archivos/productos.txt", "r");
		
		while(!feof($archivo))
		{
			$archAux = fgets($archivo);
			$productos = explode(" - ", $archAux);
			//http://www.w3schools.com/php/func_string_explode.asp
			$productos[0] = trim($productos[0]);
			if($productos[0] != ""){
				$ListaDeProductosLeidos[] = new Producto($productos[0], $productos[1],$productos[2]);
			}
		}
		fclose($archivo);
		
		return $ListaDeProductosLeidos;
		
	}
	public static function TraerTodosLosProductosDB()
	{
		$ListaDeProductosLeidos = array();
		$objetoAccesoDatos = AccesoDatos::DameUnObjetoAcceso();
		$consulta = $objetoAccesoDatos->RetornarConsulta("SELECT codigo_barra AS codBarra, nombre, path_foto AS pathFoto FROM producto");
		$consulta->execute();
		$ListaDeProductosLeidos = $consulta->fetchAll(PDO::FETCH_CLASS, "Producto");
		
		return $ListaDeProductosLeidos;
		
	}
//--------------------------------------------------------------------------------//
}