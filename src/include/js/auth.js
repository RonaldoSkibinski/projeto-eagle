
function auth() {
    this.email = document.getElementById('username').value;
    this.password = document.getElementById('password').value;

    request = new XMLHttpRequest(); 
      
    authUser(this.email, this.password);

    function authUser(email, password) {
        request.open('GET', 'src/services/auth.php?user='+ email +'&psswd=' + password, true);
        request.send();
    }

    request.onreadystatechange = function(){
        if(request.readyState == 4){

            var response = request.responseText;

            alert(response); 

            if(response == "1") {
                window.location.replace('src/components/home.php');
            }else if(response == "2") {
                alert('Senha incorreta'); 
            }else {
                alert('Usuario inexistente.'); 
            }
        }
    }
}





