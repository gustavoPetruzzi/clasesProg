<?php
    include_once('accesoDatos.php');
    class container 
    {
        public $numero;
        public $descripcion;
        public $pais;
        public $foto;
        function __construct($numero=NULL,$descripcion=NULL,$pais=NULL,$foto=NULL)
        {
            if($numero != NULL && $descripcion !==NULL && $pais!==NULL && $foto!==NULL)
            {
                $this->numero = $numero;
                $this->descripcion = $descripcion;
                $this->pais = $pais;
                $this->foto = $foto;
            }
        }
        public static function guardar($container){
            $objetoGuardarDatos = accesoDatos::DameUnObjetoAcceso();
            
		    $consulta = $objetoGuardarDatos->RetornarConsulta("INSERT INTO container (numero, descripcion, pais, foto)"
														    ." VALUES(:numero, :descripcion, :pais, :path)");
		    $consulta->bindValue(':numero', $container->numero, PDO::PARAM_INT);
		    $consulta->bindValue(':descripcion', $container->descripcion, PDO::PARAM_STR);
            $consulta->bindvalue(':pais', $container->pais, PDO::PARAM_STR);
		    $consulta->bindValue(':path', $container->foto, PDO::PARAM_STR);
            
            //echo $container->numero.$container->descripcion.$container->pais.$container->foto;
            return $consulta->execute();
        }
        public static function traerTodos(){
            $ListaDeProductosLeidos = array();

            $objetoAccesoDatos = AccesoDatos::DameUnObjetoAcceso();
            $consulta = $objetoAccesoDatos->RetornarConsulta("SELECT * FROM container");
            $consulta->execute();
            $ListaDeProductosLeidos = $consulta->fetchAll(PDO::FETCH_CLASS, 'container');
            return $ListaDeProductosLeidos;
        }
        public static function borrarDB($numero){
            $objetoAccesoDatos = AccesoDatos::DameUnObjetoAcceso();
            $consulta = $objetoAccesoDatos->RetornarConsulta("DELETE FROM container WHERE numero = :numero");
            $consulta->bindValue(':numero', $numero, PDO::PARAM_INT);
            return $consulta->execute();
        }
        public static function buscar($pais){
            $ListaDeProductosLeidos = array();

            $objetoAccesoDatos = AccesoDatos::DameUnObjetoAcceso();
            
            //$pais = '"'.$pais.'"';
            $consulta = $objetoAccesoDatos->RetornarConsulta("SELECT * FROM container WHERE pais = :pais");
            $consulta->bindValue(':pais', $pais, PDO::PARAM_STR);
            $consulta->execute();
            $ListaDeProductosLeidos = $consulta->fetchAll(PDO::FETCH_CLASS, 'container');
            return $ListaDeProductosLeidos;
        }
    }
    
?>