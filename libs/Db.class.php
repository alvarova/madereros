<?php

class Connect
{
	
	private $user;
	private $pass;
	private $host;
	private $db;
	private $dsn;
	private $pdo;

	public function __construct($userName, $userPassword, $host, $db)
	{
		$opt=array(
			PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC
		);
		$this->user = $userName;
		$this->pass = $userPassword;
		$this->host = $host;
		$this->db = $db;
		$this->pdo = new PDO($this->settings(), $userName, $userPassword,$opt);
	}

	public function getUserName()
	{
		return $this->user;
	}

	public function getPass()
	{
		return $this->pass;
	}

	public function getHost()
	{
		return $this->host;
	}

	public function getDataBase()
	{
		return $this->db;
	}

	public function settings()
	{
		$this->dsn = "mysql:host={$this->host};dbname={$this->db}";

		return $this->dsn;
	}

	public function update($table, $column, $value,$param,$param2)
	{
		$sql="UPDATE $table SET $column='$value' WHERE $param=$param2";
		return $this->pdo->prepare($sql)->execute([':value' => $value]);
	}

	public function insert($table, $column, $value)
	{
		$sql = "INSERT INTO $table ($column) VALUES(:value);";

		return $this->pdo->prepare($sql)->execute([':value' => $value]);
	}
	
	public function delete($table,$param=null,$param2=null)
	{
		$sql="DELETE FROM $table WHERE $param=$param2";
		return $this->pdo->query($sql);
	}
	
	public function select($arr)
	{	
		$sql = 'SELECT * From usuario WHERE `clave` = "'.$arr['password'].'"';
		$stm=$this->pdo->query($sql);
		$value = $stm->fetch();
		return $value;
	}
	public function getAll($table) {
		$sql = "SELECT * From $table";
		$stm=$this->pdo->query($sql);
		return $users = $stm->fetchAll();
	}
	public function multipleSelect($table, $idArr) {
		$in=str_repeat('?,',count($idArr)-1).'?';
		$sql='SELECT * FROM $table WHERE id IN ($in)';
		$stm=$this->pdo->prepare($sql);
		$stm->execute($idArr);
		$data=$stm->fetchall();
		return $data;
	}
	
// De acuerdo a la tabla de USUARIO
	public function selectLoginPassword($table, $arr) {
		$sql = 'SELECT * From `'.$table.'` WHERE `login` = "'.$arr['login'].'" AND `clave` = "'.$arr['password'].'"';
		$stm=$this->pdo->query($sql);
		$value = $stm->fetch();
		//var_dump($value);
		return $value;
	}
	
}
?>