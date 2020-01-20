<?php
class model {
 
 private $conn;

 // constructor
 function __construct() {
     require_once 'config/Database.php';
     // connect to database
     $db = new Database();
     $this->conn = $db->connect();
 }

 // destructor
 function __destruct() {
      
 }

 //function API
 public static function callAPI($method, $url, $data){
    $curl = curl_init();
    $APIKEY = "HyzioY7LP6ZoO7nTYKbG8O4ISkyWnX1JvAEVAhtWKZumooCzqp41";
    $header = array(
         "Content-Type: application/x-www-form-urlencoded",
    );
    switch ($method){
       case "POST":
          curl_setopt($curl, CURLOPT_POST, 1);
          if ($data)
             curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
          break;
       case "PUT":
          curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
          if ($data)
             curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
          break;
       default:
          if ($data)
             $url = sprintf("%s?%s", $url, http_build_query($data));
    }
    // OPTIONS:
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
    curl_setopt($curl, CURLOPT_USERPWD, $APIKEY.":");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    // EXECUTE:
    $result = curl_exec($curl);
    if(!$result){die("Connection Failure");}
    curl_close($curl);
    return $result;
 }

 //function save data
 public function saveData($data_array) {
    $url = 'https://nextar.flip.id/disburse';
    $make_call = self::callAPI('POST', $url, $data_array);
    $response = json_decode($make_call, true);
    $res = json_encode($response, true);
    $req = json_encode($data_array, true);
    
    if (isset($response['status']) === true) {
        $id_disbursment 	= $response['id'];
        $status_disbursment = $response['status'];
        $receipt 		= $response['receipt'];
        $time_served 	= $response['time_served'];
        $fee 	= $response['fee'];
        $datetime = date('Y-m-d H:i:s'); 
    }else{
        $id_disburs 	= ''; 
		$status_disburs = '';
		$receipt 		= '';
        $time_served 	= ''; 
        $datetime = date('Y-m-d H:i:s'); 
    }
    //insert data
    $stmt = $this->conn->prepare("INSERT INTO disbursment(url_api,id_disbursment,time_served,status_disbursment,receipt,request,response,created_at,updated_at,fee) VALUES(?, ?, ?, ?, ? ,? ,? ,? ,? ,?)");
    $stmt->bind_param("sssssssssi",$url,$id_disbursment,$time_served,$status_disbursment,$receipt,$req,$res,$datetime,$datetime,$fee);
    $result = $stmt->execute();
    $stmt->close();
    if ($result) {
        echo '<script type="text/javascript"> alert("Sukses Dikirim,silahkan ditunggu");</script>';
    }else{
        echo '<script type="text/javascript"> alert("Gagal Dikirim");</script>';
    }

 }

 //Get Data Disbursment
 public function getData() {

     $stmt = $this->conn->prepare("SELECT * FROM disbursment");

     if ($stmt->execute()) {
        $Data = $stmt->get_result();
        $stmt->close();

        return $Data;
     } else {
        return NULL;
     }

 }

 //Get Data Detail Disbursment
 public function getDataDetail($idtrx)
 {
    
    $url = 'https://nextar.flip.id/disburse/'.$idtrx;
    $make_call = self::callAPI('GET', $url,'');
    $response = json_decode($make_call, true);
    $res = json_encode($response, true);
    
    if (isset($response['status']) === true) {
        $status_disbursment = $response['status'];
        $receipt 		= $response['receipt'];
        $time_served 	= $response['time_served'];
        $updated_at = date('Y-m-d H:i:s'); 
    }
    else {
        $updated_at = date('Y-m-d H:i:s'); 
    }
    //update data
    $stmt = $this->conn->prepare("UPDATE disbursment  SET status_disbursment = ?, receipt = ?, time_served = ?, response = ?, updated_at = ? WHERE id_disbursment = ?");
    $stmt->bind_param("ssssss",$status_disbursment,$receipt,$time_served,$res,$updated_at,$idtrx);
    $result = $stmt->execute();
    $stmt->close();

    $stmt = $this->conn->prepare("SELECT * FROM disbursment where id_disbursment = ?");
    $stmt->bind_param("s",$idtrx);
     if ($stmt->execute()) {
        $Data = $stmt->get_result()->fetch_array();
        $stmt->close();

        return $Data;
     } else {
        return NULL;
     }
 }


}

?>