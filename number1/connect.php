<?php
$host = 'localhost';
$dbname = 'demo';
$username = 'fliplikesuraj';
$password = 'Abdulbaki0818';

try
{
	$conn = new PDO("mysql: host=$host; dbname=$dbname", $username, $password);
}
catch(PDOException $e)
{
	throw new Exception('Error connecting to database');
}