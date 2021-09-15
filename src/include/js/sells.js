// BUY MEDICINES

function buy() {

    request = new XMLHttpRequest(); 

    mpay = document.getElementById('mpay').value;

    function getAll() {
        request.open('GET', '../services/sells.php?buy=' + mpay);
        request.send();
    }

    request.onreadystatechange = function(){
        if(request.readyState == 4){
            var medicines = document.getElementById('cart');
            medicines.innerHTML = request.responseText;          
        }
    }

    getAll();  
    
    
    getCart();

}