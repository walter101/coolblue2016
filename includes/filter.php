<?php

class filter{
    
    public $kleur;
    public $merk;
    public $opslagcapaciteit;
    public $resolutie;
    public $schermdiagonaal;
    public $werkgehugen;
    
    public function renderMenu(){
        global $database;
        global $session;
       
        echo "<div style='text-align:left;margin-left:10px;'>";
            echo "<form action='".$_SERVER['PHP_SELF']."' method='post'>";
            echo "<input type='submit' name='submitfilter' value='Save filter' >";

            $filters = array('kleur','merk','opslagcapaciteit','resolutie','schermdiagonaal','werkgeheugen' );
            foreach($filters as $filtername){
               echo "<div class='filterhead'>".ucfirst($filtername)."</div>"; 
                $sql = "select * from $filtername ";
                $result = $database->query($sql);                
                foreach($result as $optie){
                    $varname = 'filter_'.$filtername;
                    $arrayname = $filtername.'[]';
                    if(empty($session->$varname)) { $session->$varname = array(); }
                    if(in_array($optie['id'], $session->$varname )) { $check=' checked'; } else { $check =''; }
                    echo "<input type='checkbox'  name='$arrayname' value='{$optie['id']}' {$check}><span class='filteroptie'>".$optie[$filtername]."</span><br>";
                }
            }
            
            echo "<input type='submit' name='submitfilter' value='Save filter' >";
            echo "</form>";
        echo"</div>"; 
    }
    
    public function processMenu(){
        global $session;
        // save array's  from form in session
        $session->filter_kleur(@$_POST['kleur']); 
        $session->filter_merk(@$_POST['merk']); 
        $session->filter_opslagcapaciteit(@$_POST['opslagcapaciteit']); 
        $session->filter_resolutie(@$_POST['resolutie']); 
        $session->filter_schermdiagonaal(@$_POST['schermdiagonaal']); 
        $session->filter_werkgeheugen(@$_POST['werkgeheugen']); 

    }
}

