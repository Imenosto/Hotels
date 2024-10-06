document.addEventListener("input", (event) => {
    let target = event.target;

    if (target.name === "prix") {
        let prixError = byId("prixError"); 
        let prix = parseFloat(target.value); 

        if (isNaN(prix) || prix < 50 || prix > 250) {
            prixError.innerHTML = "Le prix doit être compris entre 50 et 250.";
        } else {
            prixError.innerHTML = ""; 
        }
    }

    if (target.name === "nbLits") {
        let nbLitsError = byId("nbLitsError");
        let lits = parseFloat(target.value);

        if (isNaN(lits) || lits !== 2) {
            nbLitsError.innerHTML = "Le nombre de lit doit être fixé à 2.";
        } else {
            nbLitsError.innerHTML = ""; 
        }
    }

    if (target.name === "nbPers") {
        let nbPersError = byId("nbPersError");
        let nbPrsn = parseFloat(target.value);

        if (isNaN(nbPrsn) || nbPrsn < 1 || nbPrsn > 4) {
            nbPersError.innerHTML = "Le nombre de personne doit être compris entre 1 et 4.";
        } else {
            nbPersError.innerHTML = ""; 
        }
    }
});

// FUNCTIONS
function byName(name) {
    return document.getElementsByName(name);
}

function byId(id) {
    return document.getElementById(id);
}
