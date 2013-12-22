<?php

	// place db host name. Usually "localhost"
	$db_host = "127.0.0.1";

	//Pace username for MySQL db here
	$db_username = "root";

	//Place password for MySQL db here
	$db_pass = "";

	//Place MySQL db name here
	$db_name = "json";

	$con = mysql_connect("$db_host","$db_username", "$db_pass", "$db_name") or die(mysql_error());
	mysql_select_db("$db_name")or die("no database with that name");

	$result = mysql_query("SELECT * FROM names");

	$rows = array();

	//retrieve every record and put it into an array that we can later turn into JSON
	while($r = mysql_fetch_assoc($result)){
		$rows[]['user'] = $r;
	}

	header('Content-Type: application/json');
	$new_rows["content"] =  $rows;
	$json_rows = json_encode($new_rows);
	echo $json_rows;

?>