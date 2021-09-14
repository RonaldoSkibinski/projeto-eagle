<?php
  session_start();
  require("../include/lib/lib.php");
  $db = new banco();
  

//------------------------------------ GET MEDICINES -------------------------------------------------------------------------------------------------------------------------------------

if($_GET['get']){

    try {

        $db->consulta("select cod, name, qtdmg, lab, val, img from medicines");

        if($line=mysqli_num_rows($db->res) != 0){
            
            while ($row = mysqli_fetch_row($db->res)) {

                echo("
                
                <div class='medicine-card'>
                    <table>
                        <tr>
                            <td colspan='2'>
                                <img src='"); echo($row[5]); echo("'> 
                            </td>
                        </tr>
                        <tr>
                            <td colspan='2'>
                                "); echo($row[1]); echo(" - "); echo($row[2]); echo("
                            </td>
                        </tr>
                        <tr>
                            <td colspan='2'>
                                "); echo($row[3]); echo("
                            </td>
                        </tr>
                        <tr>
                            <td>
                                "); echo($row[4]); echo("
                            </td>
                            <td>
                                <button onclick='addToCart("); echo($row[0]); echo(")'> Adicionar o Carrinho </button>
                            </td>
                        </tr>
                    </table>
                </div>
                
                ");
            }            

        } else {
            // EMPTY TABLE
            echo ('3');
        }

    }catch(Exception $e) {

        echo 'Exceção capturada: ',  $e->getMessage(), "\n";
        
    }
      

}   

?>