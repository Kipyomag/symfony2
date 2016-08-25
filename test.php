<?php
/**************************************************************
*                       CLASS PARENT
* ************************************************************/
abstract class voiture
{
    // Attributs
    public $couleur;
    public $vitesse;
    public $carburant;

    /**************************************************************
    *                       METHODES
    * ************************************************************/
     public function __construct()
    {
        // $this-> reflet de notre objet
        $this->vitesse = 0;
        $this->couleur = 'noir';
        $this->carburant = 'essence';

    }

    // méthode accelerer avec $vitesse en param
    public function accelerer($vitesse)
    {
        $this->vitesse = $vitesse;
    }

    public function freiner()
    {

    }

    public function repeindre($couleur)
    {
        $this->couleur  = $couleur;
    }

    public function freinageUrgence()
    {
        throw new \Exception('Freinage !!!!');

    }

    public function __destruct()
    {
        // $this-> reflet de notre objet
        $this->vitesse = 0;

        var_dump($this);
    }
}

/**************************************************************
*                       CLASS ENFANT
* ************************************************************/
class Megane2 extends Voiture
{
    public function __construct()
    {
        // parent:: on charge les attribut du parent Voiture
        parent::__construct();
        $this->carburant = 'diesel';

        var_dump($this);
    }

}

// on instancie (on crée) un nouvel Objet
//$voiture = new Voiture();

$voiture = new Megane2();

$voiture->accelerer('50');
var_dump($voiture);

$voiture->repeindre('bleu');
var_dump($voiture);

$voiture->freinageUrgence();

$voiture->accelerer('10');
var_dump($voiture);
