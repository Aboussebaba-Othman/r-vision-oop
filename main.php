<?php
interface ReservableInterface {
    public function reserver(Client $client, DateTime $dateDebut, int $nbJours): Reservation;
}
abstract class Vehicle{
    protected $id;
    protected $immatriculation;
    protected $marque;
    protected $modele;
    protected $prixJour;
    protected $disponible;
    
    public function __construct(int $id, string $immatriculation, string $marque, string $modele, float $prixJour) {
        $this->id = $id;
        $this->immatriculation = $immatriculation;
        $this->marque = $marque;
        $this->modele = $modele;
        $this->prixJour = $prixJour;
        $this->disponible = true;
    }
    
    public function afficherdetails(){
         echo "marque: $this->marque, modele: $this->modele, prixJour: $this->prixJour,immatriculation: $this->immatriculation,disponible: $this->disponible";
    }
    public function calculerPrix(int $jours): float {
        return $this->prixJour * $jours;
    }
    public function estDisponible(): bool{
        
    }
    abstract public function getType():string;
}

class Voiture extends Vehicle implements ReservableInterface{
    private $nbPortes;
    private $transmission;
    
    public function __construct(int $id, string $immatriculation, string $marque, string $modele, float $prixJour, int $nbPortes, string $transmission) {
        parent::__construct($id, $immatriculation, $marque, $modele, $prixJour);
        $this->nbPortes = $nbPortes;
        $this->transmission = $transmission;
    }
    public function getType(): string{
        return "voiture";
    }
    
    public function reserver(Client $client, DateTime $dateDebut, int $nbJours): Reservation{
        return new Reservation($client, $dateDebut, $nbJours);
    }
    
    public function afficherDetails(){
        echo "marque: $this->marque, modele: $this->modele, prixJour: $this->prixJour,immatriculation: $this->immatriculation,disponible: $this->disponible, nbPortes: $this->nbPortes , transmission: $this->transmission";
    }
}

class Moto extends Vehicle implements ReservableInterface{
    private $cylindree;
    
    public function __construct(int $id, string $immatriculation, string $marque, string $modele, float $prixJour, int $cylindree) {
        parent::__construct($id, $immatriculation, $marque, $modele, $prixJour);
        $this->cylindree = $cylindree;
    }
    public function getType(): string{
        return "Moto";
    }
    
    public function reserver(Client $client, DateTime $dateDebut, int $nbJours): Reservation{
        return new Reservation($client, $dateDebut, $nbJours);
    }
    
    public function afficherDetails(){
        echo "marque: $this->marque, modele: $this->modele, prixJour: $this->prixJour,immatriculation: $this->immatriculation,disponible: $this->disponible, cylindree: $this->cylindree";
    }
}

class Camion extends Vehicle implements ReservableInterface{
    private $capaciteTonnage;
    
    public function __construct(int $id, string $immatriculation, string $marque, string $modele, float $prixJour, int $capaciteTonnage) {
        parent::__construct($id, $immatriculation, $marque, $modele, $prixJour);
        $this->capaciteTonnage = $capaciteTonnage;
    }
    public function getType(): string{
        return "Camion";
    }
    
    public function reserver(Client $client, DateTime $dateDebut, int $nbJours): Reservation{
        return new Reservation($client, $dateDebut, $nbJours);
    }
    
    public function afficherDetails(){
        echo "marque: $this->marque, modele: $this->modele, prixJour: $this->prixJour,immatriculation: $this->immatriculation,disponible: $this->disponible, capaciteTonnage: $this->capaciteTonnage";
    }
}

abstract class Personne{
    protected $nom;
    protected $prenom;
    protected $email;
    
    public function __construct(string $nom, string $prenom, string $email){
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
    }
    
    abstract public function afficherProfil();
}

class client extends Personne{
    private $numeroClient;
    private $reservations = [];
    
    public function __construct(int $numeroClient, string $nom, string $prenom, string $email){
        parent::__construct($nom, $prenom, $email);
        $this->numeroClient = $numeroClient;
    }
    
    public function afficherProfil(){
        echo "Prenom: $this->prenom, Nom: $this->nom, Email: $this->email";
    }

    public function ajouterReservation(Reservation $r){
        $this->reservations[] = $r;
    }

    public function getHistorique(){
        return $this->reservations;
    }
}

class agence{
    private $nom;
    private $ville;
    private $vehicules = [];
    private $clients = [];
    
    public function __construct(string $nom, string $ville,){
        $this->nom = $nom;
        $this->ville = $ville;
    }
    
    
    public function ajouterVehicle(Vehicule $v){
        $this->vehicules = $v;
    }
    
    public function rechercherVehiculeDisponible(string $type){
        
    }
    
    public function enregistrerClient(Client $c){
        $this->clients = $c;
    }
    
    public function faireReservation(Client $client, Vehicle $v, DateTime $dateDebut, int $nbJours): Reservation{
            return new Reservation($client, $dateDebut, $nbJours);

    }
}

class Reservation {

    private Vehicule $vehicule;
    private Client $client;
    private DateTime $dateDebut;
    private int $nbJours;
    private string $statut;

    public function __construct(Vehicule $v, Client $c, DateTime $d, int $j) {
        $this->vehicule = $v;
        $this->client = $c;
        $this->dateDebut = $d;
        $this->nbJours = $j;
    }

}


?>