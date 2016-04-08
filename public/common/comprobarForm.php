<?php
/**
 * Created by PhpStorm.
 * User: alvaro
 * Date: 31/03/16
 * Time: 12:12
 */

    require_once('Funciones.php');

    $email = $_POST['email'];
    $name = $_POST['name'];
    $pass = $_POST['pass'];

    function comprobarDatos($name, $pass, $email){
        if($name!="" && strlen($name)>2){
            if($pass!="" && strlen($pass)>8){
                if($email!=""){
                    return true;
                }
                else{
                    return false;
                }
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }

    if(comprobarDatos($name, $pass, $email)){
        if(Funciones::verificarEmail($email)){
            // CUANDO EXISTE UN USUARIO CON ESE EMAIL

            echo "existe";

        }
        else{
            // CUANDO NO EXISTE UN USUARIO CON ESE EMAIL

            Funciones::insertarUsuario($name, $pass, $email);
            $_SESSION['name'] = $name;
            header('Location: /');

        }
    }
    else{
        echo "mal";
    }



?>