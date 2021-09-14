// GET MEDICINES

function getMedicines() {

    request = new XMLHttpRequest(); 

    function getAll() {
        request.open('GET', '../services/medicines.php?get=true');
        request.send();
    }

    request.onreadystatechange = function(){
        if(request.readyState == 4){
            var medicines = document.getElementById('medicines');
            medicines.innerHTML = request.responseText;          
        }
    }

    getAll();
}
