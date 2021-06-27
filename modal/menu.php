<?php include_once "../base.php";?>
<!-- 【X】echo $as[$do]; 吃不到$do -->
<h3 class="cent"><?=$as['menu'];?></h3>
<hr>
<form action="api/add.php" method="post" enctype="multipart/form-data">
<table style="margin:auto">
  <tr>
    <td style="text-align:right">主選單名稱:</td>
    <td style="text-align:right"><input type="text" name="text" id=""></td>
  </tr>
  <tr>
    <td>主選單連結網址:</td>
    <td><input type="text" name="href" id=""></td>
  </tr>
</table>
<div class="cent">
  <input type="submit" value="新增">
  <input type="reset" value="重置">
  <input type="hidden" name="table" value="menu">
</div>
</form>
