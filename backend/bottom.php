<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
					<!-- <p class="t cent botli">網站標題管理</p> -->
					<p class="t cent botli"><?=$ts[$do];?></p>
					<form method="post" action="api\edit_bottom.php">
						<table width="50%" style="margin: auto;">
							<tbody>
								<tr class="yel">
									<!-- <td width="50%">網站標題</td> -->
									<td width="50%"><?=$hs[$do];?></td>
									<td width="50%"><input type="text" name="bottom" value="<?=$Bottom->find(1)['bottom']?>"></td>
								</tr>
							</tbody>
						</table>
						<table style="margin-top:40px; width:70%;">
							<tbody>
								<tr>
									<td width="200px">
									<!-- <input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;view.php?do=title&#39;)" value="<?=$as[$do];?>"> -->
									</td>
									<td class="cent"><input type="submit" value="修改確定">
                  <input type="reset" value="重置"></td>
								</tr>
							</tbody>
						</table>

					</form>
				</div>
			</div>