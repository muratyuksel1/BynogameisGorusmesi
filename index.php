<?php
require_once __DIR__.'/config.php';
class API{
	function Select(){
		$db = new Connect ;
		$info =array();
		$data = $db->prepare('SELECT * FROM info ORDER BY product_id');
		$data ->execute();
		while($OutputData = $data->fetch(PDO::FETCH_ASSOC)){
			$users[$OutputData['product_id']] = array(
				'product_id'=>$OutputData['product_id'] ,
				'name'=>$OutputData['name'] ,
				'stock'=>$OutputData['stock'] ,
				'date'=>$OutputData['date'] 
			);
		}
		return json_encode($info);
	}
}
$API = New API;
header('Content-Type: application/json');
echo $API->Select();
?>