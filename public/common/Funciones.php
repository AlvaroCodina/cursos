<?php

/**
 * Created by PhpStorm.
 * User: alvaro
 * Date: 31/03/16
 * Time: 10:02
 */
class Funciones
{

    private static $conexion;

    private static function conectar(){
        $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        $dsn = "mysql:host=localhost;dbname=cursos";
        $usuario = 'root';
        $contrasena = 'root';
        try{
            $conexion= new PDO($dsn, $usuario, $contrasena, $opc);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $e) {
            die ('Abortamos la aplicación por fallo conectando con la BD' . $e->getMessage());
        }
        self::$conexion = $conexion;

    }

    protected static function ejecutaConsulta($sql,$valores) {
        if (self::$conexion == null)
            self::conectar();
        $conexion = self::$conexion;
        try{
            $consulta = $conexion->prepare($sql);
            $consulta->execute($valores);
        }catch (PDOException $e) {
            echo 'No se ha podido ejecutar la consulta' . $e->getMessage();
            return null;
        }
        return $consulta;

    }

    public static function verificarEmail($email) {
        $valores = array('email' =>$email);
        $sql = "SELECT name FROM usuarios WHERE email=:email";
        $resultado = self::ejecutaConsulta ($sql,$valores);
        return $resultado;
    }

    public static function verificarUsuario($nombre, $pass) {
        $valores = array('nombre'=>$nombre, 'contra' =>$pass);
        $sql = "SELECT name FROM usuarios WHERE name=:nombre AND pass=:contra ";
        $resultado = self::ejecutaConsulta ($sql,$valores);
        $verificado = false;
        if ($resultado->fetch())
            $verificado=true;
        return $verificado;
    }

    public static function insertarUsuario($nombre, $pass, $email) {
        $valores = array('nombre'=>$nombre, 'contra' =>$pass, 'email' =>$email);
        $sql = "INSERT INTO usuarios(name, pass, email) VALUES (:nombre,:contra,:email)";
        $resultado = self::ejecutaConsulta ($sql,$valores);
        return $resultado;
    }

}