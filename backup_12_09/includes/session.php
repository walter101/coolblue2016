<?php

class session{

    public $filter_kleur = array();
    public $filter_merk = array();
    public $filter_opslagcapaciteit = array();
    public $filter_resolutie = array();
    public $filter_schermdiagonaal = array();
    public $filter_werkgeheugen = array();
    public $winkelwagen = array();
    
    function __construct() {
        session_start();
        // saves session data
        if(isset($_SESSION['kleur'])) { $this->filter_kleur = $_SESSION['kleur']; }
        if(isset($_SESSION['merk'])) { $this->filter_merk = $_SESSION['merk']; }
        if(isset($_SESSION['opslagcapaciteit'])) { $this->filter_opslagcapaciteit = $_SESSION['opslagcapaciteit']; }
        if(isset($_SESSION['resolutie'])) { $this->filter_resolutie = $_SESSION['resolutie']; }
        if(isset($_SESSION['schermdiagonaal'])) { $this->filter_schermdiagonaal = $_SESSION['schermdiagonaal']; }
        if(isset($_SESSION['werkgeheugen'])) { $this->filter_werkgeheugen = $_SESSION['werkgeheugen']; }
        if(isset($_SESSION['winkelwagen'])) { $this->winkelwagen = $_SESSION['winkelwagen']; }
    }
    
    
// Filter options 
    public function filter_kleur($kleur){
            $this->filter_kleur = $kleur;
            $_SESSION['kleur'] = $kleur;
    }
    public function filter_merk($merk){
            $this->filter_merk = $merk;
            $_SESSION['merk'] = $merk;
    }
    public function filter_opslagcapaciteit($opslagcapaciteit){
        $this->filter_opslagcapaciteit = $opslagcapaciteit;
            $_SESSION['opslagcapaciteit'] = $opslagcapaciteit;
    }
    public function filter_resolutie($resolutie){
            $this->filter_resolutie = $resolutie;
            $_SESSION['resolutie'] = $resolutie;
    }
    public function filter_schermdiagonaal($schermdiagonaal){
            $this->filter_schermdiagonaal = $schermdiagonaal;
            $_SESSION['schermdiagonaal'] = $schermdiagonaal;
    }
    public function filter_werkgeheugen($werkgeheugen){
            $this->filter_werkgeheugen = $werkgeheugen;
            $_SESSION['werkgeheugen'] = $werkgeheugen;
    }
// END filter options    
    
// Shoppingcart options
    public function getWinkelwagen(){
        return $this->winkelwagen;
    }
    public function setWinkelwagen($winkelwagen){
        $this->winkelwagen = $winkelwagen;
        $_SESSION['winkelwagen'] = $winkelwagen;
    }
// End shoppingcart options    
}
$session = new session();
