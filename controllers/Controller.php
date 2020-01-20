<?php
include_once("models/Model.php");

class Controller {
	public $model;
	
	public function __construct()  
    {  
        $this->model = new Model();

    } 
	
	public function index()
	{
		require_once('views/index.php');
	}

	function save()
	{ 
		$param = array(
			"account_number" => $_POST['account_number'],
			"bank_code" => $_POST['bank_code'],
			"amount" => $_POST['amount'],
			"remark" => $_POST['remark'],
		);

		$this->model->saveData($param);
		$Data = $this->model->getData();
		require_once('views/List.php');
	}

	function show_data()
	{
		if(!isset($_GET['id']))
		{
			$Data = $this->model->getData();
			require_once('views/List.php');
		}
		else
		{
			$Data = $this->model->getDataDetail($_GET['id']);
			require_once('views/Detail.php');
		}
	}

}

?>