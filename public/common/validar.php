<?php
/**
 * Created by PhpStorm.
 * User: alvaro
 * Date: 30/03/16
 * Time: 17:44
 */

session_start();

require_once('Funciones.php');

if(isset($_GET['id'])){

    $id = $_GET['id'];

    echo "Validar id: ".$id;

}

if(isset($_POST['enviar'])){

    $name = $_POST['name'];
    $pass = $_POST['pass'];

    if(isset($_POST['email'])){

        $email = $_POST['email'];

        if(Funciones::verificarEmail($email)){
            // CUANDO EXISTE UN USUARIO CON ESE EMAIL

            header('Location: /signup');

        }
        else{
            // CUANDO NO EXISTE UN USUARIO CON ESE EMAIL

            Funciones::insertarUsuario($name, $pass, $email);
            echo "Se inserto correctamente";
            $_SESSION['name'] = $name;
            header('Location: /');

        }

    }
    else{

        if(Funciones::verificarUsuario($name, $pass)){
            // CUANDO EXISTE EL USUARIO
            $_SESSION['name'] = $name;
            header('Location: /');

        }
        else{
            // CUANDO NO EXISTE EL USUSARIO


        }

    }


}



?>