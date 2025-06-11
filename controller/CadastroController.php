
<?php

require '../model/CadastroModel.php';

if ($_POST){
         $username = $_POST['username'];
         $email = $_POST['email'];
         $telefone = $_POST['telefone'];
         $password = $_POST['password'];
         $confirm_password = $_POST["confirm_password"] ?? null;

$result = register($username, $email, $telefone, $password,  $confirm_password);

echo $result;

if($result){
   echo "Cadastro realizado com sucesso! ";
}else{
    echo "Não foi possivel realizar o cadastro.";
}
}