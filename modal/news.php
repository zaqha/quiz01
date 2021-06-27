<?php include_once "../base.php";?>
<!-- 【X】echo $as[$do]; 吃不到$do -->
<h3 class="cent"><?=$as['title'];?></h3>
<hr>
<form action="api/add.php" method="post" enctype="multipart/form-data">
<table style="margin:auto">

  <tr>
    <td><?=$hs['news'];?></td>
    <td><textarea name="text" style="width:250px;height:120px;"></textarea></td>
  </tr>
</table>
<div class="cent">
  <input type="submit" value="新增">
  <input type="reset" value="重置">
  <input type="hidden" name="table" value="news">

</div>
</form>
