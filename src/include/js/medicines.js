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

function addToCart(idProd) {

    medRequest = new XMLHttpRequest(); 

    this.idProd = idProd;

    function addMed() {
        medRequest.open('GET', '../services/medicines.php?add=' + this.idProd);
        medRequest.send();
    }

    addMed();
    getMedicines();

}
