<?php

class winkelwagen{
    
    public $winkelwagen = array();
    
    // start object
    public function __construct(){
        global $session;
        // aanpassen alleen als product nog niet in array voorkomt toevoegen ander fout return
        $this->winkelwagen = $session->getWinkelwagen();
    }
    // voeg een product toe in de winkelwagen
    public function addProduct($productID){
        global $session;
        $this->winkelwagen[$productID]=1;
        $session->setWinkelwagen($this->winkelwagen);
        }
    // verwijder product uit winkelwagen
    public function removeProduct($productID){
        global $session;
        unset($this->winkelwagen[$productID]);
        $session->setWinkelwagen($this->winkelwagen);
    }
    // edit quantity voor een product in de winkelwagen
    public function editQuantity($productID, $quantity){
        global $session;
        $this->winkelwagen[$productID]=$quantity;
        $session->setWinkelwagen($this->winkelwagen);
    }
    // retourneerd totaal aantal producten in de winkelwagen
    public function getTotalProducts(){
        $count = 0;
        foreach($this->winkelwagen as $nr => $aantal){
            $count +=$aantal;
        }
        return $count;
    }
    
}
// start object on load
$winkelwagen = new winkelwagen();