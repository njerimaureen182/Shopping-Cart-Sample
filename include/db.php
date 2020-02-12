<?php

class CreateDb{

	// properties
	public $servername;
	public $username;
	public $password;
	public $dbname;
	public $tablename;
	public $con;

	// constructor
	public function __construct($servername="localhost",$username="root",$password="",$dbname="shop",$tablename="product") {
		$this->servername=$servername;
		$this->username=$username;
		$this->password=$password;
		$this->dbname=$dbname;
		$this->tablename=$tablename;

		// create connection
		$this->con = mysqli_connect($servername,$username,$password);

		// check connection
		// if (!$this->con) {
		// 	die ("Connection failed! <br> " . mysqli_connect_error());
		// }
		// success msg
		// echo "Connection successful <br>";

		// create database
		// $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

		// execute query
		// if (mysqli_query($this->con,$sql)) {
		// 	echo "Database created successfully! <br>";
		// } else{
		// 	echo "Error creating database!<br>" . mysqli_error($this->con);
		// }

		// create table
		// $sql = "CREATE TABLE IF NOT EXISTS $tablename
		// (
		// 	id INT(100) NOT NULL PRIMARY KEY AUTO_INCREMENT,
		// 	product_name VARCHAR(20) NOT NULL,
		// 	product_price FLOAT NOT NULL,
		// 	product_img VARCHAR(20) NOT NULL
		// )";

		// connection variable
		$this->con = mysqli_connect($servername,$username,$password,$dbname);

		// execute table query
		// if (mysqli_query($this->con,$sql)) {
		// 	echo "Table created successfully!<br>";
		// } else{
		// 	echo "Error creating table!<br>" . mysqli_error($this->con);
		// }

	}

	// to get data from database
	public function getData()
	{
		$sql = "SELECT * FROM $this->tablename";

		// execute query and store it in the 'result' variable
		$result = mysqli_query($this->con,$sql);

		// to get the number of rows in the result set/variable:
		if (mysqli_num_rows($result) > 0) {
			// return value
			return $result;
		}
	}

}