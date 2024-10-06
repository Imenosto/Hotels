
document.addEventListener("input", () => {
    let arriveInput = byId("dateArrivee");
    let departInput = byId("dateDepart");
    let errorMsg = byId("dateError");

    if (arriveInput.value && departInput.value) {
        let arriveDate = new Date(arriveInput.value);
        let departDate = new Date(departInput.value);

        if (arriveDate >= departDate) {
            errorMsg.innerHTML = "La date de départ doit être après la date d'arrivée.";
        } else {
            errorMsg.innerHTML = "";
        }
    }
});

//FUNCTIONS
function byId(id){
    return document.getElementById(id);
}