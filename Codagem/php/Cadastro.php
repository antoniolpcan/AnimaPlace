<?php

require 'ClassBD.php';

$username =  $_POST['field_username'];
$senha = $_POST['password_user'];
$name = $_POST['animal_name'];
$age = $_POST['animal_age'];
$especie = $_POST['animal_especie'];
$sexo = $_POST['animal_sexo'];

$CadastroAnimal = new DataBaseAnimal;
$CadastroAnimal -> adicionar_usuario($username, $senha, $name, $age, $especie, $sexo);

?>


