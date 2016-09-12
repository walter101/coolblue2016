<?php

class tablet{
    
    public static $table_name="tablet";
    public static $db_fields=array('naam','omschrijving','artikelnummer','prijs','merk','schermdiagonaal','resolutie','werkgeheugen','opslagcapaciteit','kleur','stock');
    
    public $id;
    public $naam;
    public $omschrijving;
    public $artikelnummer;
    public $prijs;
    public $merk;
    public $schermdiagonaal;
    public $resolutie;
    public $werkgeheugen;
    public $opslagcapaciteit;
    public $kleur;
    public $stock;
    public $foto;
    public $fotolarge;

    // create new tablet
    public static function make_tablet($id, $naam, $omschrijving, $artikelnummer, $prijs, $merk, $schermdiagonaal, $resolutie, $werkgeheugen, $opslagcapaciteit, $kleur, $stock, $afbeelding, $fotolarge){
        $tablet = new tablet();
        $tablet->id = $id;
        $tablet->naam = $naam;
        $tablet->omschrijving = $omschrijving;
        $tablet->artikelnummer = $artikelnummer;
        $tablet->prijs = $prijs;
        $tablet->merk = $merk;
        $tablet->schermdiagonaal = $schermdiagonaal;
        $tablet->resolutie = $resolutie;
        $tablet->werkgeheugen = $werkgeheugen;
        $tablet->opslagcapaciteit = $opslagcapaciteit;
        $tablet->kleur = $kleur;
        $tablet->stock = $stock;
        $tablet->foto = $foto;
        $tablet->fotolarge = $fotolarge;

        return $tablet;
    }
    
        // find by id
        public static function get_comments($id){
            $sql = "select * from tablet where id = {$id} order by id DESC";
            $tablet = self::find_by_sql($sql);
            return $tablet ? $tablet : false;
        }
    
        // get all tablets
	public static function find_all(){
            return static::find_by_sql("select * from ".self::$table_name." ");
	}
	
	// haal resultaat sql en zet die om in object
	public static function find_by_id($id=0){
                global $database;
		$result_array = self::find_by_sql("select * from ".self::$table_name." where id={$id}");    // find_by_sql levert een array met objecten terug
		return !empty($result_array) ? array_shift($result_array) : false;                          // omdat je slechts 1 object wilt haal je 1 object uit de array met objecten
	} 																				// door array_shift haal je het eerste object uit de array.
	
	
	// haal resultaat sql en zet die om in objecten
	public static function find_by_sql($sql){
                global $database;
		$result_set = $database->query($sql);					// Haal met het database object een sql query op
		$object_array = array();						// maak een object_array
		while( $row = $database->fetch_array($result_set)){			// Loop door alle resultaten van de sql
			$object_array[] = self::instantiate($row);			// voeg voor elke rij een object toe aan $object_array
		}
		return $object_array;							// retourneer de array met objecten
		}
	
	
	// initieer een object met argument $record
	private static function instantiate($record){
		$object = new self();
		foreach($record as $attribute=>$value){			// loop door (database)-record as cell->value
			if($object->has_attribute($attribute)){		// als dit object het attribute heeft met de cellname uit database
				$object->$attribute = $value;		// zet dan in het attribute de value uit de database
			}	
		}
		return $object;
	}
	
	private function has_attribute($attribute){
		$object_vars = get_object_vars($this);			// haal alle (non statische) object variabelen, de keys in die array zijn de variabele namen
		return array_key_exists($attribute, $object_vars);	// boolean return true als attribute voorkomt (als keyname) in $object_vars anders return false
	}
   

        public function attributes($escaped = true){
            global $database;
            foreach(self::$db_fields as $field){
                if(property_exists($this, $field)){
                    $attributes[$field] = $this->$field;
                }
            }

            if($escaped){
                foreach($attributes as $key=>$value){
                    $clean_attributes[$key] = $database->escape_value($value);
                }
                return $clean_attributes;
            }
            return $attributes;
        }
        
        public function create(){
            global $database;
            $attributes = $this->attributes();
           
            $sql  = "insert into ".self::$table_name." ( ";
            $sql .= join(", ", array_keys($attributes));
            $sql .= " ) values ( ' ";
            $sql .= join (" ', '", array_values($attributes));
            $sql .= " ' )";
            $database->query($sql);
            return true;
        }
	
        public function update(){
          global $database;
          $attributes = $this->attributes();
          foreach($attributes as $key=>$value){
              $attributes_pairs[$key] = $key." = '".$value."' ";
          }
          $sql ="update ".self::$table_name." set ";
          $sql .= join(", ", $attributes_pairs);
          $sql .=" where id=".$this->id;
          $result = $database->query($sql);                         // 1 / 0 wel of geen result
          return $database->affected_rows() == 1 ? true : false;      
        }
    
        public function save(){
            global $database;
            $properties = $this->attributes();
            
            //verwerk properties
            $sql  = "insert into ".self::$table_name." ( ";
            $sql .= join(", ", array_keys($properties));
            $sql .= " ) values ( '";
            $sql .= join("', '", array_values($properties));
            $sql .=" ') ";
            //echo $sql."<bR>";
            return $database->query($sql) ? true : false;
            
        }
    
}
?>
