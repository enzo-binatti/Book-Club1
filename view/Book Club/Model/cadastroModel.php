<?php
require '../service/conexao.php';

 function register($username, $email, $telefone, $password,  $confirm_password)
 {

         $conn = new usePDO();
         $instance = $conn->getInstance();

         
         //cadastro de pessoa
         $sql = "INSERT INTO pessoa (nome, telefone, email) VALUES (?, ?, ?)";
         $stmt = $instance->prepare($sql);
         $stmt->execute([$username, $telefone, $email]);
         
         //criptografia da senha
         $hashed_password = password_hash($password, PASSWORD_DEFAULT);


         $sql = "INSERT INTO users (email, username, password) VALUES ( ?, ?, ?)";
        //cadastro de usuario
         $idPessoa = $instance->lastInsertId();
         $sql = "INSERT INTO usuario (usuario, senha, ID_pessoa) VALUES (?, ?, ?)";
         $stmt = $instance->prepare($sql);
         $stmt->execute([$username, $hashed_password, $idPessoa]);

         $result = $stmt->rowCount();
         return $result;
         return $idPessoa;
}
                 