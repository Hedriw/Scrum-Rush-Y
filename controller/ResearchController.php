<?php

class ResearchController extends Controller{
	private $requests;
	public function __construct(){
		$this->requests=array("acteur"=>"Select DISTINCT t_e_video_vid.vid_id from t_e_video_vid 
													join t_j_acteurvideo_acv on (t_e_video_vid.vid_id =t_j_acteurvideo_acv.vid_id)
													join t_e_acteur_act on (t_j_acteurvideo_acv.act_id = t_e_acteur_act.act_id)
													where LOWER(t_e_acteur_act.act_nom) like",
							"realisateur"=>"Select DISTINCT t_e_video_vid.vid_id from t_e_video_vid 
												join t_e_realisateur_rea on (t_e_video_vid.rea_id=t_e_realisateur_rea.rea_id)
												where LOWER(t_e_realisateur_rea.rea_nom) like"
	);
		
	}
	
	
	public function index(){
		if (isset(parameters()["typesearch"]) && isset(parameters()["keyword"]))
		{
			if(!empty(parameters()["keyword"]))
			{
				$sql=$this->requests[parameters()["typesearch"]]." lower('".parameters()["keyword"]."%')";
				$st= db()->prepare($sql);
				$st->execute();
				$row = $st->fetch(PDO::FETCH_ASSOC);
				if(!empty($row))
				{
					foreach($row as $field=>$value)
					{
						$videos[$value]=new Video($value);
					}
					$this->render("index",$videos);
				}
			}
		}
		else if(!isset(parameters()["typesearch"]))
		{
			$error="Veuillez choisir un type de recherche";
			$this->render("index",$error);
		}
		else
		{
			$this->render("index");
		}
		
	}
	public function about(){
		$this->render("about");
	}
}