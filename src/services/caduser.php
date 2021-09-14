<?php
  require("../include/lib/lib.php");
  $db = new banco();
  

//------------------------------------ ADD USER -------------------------------------------------------------------------------------------------------------------------------------

  
  if($_GET['add'] == 1){

      try {

        $db->consulta("select email from user where email='$_POST[email]'");

        if($line=mysqli_num_rows($db->res) != 0){

          echo(" Este Email já Está Cadastrado.  ");

        } else {

          $psswd = $_POST['password'];

          $options = ['cost' => 8];

          $hash = password_hash($psswd,  PASSWORD_DEFAULT, $options);

          $db->consulta("insert into user (name, phone, email, address, password) 
          values 
          ('$_POST[name]','$_POST[phone]', '$_POST[email]','$_POST[address]','$hash')");

          echo("<script>alert('Usuario Cadastrado com Sucesso!');top.location=\"../../index.php\";</script>"); 
        }
        
      }  catch (Exception $e) {

        echo 'Exceção capturada: ',  $e->getMessage(), "\n";

    }

  }

?>