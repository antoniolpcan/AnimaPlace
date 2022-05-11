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
            echo "Cadastro feito com sucesso";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        }
    }
}