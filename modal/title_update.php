<?php include_once "../base.php";?>
<!-- 【X】echo $as[$do]; 吃不到$do -->
<h3 class="cent">更新標題圖片</h3>
<hr>
<form action="api/upload.php" method="post" enctype="multipart/form-data">
<table style="margin:auto">
  <tr>
    <td style="text-align:right"><?=$hs['title'];?></td>
    <td style="text-align:right"><input type="file" name="img" id=""></td>
  </tr>

</table>
<div class="cent">
  <input type="submit" value="更新">
  <input type="reset" value="重置">
  <input type="hidden" name="table" value="title"><!-- 目的:知道送過去的資料是做甚麼 -->
  <input type="hidden" name="id" value="<?=$_GET['id'];?>"><!-- 告知要更新哪個ID -->
</div>
</form> 
