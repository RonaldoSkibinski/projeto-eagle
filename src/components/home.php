<?php
session_start();

if((!isset ($_SESSION['id']) == true) and (!isset ($_SESSION['email']) == true))
{
  unset($_SESSION['id']);
  unset($_SESSION['user']);
  unset($_SESSION['email']);
  unset($_SESSION['total']);
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
        <script src="../include/js/sells.js"></script>

        <meta name="viewport" content="width=device-width, initial-scale=1">

    </head>

    <body onLoad="getMedicines()">       

        <div data-role="page"> 
            <div data-role="header" class="header">
                <table class="head-table">
                    <tr>
                        <td width="50"><img src="../imgs/icons/logofarmacia.png" width="40"></td>
                        <td ><h4>Olá <?php echo($name) ?></h4></td>
                        <td width="50"><a onclick="cart()"><img width="25" src="../imgs/icons/cart.png"></a></td>
                        <td width="50"><a onclick="popup()"><img width="25" src="../imgs/icons/user.png"></a></td>
                    </tr>
                </table>
                
            </div>             

            <div class="content" data-role="content">

                <h3>Nossos Medicamentos: </h3>

                <div class="medicines">
                    <div id="medicines"></div>    
                </div>                       
                
                <div id="popup">
                    <p><a onclick="purchases()">Compras</a></p>
                    <p><a onclick="logout()">Sair</a></p>
                </div>

            </div>    
            
            <div class="content" data-role="content">
                <div class="content-two" data-role="content">
                    <h2>VIVA UMA VIDA LEVE</h2>
                    <h5><a>ADQUIRA O NOSSO CARTÃO</a></h5>
                    <div >
                        <img class="homeImg" src="../imgs/imgs/life.jpg">
                    </div>                    
                </div>
            </div>

            <div data-role="footer" class="ui-bar">
                <a href="#" data-icon="arrow-u">Subir</a>
            </div>           

        </div>         
        
        <!-- Modal Structure -->

        <div id="backMsg"></div>

        <div id="cart-card">
            <h4> Carrinho de Compras: </h4>
            <div id="cart"></div>            
            <div class="align">
                <select id="mpay">
                    <option value="Avista" selected>Avista</option>
                    <option value="Debito">Debito</option>
                    <option value="Credito">Credito</option>
                </select>
                <table style="width: 100%;">
                    <tr>
                        <td class="tdHead" colspan="2"><div id="total"></div></td>
                    </tr>
                    <tr>
                        <td class="tdHead" colspan="2">Vai chegar em 3 dias.</td>
                    </tr>
                    <tr>
                        <td><a onclick="buy()"><button id="buyBtn" class="btnNorm">Comprar</button></a></td>
                        <td><a onclick="cart()"><button class="btnNorm">Fechar</button></a></td>
                    </tr>
                </table>              
            </div>
        </div>

        <div id="pur-card">
            <h4> Compras Realizadas: </h4>
            <div id="purchases"></div>
            <div>
                <a onclick="purchases()"><button class="btnNorm" style="margin-top: 10px;">Fechar</button></a>          
            </div>
        </div>


    </body>
</html>