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

.h {
	font-size: 120%;
	font-weight: bold
}

.div-up {
	margin-top: 4%
}

.current-page {
	font-weight: bold
}
</style>
<title>社員情報編集確認</title>
</head>
<body>
	<div class="div-up">
	<?php foreach($emp as $row1):?>
	<?php foreach($aff as $row2):?>
	<?php foreach($pos as $row3):?>
	<form name="form2" method="post" action="">
		<table width="60%" align="center" class="gridtable">
			<tr>
				<td width="30%"><span class="h">社員情報確認</td>
			</tr>
			<tr>
				<td width="30%">社員情報入力＞<span class="current-page">確認</span>＞完了
				</td>
				<td width="30%"></td>
				<td><?php echo Html::anchor('action/list.php','社員情報一覧','')?></td>
			</tr>
			<tr>
				<td>社員番号</td>
				<td><input type="text" name="e_id" readonly="readonly"
					style="border: 0" value="<?=$row1['e_id']?>"></td>
			</tr>
			<tr>
				<td>社員氏名(名字)</td>
				<td><input type="text" name="e_name11" readonly="readonly"
					style="border: 0" value="<?=$row1['e_name11']?>"></td>
				<td>※必須 1-5文字</td>
			</tr>
				<tr>
				<td>社員氏名(名前)</td>
				<td><input type="text" name="e_name12" readonly="readonly"
					style="border: 0" value="<?=$row1['e_name12']?>"></td>
				<td>※必須 1-5文字</td>
			</tr>
			<tr>
				<td>社員カナ(名字)</td>
				<td><input type="text" name="e_name21" readonly="readonly"
					style="border: 0" value="<?=$row1['e_name21']?>"></td>
				<td>※必須 1-5文字</td>
			</tr>
			<tr>
				<td>社員カナ(名前)</td>
				<td><input type="text" name="e_name22" readonly="readonly"
					style="border: 0" value="<?=$row1['e_name22']?>"></td>
				<td>※必須 1-5文字</td>
			</tr>
			<tr>
				<td>所属</td>
				<td><input type="text" name="affiliation" readonly="readonly"
					style="border: 0" value="<?=$row2['affiliation']?>"></td>
				<td>※必須</td>
			</tr>
			<tr>
				<td>役職</td>
				<td><input type="text" name="position" readonly="readonly"
					style="border: 0" value="<?=$row3['position']?>"></td>
				<td>※必須</td>
			</tr>
			<tr>
				<td>画像</td>
				<td><input type="text" name="e_img" readonly="readonly"
					style="border: 0" value="<?=$row1['e_img']?>"></td>
				<td>※任意 http:// もしくはhttps://の文字列</td>
			</tr>
			<tr>
				<td>一言コメント</td>
				<td><input type="text" name="e_info" readonly="readonly"
					style="border: 0" value="<?=$row1['e_info']?>"></td>
				<td>※任意 300文字まで</td>
			</tr>
				<tr>
					<td align="center"><input onclick="history.go(-1)" type="button"
						value="編集" class='btn btn-primary'></td>
					<td align="left"><input type="submit" value="確認" class='btn btn-info'></td>
				</tr>
		</table>
    <?php endforeach;?>
    <?php endforeach;?>
    <?php endforeach;?>
<div class="div-up">
</body>
</html>