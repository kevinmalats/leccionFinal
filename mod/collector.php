<?php

ini_set('display_errors', 1);
require_once 'database.php';
class Collector{

	protected $con;

	public function __construct(){

		$this->con = Database::connect();
	}


	public function create($table,$object,$class){

		try
		{
			$params = (array) $object;
			//...
			$queryInsert = 'INSERT INTO '.$table.'('.str_replace($class, '',implode(', ',array_keys($params))).') VALUES ( :' . implode(', :', array_keys($params)) . ')';
			echo $queryInsert;

			$stmt = $this->con->prepare($queryInsert);
			foreach($params as $k=>$v){
				$vv = "\"".$v."\"";
				echo $k.",".$vv;
				$stmt->bindParam("\":".$k."\"",$vv);
			}
			$res = $stmt->execute();
			if($res){
				return true;
			}else{
				return false;
			}
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
			return false;
		}
	}

	public function read($table='demo',$class='stdClass'){

		try
		{
			$queryRead= 'SELECT * FROM '. $table;
			$stmt = $this->con->prepare($queryRead);
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_CLASS, $class);
			return $result;
		}
		catch(PDOException $e)
		{
		 echo $e->getMessage();
		 return false;
		}
	}

	public function update($table,$newObject){

		$queryUpdate= 'UPDATE'. $table .' SET '. $colum. ' = '.implode(",","$parametros").' WHERE '. $colum2.' = '.implode(",","$parametros2");
	}

	public function delete($table, $object){
		$queryDelete= 'DELETE FROM'. $table .' WHERE '. $colum.' = '.$upCamp;
	}

	public function execQuery($query){
		try
		{
			$stmt = $this->con->prepare($query);
			$stmt->execute();
			return true;
		}
		catch(PDOException $e)
		{
		 echo $e->getMessage();
		 return false;
		}
	}

}
?>
