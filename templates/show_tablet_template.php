<?php

function showtablet($tablet){
   
?>    
    <div class='aanbiedingblok'>
        <?php echo "<a href='productpage.php?id={$tablet->id}'><img src='images/{$tablet->foto}'  border='0' alt='{$tablet->naam}' class='productfoto''/></a><br />"; ?>
        <div class='productname'><?php echo $tablet->naam; ?></div>
        <img src='images/sterren.jpg' border='0' alt='tv' /><br />
        <!-- voorraad ja / nee -->
            <?php if($tablet->stock==0){
            ?><div>
                <span class='product_uitverkocht'>Tijdelijk uitverkocht</span>
            </div>
            <?php } else { ?>
            <div >
                <span class='morgen_in_huis'><img src='images/green_check.jpg' border='0' alt='' /> Morgen in huis</span>
                <span><a href='winkelwagen.php?id=<?php echo $tablet->id; ?>'> <img src='images/winkelwagenbutton.jpg' alt='' class='ww-icon' /></a></span>
            </div>
            <?php } ?>

        <!-- eigenschappen -->
        <?php    
            echo "<div class='eigenschappen'><b>&bull;</b> "; echo $tablet->schermdiagonaal;  echo "</div>";
            echo "<div class='eigenschappen'><b>&bull;</b> "; echo $tablet->resolutie; echo "</div>";
            echo "<div class='eigenschappen'><b>&bull;</b> "; echo $tablet->werkgeheugen; echo "</div>";
            echo "<div class='eigenschappen'><a href='productpage.php?id={$tablet->id}' class='viewallproducts'><b>></b>Bekijk product</a></div>";
        ?>
    </div>
<?php
    
}

