<!DOCTYPE html>
<html>
    
    <head>
        <title>Farmacia Terezinha</title>

        <link rel="stylesheet" href="../include/css/css.css" />

        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />   
             
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

        <meta name="viewport" content="width=device-width, initial-scale=1">

    </head>

    <body>

        <div data-role="page"> 
            <div data-role="header" class="header">
                <h1>Farmacia Terezinha</h1>
            </div>            

            <div data-role="content">

                <h4> Por Favor </h4>
                <h5> Insira seus Dados para Cadastrar-se: </h5>

                <div id="mDiv">
                    <form name='cadUser' method='POST' action='../services/caduser.php?add=1'>
                        <div data-role="fieldcontain" class="ui-hide-label">
                            <label for="name">Nome:</label>
                            <input type="text" name="name" id="name" value="" placeholder="Ex. Gertrudes"/>
                        </div>
                        <div data-role="fieldcontain" class="ui-hide-label">
                            <label for="phone">Telefone:</label>
                            <input type="text" name="phone" id="phone" value="" placeholder="Ex. (42) 99999-9999"/>
                        </div>
                        <div data-role="fieldcontain" class="ui-hide-label">
                            <label for="address">Endereço:</label>
                            <input type="text" name="address" id="address" value="" placeholder="Ex. Rua Floresta"/>
                        </div>
                        <div data-role="fieldcontain" class="ui-hide-label">
                            <label for="email">Email:</label>
                            <input type="text" name="email" id="email" value="" placeholder="Ex. gertrudes@gmail.com"/>
                        </div>
                        <div data-role="fieldcontain" class="ui-hide-label">
                            <label for="password">Senha:</label>
                            <input type="password" name="password" id="password" value="" placeholder=""/>
                        </div>

                        <div class="buttonsDiv">
                            <input type="submit" class="blueBtn" data-icon="check" data-inline="true">
                            <a href="#" class="link"><button class="btn" data-icon="arrow-l" data-iconpos="left" data-inline="true">Voltar</button></a>
                        </div>    
                    </form>                
                </div>

            </div>


            <div data-role="footer" class="ui-bar">
                <a href="#" data-icon="arrow-u">Subir</a>
            </div>
        </div> 
        
    </body>
</html>