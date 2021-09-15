<?php
session_start();

if((!isset ($_SESSION['id']) == true) and (!isset ($_SESSION['email']) == true))
{
  unset($_SESSION['id']);
  unset($_SESSION['user']);
  unset($_SESSION['email']);
  header('location:../../index.php');
}

$name = $_SESSION['user'][0];

?>

<!DOCTYPE html>
<html>
    
    <head>
        <title>Farmacia Terezinha</title>

        <link rel="stylesheet" href="../include/css/css.css" />

        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />   
             
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

        <script src="../include/js/medicines.js"></script>

        <meta name="viewport" content="width=device-width, initial-scale=1">

    </head>

    <body onLoad="getMedicines()">

        <div data-role="page"> 
            <div data-role="header" class="header">
                <table class="head-table">
                    <tr>
                        <td><h4>Olá <?php echo($name) ?></h4></td>
                        <td><a onclick="cart()"><img width="25" src="../imgs/icons/cart.png"></a></td>
                        <td><a><img width="25" src="../imgs/icons/user.png"></a></td>
                    </tr>
                </table>
                
            </div>            

            <div data-role="content">

                <div id="medicines"></div>              

            </div>          

            <div data-role="footer" class="ui-bar">
                <a href="#" data-icon="arrow-u">Subir</a>
            </div>           

        </div>         
        
        <!-- Modal Structure -->

        <div id="backMsg"></div>

        <div id="cart-card">
            <div id="cart"></div>
            <select>

            </select>
            <div >
                <a onclick="">Comprar</a>
                <a onclick="cart()">Fechar</a>
            </div>
        </div>


    </body>
</html>