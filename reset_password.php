<?php
include('admin/dbcon.php');
include('session.php');
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];

$query = mysql_query("select * from student where student_id = '$session_id'")or die(mysql_error());
$row = mysql_fetch_array($query);
$id = $row['student_id'];

$count = mysql_num_rows($query);
if ($count > 0){
	$passwordEnc = md5($password);
	mysql_query("update student set password = '$passwordEnc' where student_id = '$id'")or die(mysql_error());
	echo 'true';
}else{
echo 'false';
}
?>