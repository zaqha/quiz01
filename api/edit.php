<?php include_once "../base.php";

$texts=$_POST['text'];
$ids=$_POST['id'];
// print_r($texts);
// print_r($ids);
// array([0]=>替代文字1,[1]=>替代文字2)array([0]=>1,[1]=>2)
$table=$_POST['table'];
$db=new DB($table);



foreach($ids as $key => $id){

  if(isset($_POST['del']) && in_array($id,$_POST['del'])) {
    // 【刪除】
    // $Title->del($id);
    $db->del($id);
  }else{

  // 【修改】
  $row=$db->find($id);
  //未編輯前資料Array([id]=>1[img]=>img1[text]=>111,[sh]=>0)
  // $row['text']=$texts[$key];
  // 編輯後資料Array([id]=>1[img]=>img1[text]=>1111111111,[sh]=>0)

  //有值(有點擊)又==id
  // if(isset($_POST['sh']) && $_POST['sh']==$id){
  //   $row['sh']=1;
  // }else{
  //   $row['sh']=0;
  // }
  // 【單選】$row['sh']=(isset($_POST['sh']) && $_POST['sh']==$id)?1:0;

  switch($table){
    case 'title';
        $row['sh']=(isset($_POST['sh']) && $_POST['sh']==$id)?1:0;
        $row['text']=$texts[$key];
      break;
      default:
        $row['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
  }
  $db->save($row);
  }
}


// 【刪除】
// foreach($_POST['del'] as $id){
//   $Title->del($id);
// }

to("../backend.php?do=".$table);

?>