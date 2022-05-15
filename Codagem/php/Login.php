<?php

require 'ClassBD.php';

$LoginAnimal = new DataBaseAnimal;

$LoginAnimal->login_site($_POST['usr'], $_POST['pass']);

?>