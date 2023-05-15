<?php
//Variables for connect to mysqli
$servername="localhost";
$username="root";
$password="";
$sql = "CREATE DATABASE WPPC_Rules";
//Connecting to the mysqli
$conn=new mysqli($servername, $username, $password);
	echo"<ol>";
if($conn->connect_error){
	die("<li>Connection Failed : &nbsp".$conn->connect_error);
	echo"</li>";
}
echo "<li>Connected Sucessfully!</li>";
//Creating the database WPPC_Rules
if(mysqli_query($conn, $sql)){
	echo"<li>Database WPPC_Rules Created Sucessfully!</li>";
}else{
	echo"Error Creating Database : &nbsp".mysql_error($conn);
}
mysqli_close($conn);
//Creating the table WPPC_Rules in the database WPPC_Rules
$dbname="WPPC_Rules";
$conn=new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error){
	die("<li>Connection Failed : &nbsp".$conn->connect_error);
	echo"</li>";
}
$sql="Create table WPPC_Rules(id INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY, RULE_ID VARCHAR(100) NOT NULL, TEXT_CONTENT_DOCUMENT VARCHAR(1000) NOT NULL, SEARCH_SIMILAR_1 VARCHAR(1000) NOT NULL, SEARCH_SIMILAR_2 VARCHAR(1000) NOT NULL, SINHALA_NAME VARCHAR(1000), TAMIL_NAME VARCHAR(1000), ENGLISH_NAME VARCHAR(1000), reg_date  VARCHAR(1000) NOT NULL)";
if($conn->query($sql) === TRUE){
	echo"<li>Table WPPC_Rules Created Sucessfully!</li>";
}else{
	echo"<li>Error Creating Table : &nbsp".mysql_error($conn);
	echo"</li>";
}	
	echo"</ol>";
	$conn->close();
?>