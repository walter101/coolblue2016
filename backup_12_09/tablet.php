<?php
// report all error untill publishing
error_reporting(E_ALL);
ini_set('display_errors', 1);

// get objects and templates
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
    
    <div class='menulinks' style='border:0px;' >
        <?php
        // create, process, render form
        $filter = new filter();
        if(isset($_POST['submitfilter'])){ $filter->processMenu(); }
        $filter->renderMenu();
        ?>
    </div>


    <div class='inforechts2' >
        <?php
        // filters toepassen indien gevraagd in form
        $sqlfilter='';        
        if(!(empty($session->filter_kleur))) { 
            $kleur = join("','", $session->filter_kleur); 
            $sqlfilter .= " and kleur in ('$kleur') ";
        }
        if(!(empty($session->filter_merk))) { 
            $merk = join("','", $session->filter_merk); 
            $sqlfilter .= " and merk in ('$merk') ";
        }
        if(!(empty($session->filter_opslagcapaciteit))) { 
            $opslagcapaciteit = join("','", $session->filter_opslagcapaciteit); 
            $sqlfilter .= " and opslagcapaciteit in ('$opslagcapaciteit') ";
        }
        if(!(empty($session->filter_resolutie))) { 
            $resolutie = join("','", $session->filter_resolutie); 
            $sqlfilter .= " and resolutie in ('$resolutie') ";
        }
        if(!(empty($session->filter_schermdiagonaal))) { 
            $schermdiagonaal = join("','", $session->filter_schermdiagonaal); 
            $sqlfilter .= " and schermdiagonaal in ('$schermdiagonaal') ";
        }
        if(!(empty($session->filter_werkgeheugen))) { 
            $werkgeheugen = join("','", $session->filter_werkgeheugen); 
            $sqlfilter .= " and werkgeheugen in ('$werkgeheugen') ";
        }

        // haal met sql alles uit database
        $sql = "select * from tablet 
                inner join resolutie on tablet.resolutie = resolutie.id 
                inner join schermdiagonaal on tablet.schermdiagonaal = schermdiagonaal.id
                inner join werkgeheugen on tablet.werkgeheugen = werkgeheugen.id
                inner join afbeeldingen on tablet.id = afbeeldingen.article_id
                where tablet.id !=''  
                {$sqlfilter}
                "; 
        // create array with objects
        $tablets = tablet::find_by_sql($sql);  

        // create objectlist
        $objectList = new object_list();
        foreach($tablets as $tablet){
            $objectList->addObject($tablet);
        }

        $iterator = new objectListIterator($objectList);
        $iterator->resetCurrentObject();

        // process navigation
        if( empty($iterator->currentPage)  or empty($_GET['page'])) { $page = 1;  } else { $page=$_GET['page']; }
        if($iterator->currentPage==0) { $iterator->currentPage=1; }
        $iterator->currentPage=$page;

        // Voorkom dat laatste pagina meer atikelen laat zien dan er zijn bv 2 mogelijk en 3 proberen te laten zien
        $LastItem = (($iterator->firstItemOnPage()+$iterator->itemsPerPage)-1);
        if($LastItem>$iterator->getTotalObject()) { $LastItem = $iterator->getTotalObject(); }
        // Navigatie balk

        ?>
        <div class='NavigatieBalk' >
            <div class='NavigatieInfo'>
                <?php echo " Pagina <b>".$iterator->getCurrentPage()."/".$iterator->getTotalPages()."</b> Product <b>".$iterator->firstItemOnPage()." tot ". $LastItem ."</b> van de ".$iterator->objectList->getObjectCount()."<br>"; ?>
            </div>
            <div class='Navigatiebuttons'>
                <?php
                // previous page
                if(  $iterator->getTotalPages()>1  &&  $iterator->hasPrevPage()  ){ echo "<a href='tablet.php?page={$iterator->previousPage()}' class='preNextPage'>Vorige - </a>"; }
                // current page
                echo "<span class='currentpage'>{$iterator->getCurrentPage()}</span>"; 
                if(  $iterator->getTotalPages()>1  &&  $iterator->hasNextPage()) { echo "<a href='tablet.php?page={$iterator->nextPage()}' class='preNextPage'> - Volgende</a>"; }
                ?>
            </div>
        </div>
        <?php

        // present all product current page
        for($i=$iterator->firstItemOnPage();$i<=$LastItem;$i++){
            $tablet = $iterator->getObject($i-1);
            if($tablet) {
                showtablet($tablet); 
            }
        }            
        ?>
    </div>


</div><!-- end container -->
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