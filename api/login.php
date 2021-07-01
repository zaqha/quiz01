<?php include_once "../base.php";

// if($_POST['acc']=='admin' && $_POST['pw']=='1234'){
//   to("../backend.php?do=title");
// }else{
//   echo "<script>";
//   echo  "alert('帳號密碼錯誤');\n";
//   echo "location.href='../index.php?do=login'";
//   echo "</script>";
// }


// 【X】用find / 不用撈出帳密

$chk=$Admin->count(['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);

if($chk>0){
    $_SESSION['admin']=1;
    to("../backend.php?do=title");
}else{
    echo "<script>";
    echo  "alert('帳號密碼錯誤');\n";
    echo "location.href='../index.php?do=login'";
    echo "</script>";
}

?>