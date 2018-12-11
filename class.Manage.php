<?php
/**
 * 
 */
include_once('database.php');
class Manaage
{
	public $link;
	function __construct()
	{
		# code...
		$db_connection=new dbconection();
		$this->link =$db_connection->connect();
		return $this->link;
	}
	function registerUsers($username,$password,$ip_address,$time,$date){
		$query=$this->link->prepare("INSERT INTO users (username,password,ip_address,utime,udate) VALUES (?,?,?,?,?)");
		$values=array($username,$password,$ip_address,$time,$date);
		$query->execute($values);
		$counts=$query->rowCount();
		return $counts;
	}
}
$users=new Manaage();
echo $users->registerUsers('afg','bdfg','123.4.6.7','12:09','12-12-2018');
?>