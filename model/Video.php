<?php

class Video extends Model {

	
	protected $_table="t_e_video_vid";
	protected $_nameid="vid_id";
	protected $_vid_id;
	protected $_for_id;
	protected $_rea_id;
	protected $_vid_duree;
	protected $_vid_titre;
	protected $_vid_synopsis;
	protected $_vid_dateparution;
	protected $_vid_publiclegal;
	protected $_vid_urlphoto;
	protected $_vid_prixttc;
	protected $vid_codebarre;
	protected $_vid_stock;
	
	public function __toString() {
		return get_class($this).":".$this->_vid_id;
	}

}
