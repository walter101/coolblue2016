<?php
// report all error untill publishing
error_reporting(E_ALL);
ini_set('display_errors', 1);

// get objects and templates
require_once "functions/loadobjects.php";
require_once "templates/winkelwagen_showproduct.php";
require_once "templates/footer.php";
require_once "templates/glimlach.php";
require_once "templates/show_tablet_template.php";

// process shoppingbag
    // add product to shoppingbag
    if(isset($_GET['id'])){
        $buyproductID = filter_input(INPUT_GET, 'id');
        $winkelwagen->addProduct($buyproductID);
    }
    // edit quantity product in shoppingbag
    if(isset($_POST['quantity'])){
        $quantity =  filter_input(INPUT_POST,'quantity');
        $productID =  filter_input(INPUT_POST,'product');
        $winkelwagen->editQuantity($productID, $quantity);
        $msg ="Product aantal is aangepast.<br>";
    }
    // delete product from shoppingbag
    if(isset($_POST['deleteproduct'])){
        $productID =  filter_input(INPUT_POST,'deleteproduct');
        $winkelwagen->removeProduct($productID);
        $msg ="Het product is verwijderd uit het mandje.<br>";
    }    
    
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel='stylesheet' type='text/css' href='css/layout.css' />
</head>



<body>



<div class='topbanner'>
    <div class='topbannerinner'>
    	<form action='#' method='post'>
            <input type='text' name='search' class='searchfield' />
            <input type='submit' name='submit' value='go' class='seachbutton'/>
        </form>
        <?php if(!(empty($winkelwagen->winkelwagen))){ ?>
        <div id='idnew'>
            <div id='wwplaceholder'>
                <div id='wwimage'><a href='winkelwagen.php'><img src='images/winkelwagenicon.jpg' alt='' border'0' class='iconwinkelwagen'/></a></div>
                <div id='wwcircle'><a href='winkelwagen.php'><img src='images/wwbol.png' alt=''/></a></div>
                <div id='wwaantal'><a href='winkelwagen.php'><span class='textwit'><?php echo $winkelwagen->getTotalProducts(); ?></span></a></div>
            </div>
        </div>
        <?php } else{ ?>
            <a href='winkelwagen.php'><img src='images/winkelwagenicon.jpg' alt='--' border='0' class='iconwinkelwagen'/></a>
        <?php } ?>
    </div>
</div>


<div class='container'>
    <?php
        include "templates/topmenu.php"; 
    ?>

    <div class='winkelwagenpage' >

        <div class='winkelmadjeslogun'>
            <div><span class='WWwinkelmandje'>Winkelmandje</span><span class='WWpunt'>.</span></div>
            <div><span class='WWallesopeenrijtje'>Alles op een rijtje.</span></div>
        </div>

        <div class='wwblockLeft'>
        <?php
            if(!(empty($msg))){ echo "<div class='WWactionmessage'>$msg</div>"; }
            if($winkelwagen->getTotalProducts()==0){ echo "<div class='textblack'>De winkelwagen is leeg.</div>"; } 
            winkelwagenshowproduct();
        ?>
        </div>    

        <div class='wwblockRight'>
            <form action='#' method='post' style='border:1px solid #dddddd;' >
                <div class='wwbzinfo_wit textblack'><b>Bezorgen</b></div>
                <div class='seperator_5'>&nbsp;</div>
                <div class='wwbzinfo_blue'><input type='radio'  name='item1'><span class='textorange'><b>gratis</b></span> bezorging</div>
                <div class='wwbzinfo_blue'><input type='radio'  name='item1'>Op afspraak bezorgd</div>
                <div class='wwbzinfo_wit textblack'><b>Ophalen</b></div>
                <div class='seperator_5'>&nbsp;</div>
                <div class='wwbzinfo_blue'><input type='radio'  name='item1'>Ophalen bij postNL-ophaalpunt</div>
                <div class='wwbzinfo_blue'><input type='radio'  name='item1'>Ophalen bij Coolblue winkel</div>
            </form>
        </div>
        <div style='clear:both;'>&nbsp;</div>    
    </div><!-- end winkelwagenpage -->

    <div class='glimlachcontainer'><?php showglimlach(); ?></div>
    <div class='clearingrow'>&nbsp;</div>

</div> <!-- end container -->

<div class='footer'>
    <?php showFooter(); ?>
</div>

</body>
</html>