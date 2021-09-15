// VERIFICA EMAIL

function emailIsValid(){

    email = document.getElementById('email');

    request = new XMLHttpRequest(); 
      
    authUser(this.email.value);

    function authUser(email, password) {
        request.open('GET', '../services/auth.php?email='+ email, true);
        request.send();
    }

    request.onreadystatechange = function(){
        if(request.readyState == 4){

            response = request.responseText;
            

            if(response == "1") {
                document.getElementById("cadUser").submit();
            }else {
                alert("O Email ja está em uso.");          
            }
        }
    }
}