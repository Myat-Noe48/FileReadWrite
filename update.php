<?php
// $data=$_POST;
// var_dump($data);

// $file=$_FILES;
// var_dump($file);

$name=$_POST['name'];
$birthday=$_POST['birthday'];
$gender=$_POST['gender'];
$language=$_POST['language'];
//echo "$name and $birthday and $gender and $language";
$oldid=$_POST['oldid'];

$profile=$_FILES['profile'];//array 
$logo=$_FILES['logo'];//array
//var_dump($profile);
//var_dump($logo);

if($profile['size']>0){
	unlink($_POST['oldProfile']);
	$photoName=$profile['name'];
	$profileFilePath='images/'.time().$photoName;
	move_uploaded_file($profile['tmp_name'], $profileFilePath);
	//echo $filePath;
	//echo move_uploaded_file($profile['tmp_name'], $profilefilePath)? 'success':'failed';
}else{
	$profileFilePath=$_POST['oldProfile'];
}
if($logo['size']>0){
	unlink($_POST['oldLogo']);
	$logoName=$logo['name'];
	$logofilePath='images/logo/'.time().$logoName;
	move_uploaded_file($logo['tmp_name'], $logofilePath);
	//echo $filePath;
	//echo move_uploaded_file($logo['tmp_name'], $logofilePath)? 'success':'failed';
}else{
	$logofilePath=$_POST['oldLogo'];
}

$member=[
	'profile'=>$profileFilePath,
	'logo'=>$logofilePath,
	'name'=>$name,
	'birthday'=>$birthday,
	'gender'=>$gender,
	'language'=>$language];

//var_dump($member);

//read file()
$file=file_get_contents('list.json');
//array transform
$file_array=json_decode($file,true);
$file_array[$oldid]=$member;

//string transform
$file_string=json_encode($file_array,JSON_PRETTY_PRINT);

//write file
file_put_contents('list.json', $file_string)? header('Location:homework.php'):print("failed to update");


?>