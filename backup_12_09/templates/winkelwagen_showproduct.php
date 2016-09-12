<?php

function winkelwagenshowproduct(){
    global $database;
    global $winkelwagen;
    
    $keys = array();
    foreach($winkelwagen->winkelwagen as $key => $value ){ $keys[] = $key; }
    $productIDs = join( "','", $keys);
    //echo $productIDs."<br>";
    $sql = "select * from tablet 
        inner join resolutie on tablet.resolutie = resolutie.id 
        inner join schermdiagonaal on tablet.schermdiagonaal = schermdiagonaal.id
        inner join werkgeheugen on tablet.werkgeheugen = werkgeheugen.id
        inner join afbeeldingen on tablet.id = afbeeldingen.article_id
        where tablet.id in ('$productIDs')  
        "; 
    $tablets = tablet::find_by_sql($sql);

    $totalPrice = 0;

    foreach($tablets as $tablet){
        echo "<div class='wwproduct_1'><a href='productpage.php?id={$tablet->id}'><img src='images/{$tablet->foto}' alt='' style='width:75%;' /></a></div>";
        echo "<div class='wwproduct_2 wwproductname'><a href='productpage.php?id={$tablet->id}'><span class='wwproductname'>{$tablet->naam}</span></a></div>";
        echo "<div class='wwproduct_3'>";
            echo "<form action='{$_SERVER['PHP_SELF']}' method='post' style='float:left;' >";
                echo "<input type='text' name='quantity' value='{$winkelwagen->winkelwagen[$tablet->id]}' class='quanityinput' >";
                echo "<input type='hidden' name='product' value='{$tablet->id}' >  ";
                echo "<input type='submit' name='submit' value='update' class='buttonquantity'>";
            echo "</form>";
            echo "<form action='{$_SERVER['PHP_SELF']}' method='post' style='float:left;' >";
                echo "<input type='hidden' name='deleteproduct' value='{$tablet->id}' >  ";
                echo "<input type='submit' name='submit' value='X' class='buttondelete'>";
            echo "</form>";
        echo "</div>";
        echo "<div class='wwproduct_4 textblack'><b>&euro; {$tablet->prijs}</b></div>";
        echo "<div class='wwseperatorline_gray'>&nbsp;</div>";
        echo "<div class='seperator_5'>&nbsp;</div>";
        $totalPrice += $winkelwagen->winkelwagen[$tablet->id] * $tablet->prijs;
    }
    if($winkelwagen->getTotalProducts()>0){    
        echo "<div class='wwr2L'><span class='textblack'><b>Verzendkosten</b></span></div>";
        echo "<div class='wwr2R'><span class='textblack'><b> &euro; 9,99</b></span></div>";

        echo "<div class='WWseperatorline2'>&nbsp;</div>";
        echo "<div class='wwr2L'><span class='textblack'><b>Totaal prijs</b></span><br><span class='textblack' >Incl btw</span></div>";
        echo "<div class='wwr2R'><span class='textblack'><b>&euro; {$totalPrice}</b></span></div>";
    }
}

