<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<style type="text/css">
table.gridtable {
	font-family: verdana,arial,sans-serif;
	font-size:14px;
	color:#333333;
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
</style>
</head>
<body>
	<h4>社員情報入力</h4>
	<?php foreach ($emp as $row1):?>
	<?php foreach ($aff as $row2):?>
	<?php foreach ($pos as $row3):?>
		<form name="form2" method="post" action="upconfirm.php">
		<table width="50%" class="gridtable" >
			<tr>
				<td width="18%" align="left">社員番号</td>
				<td><input type="text" name="e_id" value="<?=$row1['e_id']?>"></td>
			</tr>
			<tr>
				<td align="left">社員氏名</td>
				<td><input type="text" name="e_name1" value="<?=$row1['e_name1']?>"></td>
			</tr>
			<tr>
				<td align="left">カナ</td>
				<td><input type="text" name="e_name2" value="<?=$row1['e_name2']?>"></td>
			</tr>
			<tr>
				<td align="left">所属</td>
				<td><input type="text" name="affiliation" value="<?=$row2['affiliation']?>"></td>
			</tr>
			<tr>
				<td align="left">役職</td>
				<td><input type="text" name="position" value="<?=$row3['position']?>"></td>
			</tr>
			<tr>
				<td align="left">画像</td>
				<td><input type="text" name="e_img" value="<?=$row1['e_img']?>"></td>
			</tr>
			<tr>
				<td align="left">一言コメント</td>
				<td><input type="text" name="e_info" value="<?=$row1['e_info']?>"></td>
			</tr>
			<tr>
				<td align="center"><input type="submit" value="確認"></td>
			</tr>
		</table>
	</form>
<?php endforeach?>
<?php endforeach?>
<?php endforeach?>