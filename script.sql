-- qusetion 1
SELECT utilisateurs.nom FROM utilisateurs
JOIN profils  ON utilisateurs.id = profils.utilisateur_id
JOIN profil_langue ON profils.id = profil_langue.profil_id
JOIN langues  ON profil_langue.langue_id = langues.id
WHERE utilisateurs.role = 'freelance' AND langues.nom = 'Anglais' AND profil_langue.niveau = 'avancé';

-- question 2
SELECT utilisateurs.nom FROM utilisateurs 
JOIN profils  ON utilisateurs.id = profils.utilisateur_id
JOIN profil_competence ON profils.id = profil_competence.profil_id
GROUP BY utilisateurs.id
HAVING COUNT(profil_competence.competence_id) > 3;

-- question 3
SELECT utilisateurs.nom, profils.tarif_horaire, adresses.ville from utilisateurs 
JOIN profils ON utilisateurs.id = profils.utilisateur_id
JOIN adresses on utilisateurs.id = adresses.utilisateur_id
where profils.disponible = 1;

-- question 4
SELECT utilisateurs.nom FROM utilisateurs
WHERE utilisateurs.id NOT IN (SELECT profils.utilisateur_id FROM profils);

-- question 5
SELECT nom FROM utilisateurs
WHERE utilisateurs.role = 'client' AND utilisateurs.id NOT IN (SELECT client_id FROM projets);

-- Utilisateurs & Profils

-- question 6:
SELECT projets.titre, projets.budget, COUNT(offres.id) AS nbr_offres FROM projets
JOIN offres ON projets.id = offres.projet_id
where projets.statut = 'ouvert';

-- question 7:
SELECT * FROM offres 
JOIN utilisateurs  ON offres.freelance_id = utilisateurs.id
JOIN profils ON utilisateurs.id = profils.utilisateur_id
WHERE profils.tarif_horaire < 100;

-- question 8:

SELECT projets.titre FROM projets
JOIN offres ON projets.id = offres.projet_id 
where(select COUNT(offres.id) FROM offres)>3;

-- question 10:
SELECT projets.titre, missions.date_debut, missions.date_fin FROM projets 
JOIN offres  ON projets.id = offres.projet_id
JOIN missions  ON offres.id = missions.offre_id
WHERE projets.statut = 'terminé';

