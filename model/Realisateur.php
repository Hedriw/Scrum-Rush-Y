<?php

class Realisateur extends Model {

	
	public static $_table="t_e_realisateur_rea";
	public static $_nameid="rea_id";
	protected $_rea_id;
	protected $_rea_nom;
	
	public function __toString() {
		return get_class($this).":".$this->_rea_id;
	}

}
