<?php
// report all error untill publishing
error_reporting(E_ALL);
ini_set('display_errors', 1);

// get objects and templates
require_once "functions/loadobjects.php";
require_once "functions/loadtemplates.php";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Productpage</title>
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
    
    <div class='productpagemenulinks alignLeft' style='border:0px;' >
        <input type='button' class='productpage_keuzehulp_bar'  value='Keuzehulp' ><br>
        <div class='textblack infoline' ><b>Aanbidingen</b></div>
        <div class='textgray infoline' >Aanbieding tablets</div>
        <div class='textgray infoline' >Aanbieding cases</div>
        <div class='seperator_20'>&nbsp;</div>

        <div class='textblack infoline' ><b>Tablets</b></div>
        <div class='textgray infoline' >Android tablets</div>
        <div class='textgray infoline' >Apple tablets</div>
        <div class='textgray infoline' >Windows tablets</div>
        <div class='seperator_20'>&nbsp;</div>

        <div class='textblack infoline' ><b>Merken</b></div>
        <div class='textgray infoline' >Apple ipad</div>
        <div class='textgray infoline' >Lenovo</div>
        <div class='textgray infoline' >Samsung</div>
        <div class='seperator_20'>&nbsp;</div>
    </div>

    <div class='inforechts2' >
    <?php
    $productID = filter_input(INPUT_GET, 'id'); 
                    $sql = "select * from tablet 
                    inner join resolutie on tablet.resolutie = resolutie.id 
                    inner join schermdiagonaal on tablet.schermdiagonaal = schermdiagonaal.id
                    inner join werkgeheugen on tablet.werkgeheugen = werkgeheugen.id
                    inner join afbeeldingen on tablet.id = afbeeldingen.article_id
                    inner join afbeelding_large on tablet.id = afbeelding_large.article_id
                    where tablet.id = $productID  
                    "; 
    $tablets = tablet::find_by_sql($sql);
    $tablet = $tablets[0];
    productpage_show_tablet($tablet);    
    ?>
    </div>
</div><!-- end container -->

<div class='container'>
    <div class='glimlachcontainer'><?php showglimlach(); ?></div>
</div>
<div class='clearingrow'>&nbsp;</div>

<div class='footer'>
    <?php showFooter(); ?>
</div>

</body>
</html>