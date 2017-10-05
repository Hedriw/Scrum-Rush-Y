<?php

class Pays extends Model{
	public static $_table ="t_r_pays_pay";
	public static $_nameid ="pay_id";
	protected $_pay_id;
	protected $_pay_nom;
	
	public function __toString() {
		return get_class($this).":".$this->_pay_id;
	}
}