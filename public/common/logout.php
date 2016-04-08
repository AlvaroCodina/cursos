<?php
/**
 * Created by PhpStorm.
 * User: alvaro
 * Date: 31/03/16
 * Time: 11:47
 */

session_start();
unset($_SESSION['name']);
header('Location: /');

?>