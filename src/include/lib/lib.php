<?php
 
//----------------------------------------------------------------------------------------------------------------------------

  class banco {
    public $res;
    public $cnx;
    public $cheader;

    function __construct() {
      try {

        @$this->cnx = mysqli_connect('localhost', 'root', 'password', 'farmaciaterezinha');

        if(!$this->cnx) {
          die('Não foi possível conectar: ' . mysqli_error($this->cnx));
        }
        //echo 'Conexão bem sucedida';

      }catch (Exception $e) {
        echo 'Exceção capturada: ',  @$e->getMessage(), "\n";
      }
      
    }

    // ------- FUNCTION CONSULTA 

    function consulta($sql) {
      $this->res = mysqli_query($this->cnx, $sql);
      if (!$this->res) {
          @die('Invalid query: ' . mysqli_error($this->cnx));
      }  
    }


  } 
   