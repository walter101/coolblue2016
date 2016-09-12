<?php

function productpage_show_tablet($tablet){
?>
<div class='productblock'>
    <div class='productblockLeft'>

        <div class='product_title'><?php echo $tablet->naam; ?></div>
        <div><img src='images/sterren.jpg' border='0' alt='tv' /></div>
        <div><img src='images/<?php echo $tablet->fotolarge; ?>' border='0' alt='tv' /></div>
    </div>
    
    <div class='productblockRight'>
        <?php
            echo "<a href='winkelwagen.php?id={$tablet->id}' ><button class='productpage_buy_bar'  ><div class='wwbuttontext'>In winkelmandje</div></button></a>";
        ?>
        
        <div class='seperator'>&nbsp;</div>
        <?php 
            echo "<a href='winkelwagen.php?id={$tablet->id}' ><button class='productpage_combi_bar'  ><div class='wwbuttontext'>Combineer met mobiel internet</div></button></a>"; 
        ?>
        <!-- info right-->
        <div class='seperatorline_gray'>&nbsp;</div>
        <div class='seperator_5'>&nbsp;</div>
        <div class='seperator_5'>&nbsp;</div>
        
        <div class='textblack infoline' >
            <img src='images/blue_check.jpg' alt='' style='vertical-align:top;'/>
            Voor 23:59 uur besteld, morgen <span class='textorange'>gratis</span> bezorgd
        </div>
        <div class='seperator_5'>&nbsp;</div>

        <div class='textblack infoline' >
            <img src='images/blue_check.jpg' alt='' style='vertical-align:top;'/>
            Maandag <span class='textorange'>gratis</span> ophalen bij 2600+ ophaalpunten
        </div>
        <div class='seperator_5'>&nbsp;</div>
        <div class='textblack infoline' >
            <img src='images/blue_check.jpg' alt='' style='vertical-align:top;'/>
            <span class='textorange'>gratis</span> binnen 14 dagen retourneren
        </div>
        <div class='seperator_5'>&nbsp;</div>
        <div class='textblack infoline' >
            <img src='images/blue_check.jpg' alt='' style='vertical-align:top;'/>
            2 jaar garantie op je tablet
        </div>
        <div class='seperator_5'>&nbsp;</div>
        <div class='textblack infoline' >
            <img src='images/blue_check.jpg' alt='' style='vertical-align:top;'/>
            Onze klantenservice is tot 23.59 uur geopend
        </div>
        <div class='seperator_5'>&nbsp;</div>
        <div class='textblack infoline' >
            <img src='images/blue_check.jpg' alt='' style='vertical-align:top;'/>
            Klanten geven Coolblue een 9,2.10
        </div>
        <div class='seperator_5'>&nbsp;</div>
        <div class='textblack infoline' >
            <img src='images/blue_check.jpg' alt='' style='vertical-align:top;'/>
            Beste webwinkel van 2015
        </div>
        <div class='seperatorline_gray'>&nbsp;</div>
        
    </div>
</div>        
<?php
}

