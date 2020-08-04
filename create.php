<?php
//echo "hello world";

//catching data at the same file
//  $data=$_POST;
// var_dump($data);

// $data=$_GET;
// var_dump($data);


// $file=$_FILES;
// var_dump($file);
// $data=$_SERVER['PHP_SELF'];
// var_dump($data);

$name=$_POST['name'];
$name=$_POST['name'];
$birthday=$_POST['birthday'];
$gender=$_POST['gender'];
$language=$_POST['language'];
//echo "$name and $birthday and $gender and $language";

$profile=$_FILES['profile'];//array 
$logo=$_FILES['logo'];//array
//var_dump($profile);
//var_dump($logo);

if(sizeof($profile)>0){
	$photoName=$profile['name'];
	$profileFilePath='images/'.time().$photoName;
	move_uploaded_file($profile['tmp_name'], $profileFilePath);
	//echo $filePath;
	//echo move_uploaded_file($profile['tmp_name'], $profilefilePath)? 'success':'failed';
}
if(sizeof($logo)>0){
	$logoName=$logo['name'];
	$logofilePath='images/logo/'.time().$logoName;
	move_uploaded_file($logo['tmp_name'], $logofilePath);
	//echo $filePath;
	//echo move_uploaded_file($logo['tmp_name'], $logofilePath)? 'success':'failed';
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
if(!$file_array){
	$file_array=[];//array as string


}
array_push($file_array, $member);

//string transform
$file_string=json_encode($file_array,JSON_PRETTY_PRINT);

//write file
file_put_contents('list.json', $file_string)? header('Location:homework.php'):print("failed to add");


?>