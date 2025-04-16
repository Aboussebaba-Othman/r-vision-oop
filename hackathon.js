let candidatures = [];
let idIncremented = 1;

function ajouterCandidature(nom, age, projet){
    const nouvelleCandidature = {
        id: idIncremented++,
        nom: "othman",
        age: 25,
        projet: "Application",
        statut: "en attente"
    }

    candidatures.push(nouvelleCandidature);
}

function afficherToutLesCandidatures() {
    candidatures.forEach(e => {
        console.log(
            `Nom: ${e.nom}, Age: ${e.age}, Projet: ${e.projet}, Statut: ${e.statut}`
        );
    });
}

function validerCandidature(id) {
    const candidat = candidatures.find((c) => c.id === id);
    candidat.statut = "validée";
}

function rejeterCandidature(id) {
    const candidat = candidatures.find((c) => c.id === id);
    candidat.statut = "rejetée";
}

function rechercherCandidat(nom) {
    const resultats = candidatures.filter((c) =>
      c.nom.toLowerCase().includes(nom.toLowerCase())
    );
    console.log(nom);
    resultats.forEach((c) =>
      console.log(c.nom)
    );
}

function filtrerParStatut(statut) {
    const resultats = candidatures.filter((c) => c.statut === statut);
    resultats.forEach((c) =>
      console.log(`${c.nom} - Projet: "${c.projet}"`)
    );
  }



