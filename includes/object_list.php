<?php

class object_list{
    
    public $objectCount;
    public $objectList = array();
    
    public function getObjectCount(){
        return $this->objectCount;
    }

    public function addObject($object){
        $this->objectList[] = $object;
        $this->objectCount++;
    }
    
    public function getObject($number){
        return $this->objectList[$number];
    }
}



class objectListIterator{
    
    public $objectList;
    public $currentObject=0;
    public $itemsPerPage = 3;
    public $currentPage=1;
    
    public function __construct($objectList){
        $this->objectList = $objectList;
    }
    
    public function getCurrectObject(){
        return $this->objectList->getObject($this->currentObject);
    }
    
    public function hasNextObject(){
        if( ($this->objectList->getObjectCount()) >= $this->currentObject){
            return true;
        } else {
            return false;
        }
    }
    public function getNextObject(){
        if($this->hasNextObject()){
            $object = $this->getCurrectObject();
            $this->currentObject++;
        }
        return $object;
    }
    public function getObject($nr){
        return $this->objectList->getObject($nr);
    }
    public function resetCurrentObject(){
        $this->currentObject=0;
    }
    public function getCurrectObjectNR(){
        return $this->currentObject;
    }
    public function getTotalObject(){
        return $this->objectList->getObjectCount();
    }
    
    
    // pagination
    public function getCurrentPage(){
        return $this->currentPage;
    }
    public function hasNextPage(){
        if(  ($this->currentPage*$this->itemsPerPage)  <  $this->objectList->getObjectCount()  ){ return true; } else { return false; }
    }
    public function hasPrevPage(){
        if($this->currentPage>1){ return true;} else { return false; }  
    }
    public function getTotalPages(){
        return ceil(($this->objectList->getObjectCount())/$this->itemsPerPage);
    }
    public function previousPage(){
        $page = $this->getCurrentPage()-1;
        return $page;
    }
    public function nextPage(){
        $page = $this->getCurrentPage()+1;
        return $page<=$this->getTotalPages() ? $page : $this->getTotalPages();
    }
    public function firstItemOnPage(){
        return (($this->currentPage*$this->itemsPerPage)-$this->itemsPerPage)+1;
    }
    
}
