<?php

class Model {
	private static $_linkedclass = array(
	"rea"=>"Realisateur",
	"for"=>"Format",
	"mag"=>"Magasin"
	
	
	);
	public function __construct($id=null) {
		$class = get_called_class();
		$table = $class::$_table;
		$nameid= $class::$_nameid;
		if ($id == null) {
			$st = db()->prepare("insert into $table default values returning $nameid");
			$st->execute();
			$row = $st->fetch();
			$this->$nameid = $row[$nameid];
		} else {
			$st = db()->prepare("select * from $table where $nameid=:id");
			$st->bindValue(":id", $id);
			$st->execute();
			// echo "select * from $table where $nameid=$id";
			// echo "</br>";
			// echo $st->rowCount();
			// echo "</br>";
			if ($st->rowCount() != 1) {
				throw new Exception("Not in table: ".$table." id: ".$id );
			} else {
				$row = $st->fetch(PDO::FETCH_ASSOC);
				foreach($row as $field=>$value) {
					if (substr($field,strlen($field)-2 ,strlen($field)) == "id"&& $field !=$nameid) {
						$linkedField = substr($field,0,3);
						// echo $linkedField."</br>";
						$linkedClass = Model::$_linkedclass[$linkedField] ;
						if ($linkedClass != get_class($this))
							
							$this->$field = new $linkedClass($value);
						else
							
							$this->$field = $value;
					} else
						$this->$field = $value;
				}
			}
		}

	}

	public static function findAll() {
		$class = get_called_class();
		$table = $class::$_table;
		$idname= $class::$_nameid;
		$st = db()->prepare("select $idname from $table");
		$st->execute();
		$list = array();
		while($row = $st->fetch(PDO::FETCH_ASSOC)) {
			$list[] = new $class($row[$class::$_nameid]);
		}
		return $list;
	}


	public function __get($fieldName) {
		$varName = "_".$fieldName;
		if (property_exists(get_class($this), $varName))
		{
			return $this->$varName;
		}
		else
			throw new Exception("Unknown variable: ".$fieldName);
	}


	public function __set($fieldName, $value) {
		$varName = "_".$fieldName;
		if ($value != null) {
			if (property_exists(get_class($this), $varName)) {
				$class = get_called_class();
				$this->$varName = $value;
				$table = $class::$_table;
				$id = $class::$_nameid;
				if (isset($value->$id)) {
					$st = db()->prepare("update $table set $id=:val where $id=:id");
					$id = substr($id, 1);
					$st->bindValue(":val", $value->$id);
				} else {
					$st = db()->prepare("update $table set $fieldName=:val where $id=:id");
					$st->bindValue(":val", $value);
				}
				$id = $class::$_nameid;
				$st->bindValue(":id", $this->$id);
				$st->execute();
			} else
				throw new Exception("Unknown variable: ".$fieldName);
		}
	}

	




}



