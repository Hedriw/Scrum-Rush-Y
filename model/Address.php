<?php

class Address extends Model{
	public static $_table ="t_e_adresse_adr";
	public static $_nameid ="adr_id";
	protected $_adr_id;
	protected $_ach_id;
	protected $_adr_nom;
	protected $_adr_type;
	protected $_adr_rue;
	protected $_adr_complementrue;
	protected $_adr_cp;
	protected $_adr_ville;
	protected $_pay_id;
	protected $_adr_latitude;
	protected $_adr_longitude;
}