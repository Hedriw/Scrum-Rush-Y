<?php

class ConsulteController extends Controller{
	public function __construct(){
		
	}
	
	
	public function index(){
		$video = new Video($_GET["id"]);
		$data["videos"]=$video;
		$sql="Select avi_id from t_e_avis_avi where vid_id='".$_GET["id"]."' order by avi_date";
		$st= db()->prepare($sql);
		$st->execute();
		$row = $st->fetch(PDO::FETCH_ASSOC);
		if($st->execute())
		{
			$avis=array();
			while($row=$st->fetch(PDO::FETCH_ASSOC))
			{
				$avis[]=new Avis($row["avi_id"]);
			}
			if(empty($avis))
			{
				$data["error"]="Aucun avis trouvé";
			}
			else
			{
				$data["avis"]=$avis;
			}	
		}
		else
		{
			$data["error"]="Aucun avis trouvé";
		}
		// print_r($data);
		$this->render("index",$data);
	}
	public function about(){
		$this->render("about");
	}
}