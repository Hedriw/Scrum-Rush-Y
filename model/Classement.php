<?php

class Classement extends Model{
	public static $_table ="t_r_classement_cla";
	public static $_nameid ="cla_id";
	protected $_cla_id;
	protected $_cla_nom;
	
	public function __toString() {
		return get_class($this).":".$this->_cla_id;
	}
}