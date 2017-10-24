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
<h4>社員情報確認</h4>
	<form name="form1" method="post" action="">
		<table width="60%" class="gridtable" >
			<tr>
				<td width="30%"></td>
				<td width="30%"></td>
				<td><?php echo Html::anchor('action/list.php','社員情報一覧','')?></td>
			</tr>
			<tr>
				<td>社員番号</td>
				<td><input type="text" name="e_id" readonly="readonly"
					style="border: 0" value="<?php echo $_GET["e_id"];?>"></td>
			</tr>
			<tr>
				<td>社員氏名 (名字)</td>
				<td><input type="text" name="e_name1" readonly="readonly"
					style="border: 0" value="<?php echo $_GET['e_name1'];?>"></td>
				<td>※必須 1-5文字</td>
			</tr>
			<tr>
				<td>社員カナ (名字)</td>
				<td><input type="text" name="e_name2" readonly="readonly"
					style="border: 0" value="<?php echo $_GET['e_name2'];?>"></td>
				<td>※必須 1-5文字</td>
			</tr>
			<tr>
				<td>所属</td>
				<td><input type="text" name="affiliation" readonly="readonly"
					style="border: 0"
					value="<?php echo $_GET['a1'];?><?php echo $_GET['a2'];?><?php echo $_GET['a3'];?>"></td>
				<td>※必須</td>
			</tr>
			<tr>
				<td>役職</td>
				<td><input type="text" name="position" readonly="readonly"
					style="border: 0" value="<?php echo $_GET['position'];?>"></td>
				<td>※必須</td>
			</tr>
			<tr>
				<td>画像</td>
				<td><input type="text" name="e_img" readonly="readonly"
					style="border: 0" value="<?php echo $_GET['e_img'];?>"></td>
				<td>※任意 http:// もしくはhttps://の文字列</td>
			</tr>
			<tr>
				<td>一言コメント</td>
				<td><input type="text" name="e_info" readonly="readonly"
					style="border: 0" value="<?php echo $_GET['e_info'];?>"></td>
				<td>※任意 300文字まで</td>
			</tr>
			<tr>
				<td align="center"><input onclick="history.go(-1)" type="button"
					value="編集"></td>
				<td align="left"><input type="submit" value="登録"></td>
			</tr>
		</table>

</body>
</html>