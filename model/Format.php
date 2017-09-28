<?php

class Format extends Model {

	
	public static $_table="t_r_format_for";
	public static $_nameid="for_id";
	protected $_for_id;
	protected $_for_libelle;
	
	public function __toString() {
		return get_class($this).":".$this->_for_id;
	}

}
