<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
					<!-- <p class="t cent botli">網站標題管理</p> -->
					<p class="t cent botli"><?=$ts[$do];?></p>
					<form method="post" action="api\edit.php">
						<table width="100%">
							<tbody>
								<tr class="yel">
									<td width="45%">網站標題</td>
									<td width="23%">替代文字</td>
									<td width="7%">顯示</td>
									<td width="7%">刪除</td>
									<td></td>
								</tr>
								<?php
								$rows=$Title->all();
								foreach ($rows as $key =>$value){
									?>
									<tr>
									<td width="45%"><img src="img/<?=$value['img'];?>" style="width: 300px;height: 30px;"></td>
									<td width="23%"><input type="text" name="text[]" value="<?=$value['text'];?>"></td>
									<!-- checkbox/radio 如果沒有被選不submit -->
									<td width="7%"><input type="radio" name="sh" value="<?=$value['id'];?>" <?=($value['sh']==1)?"checked":"";?>></td>
									<td width="7%"><input type="checkbox" name="del[]" value="<?=$value['id'];?>"></td>	
									<td><input type="button" value="更新圖片"
									onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;modal/title_update.php?id=<?=$value['id'];?>&#39;)"></td>		
											<input type="hidden" name="id[]" value="<?=$value['id'];?>">
									</tr>
								<?php
								}
								?>
							</tbody>
						</table>
						<table style="margin-top:40px; width:70%;">
							<tbody>
								<tr>
									<td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;modal/<?=$do;?>.php&#39;)" value="<?=$as[$do];?>"></td>
									<td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"><input type="hidden" name="table" value="<?=$do;?>"></td>
								</tr>
							</tbody>
						</table>

					</form>
				</div>
			</div>