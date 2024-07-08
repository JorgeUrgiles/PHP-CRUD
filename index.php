<?php
require_once "usuario.php";
$usuario = new Usuario(
    2,
    "Pamela",
    "Orellana",
    "0998976543555",
    "18"
);
$usuario->insertar();
// $usuario->actualizar();
// $usuario->eliminar();
// var_dump($usuario->getAll());
// var_dump($usuario->getOne(2));
// 
?>