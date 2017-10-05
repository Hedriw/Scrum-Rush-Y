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
												where LOWER(t_e_realisateur_rea.rea_nom) like",
							"realisateurvide"=>"Select DISTINCT t_e_video_vid.vid_id from t_e_video_vid 
												join t_e_realisateur_rea on (t_e_video_vid.rea_id=t_e_realisateur_rea.rea_id) 
												",
							"acteurvide"=>"Select DISTINCT t_e_video_vid.vid_id from t_e_video_vid
											join t_j_acteurvideo_acv on (t_e_video_vid.vid_id =t_j_acteurvideo_acv.vid_id)
											join t_e_acteur_act on (t_j_acteurvideo_acv.act_id = t_e_acteur_act.act_id)
											"
	);
		
	}
	
	
	public function index(){
		if (isset(parameters()["typesearch"]) && isset(parameters()["keyword"]))
		{
			print_r(parameters());
			$sql="";
			if(!empty(parameters()["keyword"])&& parameters()["keyword"]!="")
			{
				$sql=$this->requests[parameters()["typesearch"]]." lower('%".parameters()["keyword"]."%')";
			}
			else
			{
				$field =parameters()["typesearch"]."vide";
				$sql=$this->requests[$field];
			}
			$st= db()->prepare($sql);
			$st->execute();
			$row = $st->fetch(PDO::FETCH_ASSOC);
			if($st->execute())
			{
				$videos=array();
				while($row=$st->fetch(PDO::FETCH_ASSOC))
				{
					$videos[]=new Video($row["vid_id"]);
				}
				if(empty($videos))
				{
					$error=array("error"=>"Aucune vidéo à été trouvé");
					$this->render("index",$error);
				}
				else
				{
					$this->render("index",$videos);
				}	
			}
			else
			{
				$error=array("error"=>"Aucune vidéo à été trouvé");
				$this->render("index",$error);
			}
		}
		else if(empty(parameters()["typesearch"])&&!empty(parameters()["keyword"]))
		{
			$error=array("error"=>"Veuillez choisir un type de recherche");
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