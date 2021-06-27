<?php include_once "../base.php";?>
<!-- 【X】echo $as[$do]; 吃不到$do -->
<h3 class="cent">編輯次選單</h3>
<hr>
<form action="api/submenu.php" method="post" enctype="multipart/form-data">
<table style="margin:auto;text-align:center"  id='sub'>
  <tr>
    <td>次選單名稱:</td>
    <td>主選單連結網址:</td>
    <td>刪除</td>
  </tr>

  <?php
  $rows=$Menu->all(['parent'=>$_GET['id']]);
  foreach($rows as $key => $value){
    
  ?>
  <tr>
  <!-- 編輯  -->
    <td><input type="text" name="text[]" value="<?=$value['text'];?>"></td>
    <td><input type="text" name="href[]" value="<?=$value['href'];?>"></td>
    <td>
    <input type="checkbox" name="del[]" value="<?=$value['id'];?>" >
    </td>
    <input type="hidden" name="id[]" value="<?=$value['id'];?>">
  </tr>


<?php
        }
    ?>

</table>


<div class="cent">
  <input type="submit" value="新增">
  <input type="reset" value="重置">
  <input type="button" value="更多次選單" onclick="more()">
  <input type="hidden" name="parent" value="<?=$_GET['id'];?>">
  <input type="hidden" name="table" value="menu">
</div>
</form>
<script>
// 新增
  function more(){
    let str=`
            <tr>
              <td><input type="text" name="text2[]" id=""></td>
              <td><input type="text" name="href2[]" id=""></td>
            </tr>
            `
      $("#sub").append(str)
  }
</script>
