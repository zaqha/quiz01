<?php include_once "../base.php";

//$total=$_POST['total'];

$Total->save(['id'=>1,'total'=>$_POST['total']]);

echo $Total->find(1)['total'];

// to("../backend.php?do=total");
?>