<?php
include_once "../base.php";
// 確認有抓到資料
// echo $_POST['table'];
// echo $_POST['text'];

$db=new DB($_POST['table']);

// 檔案成功上傳
if(isset($_FILES['img']['tmp_name'])){
  move_uploaded_file($_FILES['img']['tmp_name'],"../img/".$_FILES['img']['name']);
  $data['img']=$_FILES['img']['name'];
}


$data['text']=$_POST['text'];
// $data['img']="img1.jpg";

$db->save($data);
to("../backend.php?do=".$_POST['table']);

?>