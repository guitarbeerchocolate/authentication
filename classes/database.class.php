<?php
class database
{
	private $config;
	private $connection;
	private $pdoString;

	function __construct()
	{
		$this->config = (object) parse_ini_file('config.ini', true);
		$this->pdoString = $this->config->DB_TYPE;
		$this->pdoString .= ':dbname='.$this->config->DB_NAME;
		$this->pdoString .= ';host='.$this->config->DB_HOST;
		try
		{
			$this->connection = new PDO($this->pdoString, $this->config->DB_USERNAME, $this->config->DB_PASSWORD);
		}		
		catch(PDOException $e)
		{
			return $e->getMessage();
		} 
	}

	public function query($q)
	{
	    $statement = $this->connection->query($q);
	    $statement->setFetchMode(PDO::FETCH_OBJ);
	    return $statement->fetch();
	}

	function __destruct()
	{
		$this->connection = NULL;
	}
}
?>