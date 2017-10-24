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
<?php foreach ($add as $row):?>
<body>
<h4>社員情報入力</h4>
	<form name="form1" method="get" action="confirm.php">
		<table width="60%" class="gridtable"  >
			<tr>
				<td width="30%"></td>
				<td width="30%"></td>
				<td><?php echo Html::anchor('action/list.php','社員情報一覧','')?></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="hidden" name="e_id" value="<?=$row['auto_increment']?>"></td>
			</tr>
			<tr>
				<td>社員氏名 (名字)</td>
				<td><input type="text" name="e_name1" value=""></td>
				<td>※必須 1-5文字</td>
			</tr>
			<tr>
				<td>社員カナ (名字)</td>
				<td><input type="text" name="e_name2" value=""></td>
				<td>※必須 1-5文字</td>
			</tr>
			<tr>
				<td>所属</td>
				<td><select name="a1">
						<option value=""></option>
						<option value="一部">一部</option>
						<option value="二部">二部</option>
						<option value="三部">三部</option>
				</select> <select name="a2">
						<option value=""></option>
						<option value="一課">一課</option>
						<option value="二課">二課</option>
						<option value="三課">三課</option>
				</select> <select name="a3">
						<option value=""></option>
						<option value="一係">一係</option>
						<option value="二係">二係</option>
						<option value="三係">三係</option>
				</select></td>
				<td>※必須</td>
			</tr>
			<tr>
				<td>役職</td>
				<td><select name="position">
						<option value=""></option>
						<option value="一般">一般</option>
						<option value="係長">係長</option>
						<option value="課長">課長</option>
						<option value="部長">部長</option>
				</td>
				<td>※必須</td>
			</tr>
			<tr>
				<td>画像</td>
				<td><input type="text" name="e_img"  value=""></td>
				<td>※任意 http:// もしくはhttps://の文字列</td>
			</tr>
			<tr>
				<td>一言コメント</td>
				<td><input type="text" name="e_info" value=""></td>
				<td>※任意 300文字まで</td>
			</tr>
			<tr>
				<td align="center"><input type="submit" value="確認"></td>
			</tr>
		</table>
</body>
<?php endforeach?>
</html>