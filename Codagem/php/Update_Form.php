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
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="../css/estilo.css" rel="stylesheet">

    <title>Atualizar perfil de <?php echo $animal ?> </title>
  </head>
  <body>
    <div class="container text-center">
    <form method="POST" class="row g-3" action="./Update_BD.php" style="margin-top: 5%; margin-bottom: 10%;">

        <h1 class="text-center">Atualizar informações</h1>
        <br><br>
        <div class="col-md-4 offset-md-4">
            <label for="animal_name" class="form-label fw-bold">Nome do animal</label>
            <input type="text" class="form-control" name="animal_name" id="animal_name" value="<?php echo $animal ?>" required>
        </div>

        <div class="col-md-4 offset-md-4">
            <label for="animal_age" class="form-label fw-bold">Idade do animal</label>
            <input type="number" class="form-control" name="animal_age" id="animal_age" value="<?php echo $idade ?>" required>
        </div>

        <div class="col-md-4 offset-md-4">
            <label for="animal_especie" class="form-label fw-bold">Espécie do animal</label>
            <select class="form-select" name="animal_especie" id="animal_especie" value="<?php echo $especie ?>" required>
                <option style="color: white;" selected value="<?php echo $especie ?>"><?php echo $especie ?></option>
                <option value="Gato">Gato</option>
                <option value="Cachorro">Cachorro</option>
                <option value="Coelho">Coelho</option>
                <option value="Tartaruga">Tartaruga</option>
                <option value="Peixe">Peixe</option>
                <option value="Rato">Rato</option>
                <option value="Hamster">Hamster</option>
                <option value="ave">Ave</option>
            </select>
        </div>

        <div class="col-md-4 offset-md-4">
            <label for="animal_sexo" class="form-label fw-bold">Sexo do animal</label>
            <select class="form-select" name="animal_sexo" id="animal_sexo" value="<?php echo $sexo ?>"required>
                <option style="color: white;" selected value="<?php echo $sexo ?>"><?php echo $sexo ?></option>
                <option value="Feminino">Feminino</option>
                <option value="Masculino">Masculino</option>
            </select>
        </div>

        <div class="row-12">
            <a type="button" href="./Perfil.php" class="btn btn-primary">Voltar</a>
            <button type="submit" class="btn btn-secondary">Atualizar</button>
        </div>

    </div>
    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </body>
</html>
