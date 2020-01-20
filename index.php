<?php 
	
	//class controller
	include_once("controllers/Controller.php");
	$controller = new Controller();

	//tentukan bagaimana halaman akan di-load
	if(!isset($_GET['menu']))
	{
		$controller->index();
	}
	else
	{
		switch($_GET['menu'])
		{
			case '1' : 
				$controller->index();
				break;
			case '2' :
				$controller->save();
				break;
			case '3' :
				$controller->show_data();
				break;
			default : 
				$controller->index();
				break;
		}
	}

?>