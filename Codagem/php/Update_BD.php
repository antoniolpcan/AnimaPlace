<?php

require 'ClassBD.php';

session_start();

if(!isset($_SESSION["user_login"]) || $_SESSION["logado"] !== true){
    header("location: ../index.html");
    exit;
}

$username = $_SESSION["user_login"];
$name = $_POST['animal_name'];
$age = $_POST['animal_age'];
$especie = $_POST['animal_especie'];
$sexo = $_POST['animal_sexo'];

$UpdateAnimal = new DataBaseAnimal;
?>



<!doctype html>
<html lang="pt_BR">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="../css/estilo.css" rel="stylesheet">

    <title>Update</title>
  </head>
  <body>
    <div class="container text-center" style="margin-top: 10rem;margin-bottom: 10rem;">
        <div class="container" style="background-color: white">
        <br><br>  
        <h1 class="text-center"> <?php echo $UpdateAnimal -> update_perfil($name, $age, $especie, $sexo, $username); ?></h1>
        <br>
            <div class="row-12">
                <a type="button" href="./Perfil.php" class="btn btn-primary">Voltar ao perfil</a>
            </div>
        <br><br><br>   
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>

