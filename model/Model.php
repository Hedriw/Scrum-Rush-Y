<?php


class Model {
	public function __construct($id=null) {
		$table = $this->_table;
		$nameid= $this->_nameid;
		if ($id == null) {
			$st = db()->prepare("insert into $table default values returning $nameid");
			$st->execute();
			$row = $st->fetch();
			$field = "id".$table;
			$this->$field = $row[$field];
		} else {
			$st = db()->prepare("select * from $table where $nameid=:id");
			$st->bindValue(":id", $id);
			$st->execute();
			if ($st->rowCount() != 1) {
				throw new Exception("Not in table: ".$table." id: ".$id );
			} else {
				$row = $st->fetch(PDO::FETCH_ASSOC);
				foreach($row as $field=>$value) {
					if (substr($field, 0,2) == "id") {
						$linkedField = substr($field, 2);
						$linkedClass = ucfirst($linkedField);
						if ($linkedClass != get_class($this))
							
							$this->$linkedField = new $linkedClass($value);
						else
							
							$this->$field = $value;
					} else
						$this->$field = $value;
				}
			}
		}

	}

	public static function findAll() {
		$table = $this->_table;
		$st = db()->prepare("select id$table from $table");
		$st->execute();
		$list = array();
		while($row = $st->fetch(PDO::FETCH_ASSOC)) {
			$list[] = new $class($row["id".$table]);
		}
		return $list;
	}


	public function __get($fieldName) {
		$varName = "_".$fieldName;
		if (property_exists(get_class($this), $varName))
			return $this->$varName;
		else
			throw new Exception("Unknown variable: ".$fieldName);
	}


	public function __set($fieldName, $value) {
		$varName = "_".$fieldName;
		if ($value != null) {
			if (property_exists(get_class($this), $varName)) {
				$this->$varName = $value;
				$table = $this->_table;
				$id = $this->_nameid;
				if (isset($value->$id)) {
					$st = db()->prepare("update $table set $id=:val where $id=:id");
					$id = substr($id, 1);
					$st->bindValue(":val", $value->$id);
				} else {
					$st = db()->prepare("update $table set $id=:val where $id=:id");
					$st->bindValue(":val", $value);
				}
				$id = $this->_nameid;
				$st->bindValue(":id", $this->$id);
				$st->execute();
			} else
				throw new Exception("Unknown variable: ".$fieldName);
		}
	}

	




}



