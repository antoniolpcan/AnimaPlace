<?php

require 'ClassBD.php';

session_start();

if(!isset($_SESSION["user_login"]) || $_SESSION["logado"] !== true){
    header("location: ../index.html");
    exit;
}

$DadosAnimal = new DataBaseAnimal;

$row = $DadosAnimal -> select_dados($_SESSION["user_login"]);

$user = $row["username"];
$password = $row["senha"];
$animal = $row["nome_animal"];
$idade = $row["animal_idade"];
$especie = $row["animal_especie"];
$sexo = $row["animal_sexo"];
?>

<!doctype html>
<html lang="pt_BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="../css/estilo.css" rel="stylesheet">

    <title>Perfil de <?php echo $animal ?></title>
  </head>
  <body>
    <div class="container text-center" style="margin-top: 5rem;margin-bottom: 7rem;">
        <div class="card text-center">
            <div class="card-header">
                Perfil do Animal
            </div>
            <div class="card-body">
                <img src="../images/<?php echo $especie ?>.png" class="rounded mx-auto d-block" alt="<?php echo $especie ?>">

                <h5 class="card-title"><?php echo $animal ?></h5>
                <p class="card-text"> Idade: <?php echo $idade ?></p>
                <p class="card-text"> Sexo: <?php echo $sexo ?></p>
                <div class="row-12">
                    <a type="button" href="./Update_Form.php" class="btn btn-secondary">Editar perfil</a>
                    <a type="button" href="./Deletar.php" class="btn btn-danger">Deletar perfil</a>
                    <a type="button" href="./Logout.php" class="btn btn-warning">Deslogar</a>
                </div>  
            </div>
            <div class="card-footer text-muted">
                <br>
            </div>
        </div>
    </div>
  </body>
</html>