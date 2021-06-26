<?php include_once "../base.php";?>
<!-- 【X】echo $as[$do]; 吃不到$do -->
<h3 class="cent"><?=$as['ad'];?></h3>
<hr>
<form action="api/add.php" method="post" enctype="multipart/form-data">
<table style="margin:auto"> 
  <tr>
    <td><?=$hs['ad'];?>:</td>
    <td><input type="text" name="text" id=""></td>
  </tr>
</table>
<div class="cent">
  <input type="submit" value="新增">
  <input type="reset" value="重置">
  <input type="hidden" name="table" value="ad"><!-- 目的:知道送過去的資料是做甚麼 -->

</div>
</form>