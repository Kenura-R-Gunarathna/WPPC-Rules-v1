<?php
//Data from edit rules page to insert rules
$ruleid=$_POST['ruleid'];
$text_content=$_POST['text_content'];
$sinhala_pdf_file=$_POST['sinhala_pdf_file'];
$tamil_pdf_file=$_POST['tamil_pdf_file'];
$english_pdf_file=$_POST['english_pdf_file'];
//Variables for connect to mysqli
$servername="localhost";
$username="root";
$password="";
$dbname="WPPC_Rules";
//Connecting to the mysqli
$conn=new mysqli($servername, $username, $password, $dbname);
	echo"<ol>";
if($conn->connect_error){
	die("<li>Connection Failed : &nbsp".$conn->connect_error);
	echo"</li>";
}
echo "<li>Connected Sucessfully!</li>";
//Inserting data to the Variables which insert data to the table WPPC_Rules in the database WPPC_Rules
$SEARCH_SIMILAR_1=$ruleid;
$SEARCH_SIMILAR_2=$text_content;  
$SEARCH_SIMILAR_3="roll";  
$SEARCH_SIMILAR_4="number";  
$SEARCH_SIMILAR_5="point"; 
$reg_date=date("Y-M-l-d");
//Inserting data to the table WPPC_Rules in the database WPPC_Rules
$sql="INSERT INTO WPPC_Rules(RULE_ID, TEXT_CONTENT_DOCUMENT, SEARCH_SIMILAR_1, SEARCH_SIMILAR_2, SINHALA_NAME, TAMIL_NAME, ENGLISH_NAME, reg_date) VALUES ('$ruleid', '$text_content', '$SEARCH_SIMILAR_1', '$SEARCH_SIMILAR_2', '$SEARCH_SIMILAR_3', '$SEARCH_SIMILAR_4', '$SEARCH_SIMILAR_5', '$reg_date')";
if($conn->query($sql) === TRUE){
	echo"<li>Rule ".$ruleid." Inserted Sucessfully!</li>";
	$myfile = fopen("../search/".$ruleid.".txt", "w");
	$txt =$text_content;
	fwrite($myfile,$txt);
	fclose($myfile);
}else{
	echo"<li>Error Inserting&nbsp ".$ruleid." : &nbsp".$sql."<br>".$conn->error;
	echo"</li>";
}	
	echo"</ol>";
	$conn->close();
?>