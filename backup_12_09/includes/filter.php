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

            // kleur
            echo "<div class='filterhead'>Kleur</div>";
            $sql = "select * from kleur";
            $result = $database->query($sql);
            foreach($result as $optie)
            {
                // checked/unchecked
                if(empty($session->filter_kleur)) { $session->filter_kleur = array(); }
                if(in_array($optie['id'], $session->filter_kleur )) { $check=' checked'; } else { $check =''; }
                echo "<input type='checkbox'  name='kleur[]' value='{$optie['id']}' {$check}><span class='filteroptie'>".$optie['kleur']."</span><br>";
            }

            // merk
            echo "<div class='filterhead'>Merk</div>";
            $sql = "select * from merk";
            $resultmerk = $database->query($sql);
            foreach($resultmerk as $optie)
            {
                if(empty($session->filter_merk)) { $session->filter_merk = array(); }
                if(in_array($optie['id'], $session->filter_merk )) { $check=' checked'; } else { $check =''; }
                echo "<input type='checkbox'  name='merk[]' value='{$optie['id']}' {$check}><span class='filteroptie'>".$optie['merk']."</span><br>";
            }

            // merk
            echo "<div class='filterhead'>Opslagcapaciteit</div>";
            $sql = "select * from opslagcapaciteit";
            $resultopslagcapaciteit = $database->query($sql);
            foreach($resultopslagcapaciteit as $optie)
            {
                if(empty($session->filter_opslagcapaciteit)) { $session->filter_opslagcapaciteit = array(); }
                if(in_array($optie['id'], $session->filter_opslagcapaciteit )) { $check=' checked'; } else { $check =''; }
                echo "<input type='checkbox'  name='opslagcapaciteit[]' value='{$optie['id']}' ><span class='filteroptie'>".$optie['opslagcapaciteit']."</span><br>";
            }
 
            // merk
            echo "<div class='filterhead'>Resolutie</div>";
            $sql = "select * from resolutie";
            $resultresolutie = $database->query($sql);
            foreach($resultresolutie as $optie)
            {
                if(empty($session->filter_resolutie)) { $session->filter_resolutie = array(); }
                if(in_array($optie['id'], $session->filter_resolutie )) { $check=' checked'; } else { $check =''; }
                echo "<input type='checkbox'  name='resolutie[]' value='{$optie['id']}' {$check}><span class='filteroptie'>".$optie['resolutie']."</span><br>";
            }

            // merk
            echo "<div class='filterhead'>Schermdiagonaal</div>";
            $sql = "select * from schermdiagonaal";
            $resultschermdiagonaal = $database->query($sql);
            foreach($resultschermdiagonaal as $optie)
            {
                if(empty($session->filter_schermdiagonaal)) { $session->filter_schermdiagonaal = array(); }
                if(in_array($optie['id'], $session->filter_schermdiagonaal )) { $check=' checked'; } else { $check =''; }
                echo "<input type='checkbox'  name='schermdiagonaal[]' value='{$optie['id']}' {$check}><span class='filteroptie'>".$optie['schermdiagonaal']."</span><br>";
            }

            // merk
            echo "<div class='filterhead'>Werkgeheugen</div>";
            $sql = "select * from werkgeheugen";
            $resultwerkgeheugen = $database->query($sql);
            foreach($resultwerkgeheugen as $optie)
            {
                if(empty($session->filter_werkgeheugen)) { $session->filter_werkgeheugen = array(); }
                if(in_array($optie['id'], $session->filter_werkgeheugen )) { $check=' checked'; } else { $check =''; }
                echo "<input type='checkbox'  name='werkgeheugen[]' value='{$optie['id']}' {$check}><span class='filteroptie'>".$optie['werkgeheugen']."</span><br>";
            }


            
            echo "<input type='submit' name='submitfilter' value='Filter' >";
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

