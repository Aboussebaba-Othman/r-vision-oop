const produit = [
    {'nom': 'produit1', 'prix': 10},
    {'nom': 'produit2', 'prix': 20}, 
    {'nom': 'produit3', 'prix': 15},
]

function totalPanier(){
    let total = 0;
    for(let i = 0; i<produit.length; i++){
        total += produit[i].prix;
    }
    return total;
}


const etudiant = [
    {'nom': 'etudiant1', 'note': [20, 15, 18]},
    {'nom': 'etudiant2', 'note': [10, 12, 14]}, 
    {'nom': 'etudiant3', 'note': [8, 9, 7]},
]

function moyenneEtudiant(){
    let total = 0;
    for(let i = 0; i<etudiant.length; i++){
        let somme = 0;
        for(let i = 0;i<etudiant[i].note.length;i++){
            somme += etudiant[i].note[i];
        }
        total += somme / etudiant[i].note.length;
    }
}
