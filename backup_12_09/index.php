<?php
// report all error untill publishing
error_reporting(E_ALL);
ini_set('display_errors', 1);

// get objects and templates
require_once "functions/functionlist.php";
require_once "functions/loadobjects.php";
require_once "templates/show_tablet_template.php";
require_once "templates/footer.php";
require_once "templates/glimlach.php";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel='stylesheet' type='text/css' href='css/layout.css' />
</head>

<script>

var huidige='set1';
function showitems_menu(e){

// hide all	
var a= Array('set1', 'set2', 'set3', 'set4', 'set5', 'set6', 'set7', 'set8', 'set9', 'set10', 'set11', 'set12', 'set13');
a.forEach( function(x){ document.getElementById(x).style.display='none';});

	// display new one
	var huidige = e.getAttribute("name");
	document.getElementById(huidige).style.display='block';
console.log("een");
}

function hideitems_bigmenu(e){
	var a = e.getAttribute("id");
	console.log(a);
	console.log("mouseout");
	document.getElementById(a).style.display='none';
}

</script>
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


<div class='container'>
    <!-- top menubar -->
    <?php 
        include "templates/topmenu.php"; 
        include "templates/index_left_menu.php";
    ?>

    <div class='inforechts' >
        <div class='pageinfo'>
            <span class='textblack' style='font-size:18px;'>Hoi, ja deze site is niet echt hoor!</span><br>
            <span class='textblack'>
                Voor de presentatie heb ik een klein stukje van de Coolblue site nagemaakt.<br>
                Persoonlijk vind ik dit echt een hele mooie webshop en daarom leek<br> het mij leuk deze te gebruiken om te laten zien wat ik kan.<br>
                Middels deze site kan ik jullie een idee geven hoe ik programmeer,<br>
                wat mijn niveau is en waar mijn verbeter punten zitten.<br>
                Objecten managen en te presenteren de data.<br>
                PHP zal qua code afwijken van C#, maar wat techniek, loops en strategie<br>
                om een probleem te managen dichtbij PHP komen.<br>
            </span>
        </div>
        <?php
            include "templates/banner_menu.php";
        ?>
    </div>
</div><!-- end container -->
<div class='clearingrow'>&nbsp;</div>


    <!-- aanbiedingen -->
    <div class='aanbiedingrow'>
        <?php show_aanbieding_233x300_1(); ?>
        <?php show_aanbieding_233x300_2(); ?>
        <?php show_aanbieding_233x300_3(); ?>
        <?php show_aanbieding_233x300_4(); ?>
    </div>

<div class='clearingrow'>&nbsp;</div>

<div class='container'>
    <div class='glimlachcontainer'><?php showglimlach(); ?></div>
</div>
<div class='clearingrow'>&nbsp;</div>


<div class='footer'>
    <?php showFooter(); ?>
</div>

</body>
</html>