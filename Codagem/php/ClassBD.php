<?php

class DataBaseAnimal{
    private $servername = '127.0.0.1';
    private $username = 'root';
    private $password = '';
    private $dbname = 'CadastroAnimal';
    private $conn;

    public function __construct(){
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    public function __destruct(){
        mysqli_close($this->conn);
    }

    public function adicionar_usuario($username, $senha, $nome_animal, $animal_idade, $animal_especie, $animal_sexo){ 
        $sql = "INSERT INTO Usuario (username, senha, nome_animal, animal_idade, animal_especie, animal_sexo)";
        $sql = $sql."VALUES ('".$username."', '".$senha."', '".$nome_animal."', '$animal_idade', '".$animal_especie."', '".$animal_sexo."')";
        if (mysqli_query($this->conn, $sql)) {
            return "Cadastro feito com sucesso!";
        } else {
            return "Usuário já existente.";
        }
    }

    public function deletar_usuario($username){ 
        $sql = "DELETE FROM Usuario WHERE username = '$username'";
        if (mysqli_query($this->conn, $sql)) {
            return "$username foi deletado...";
        } else {
            return "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        }
    }

    public function login_site($user, $pass){ 
        $sql = "SELECT * FROM Usuario WHERE username ='$user' AND senha = '$pass'";
        if (mysqli_query($this->conn, $sql)) {
            $result = mysqli_query($this->conn, $sql);
            if (mysqli_num_rows($result) <= 0){
                header("location:../index.html");
            }
            else{
                session_start();
                $_SESSION["user_login"] = $user;
                $_SESSION["logado"] = TRUE;
                header("location:Perfil.php");
            }
        } else {
            echo "Usuário ou senha inválidos.";
        }
    }

    public function update_perfil($nome_animal, $animal_idade, $animal_especie, $animal_sexo, $username){ 
        $sql = "UPDATE Usuario SET nome_animal = '$nome_animal', animal_idade = '$animal_idade', animal_especie = '$animal_especie', animal_sexo = '$animal_sexo' where username = '$username';";
        if (mysqli_query($this->conn, $sql)) {
            return "Update feito com sucesso!";
        } else {
            return "Erro ao fazer update.". "<br>" . "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        }
    }

    public function select_dados($username){ 
        $sql = "SELECT username, senha, nome_animal, animal_idade, animal_especie, animal_sexo from Usuario where username = '$username'";

        $result = mysqli_query($this->conn, $sql);

        if ($result) {
            return $row = $result->fetch_assoc();
        } 
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        }
    }

}