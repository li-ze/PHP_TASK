<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php echo Asset::css('bootstrap.min.css');?>
<style type="text/css">
table.gridtable {
	font-family: verdana, arial, sans-serif;
	font-size: 14px;
	color: #333333;
	border-width: 0px;
	border-color: #666666;
	border-collapse: collapse;
}

table.gridtable th {
	border-width: 0px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #dedede;
}

table.gridtable td {
	border-width: 0px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #ffffff;
}
.h{font-size:120%;font-weight:bold}
.div-up{ margin-top:4%}
.current-page{ font-weight:bold}
</style>
 <title>社員情報編集</title>
</head>
<body>
<div class="div-up">
	<?php foreach ($emp as $row1):?>
	<?php foreach ($aff as $row2):?>
	<?php foreach ($pos as $row3):?>
		<form name="form2" method="post" action="upconfirm.php">
		<table width="50%"  align="center" class="gridtable">
			<tr>
				<td width="30%"><span class="h">社員情報入力</td>
			</tr>
			<tr>
				<td width="30%"><span class="current-page">社員情報入力</span>＞確認＞完了</td>
				<td width="30%"></td>
				<td><?php echo Html::anchor('action/list.php','社員情報一覧','')?></td>
			</tr>
			<tr>
				<td width="18%" align="left">社員番号</td>
				<td><input type="text" name="e_id" readonly="readonly"
					style="border: 0"value="<?=$row1['e_id']?>"></td>
			</tr>
			<tr>
				<td align="left">社員氏名(名字)</td>
				<td><input type="text" name="e_name11"
					value="<?=$row1['e_name11']?>"></td>
				<td>※必須 1-5文字</td>
			</tr>
			<tr>
				<td align="left">社員氏名(名前)</td>
				<td><input type="text" name="e_name12"
					value="<?=$row1['e_name12']?>"></td>
				<td>※必須 1-5文字</td>
			</tr>
			<tr>
				<td align="left">社員カナ(名字)</td>
				<td><input type="text" name="e_name21"
					value="<?=$row1['e_name21']?>"></td>
				<td>※必須 1-5文字</td>
			</tr>
			<tr>
				<td align="left">社員カナ(名前)</td>
				<td><input type="text" name="e_name22"
					value="<?=$row1['e_name22']?>"></td>
				<td>※必須 1-5文字</td>
			</tr>
			<tr>
				<td align="left">所属</td>
				<td><input type="text" name="affiliation"
					value="<?=$row2['affiliation']?>"></td>
				<td>※必須</td>
			</tr>
			<tr>
				<td align="left">役職</td>
				<td><input type="text" name="position"
					value="<?=$row3['position']?>"></td>
				<td>※必須</td>
			</tr>
			<tr>
				<td align="left">画像</td>
				<td><input type="text" name="e_img" value="<?=$row1['e_img']?>"></td>
				<td>※任意 http:// もしくはhttps://の文字列</td>
			</tr>
			<tr>
				<td align="left">一言コメント</td>
				<td><input type="text" name="e_info" value="<?=$row1['e_info']?>"></td>
				<td>※任意 300文字まで</td>
			</tr>
			<tr>
				<td align="center"><input type="submit" value="更新" class='btn btn-inverse'></td>
			</tr>
		</table>
	</form>
<?php endforeach?>
<?php endforeach?>
<?php endforeach?>
<div class="div-up">
</body>
</html>