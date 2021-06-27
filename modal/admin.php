<?php include_once "../base.php";?>
<!-- 【X】echo $as[$do]; 吃不到$do -->
<h3 class="cent"><?=$as['admin'];?></h3>
<hr>
<form action="api/add.php" method="post" enctype="multipart/form-data">
<table style="margin:auto">
  <!-- <tr>
    <td style="text-align:right"><?=$hs['admin'];?></td>
    <td style="text-align:right"><input type="file" name="img" id=""></td>
  </tr> -->
  <tr>
    <td style="text-align:right">帳號:</td>
    <td><input type="text" name="acc" id=""></td>
  </tr>
  <tr>
    <td style="text-align:right">密碼:</td>
    <td><input type="password" name="pw" id=""></td>
  </tr>
  <tr>
    <td style="text-align:right">確認密碼:</td>
    <td><input type="password" name="pw" id=""></td>
  </tr>
</table>
<div class="cent">
  <input type="submit" value="新增">
  <input type="reset" value="重置">
  <input type="hidden" name="table" value="admin">
</div>
</form>
