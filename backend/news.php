<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
					<!-- <p class="t cent botli">網站標題管理</p> -->
					<p class="t cent botli"><?=$ts[$do];?></p>
					<form method="post" action="api\edit.php">
						<table width="100%" class="cent">
							<tbody>
								<tr class="yel">
									<td width="80%">最新消息資料內容</td>
									<td width="10%">顯示</td>
									<td width="10%">刪除</td>
								</tr>
			
								<?php
								// 分頁
								$all=$News->count();
								$div=4; //4筆一頁
								$pages=ceil($all/$div);
								$now=isset($_GET['p'])?$_GET['p']:1;
								$start=($now-1)*$div;
								$rows=$News->all("limit $start,$div");
								foreach ($rows as $key =>$value){
									?>
									<tr>
									<td >
									<textarea name="text[]" style="width:90%;height:50px;"><?=$value['text'];?></textarea>
									<!-- checkbox/radio 如果沒有被選不submit -->
									<td ><input type="checkbox" name="sh[]" value="<?=$value['id'];?>" <?=($value['sh']==1)?"checked":"";?>></td>
									<td ><input type="checkbox" name="del[]" value="<?=$value['id'];?>"></td>	
									
									<input type="hidden" name="id[]" value="<?=$value['id'];?>">
									</tr>
								<?php
								}
								?>
	
							</tbody>
						</table>
							<!-- 分頁 -->
							<div class="cent"> 
						<?php
						if(($now-1)>0){
							echo "<a href='?do=news&p=".($now-1)."'> < </a>";
						}
						
						for($i=1;$i<=$pages;$i++){
							$fontsize=($now==$i)?'24px':'18px';
							echo "<a href='?do=news&p=$i' style='font-size:$fontsize'>$i</a>";
						}
						
						if(($now+1)<=$pages){
							echo "<a href='?do=news&p=".($now+1)."'> > </a>";
						}
						?>
						</div>
						<!--  -->
						<table style="margin-top:40px; width:70%;">
							<tbody>
								<tr>
									<td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;modal/<?=$do;?>.php&#39;)" value=<?=$as[$do];?>></td>
									<td class="cent"><input type="submit" value="修改確定">
									<input type="reset" value="重置">
									<input type="hidden" name="table" value="<?=$do;?>">
									</td>
								</tr>
							</tbody>
						</table>
					</form>
				</div>
			</div>

