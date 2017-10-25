<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
<title>社員情報詳細</title>
</head>
<body>
<div class="div-up">
		<?php foreach($emp as $row1):?>
		<?php foreach($aff as $row2):?>
		<?php foreach($pos as $row3):?>
	<table width="50%" align="center" class="gridtable">
		<tr>
			<td width="30%"><span class="h">社員情報詳細</td>
		</tr>
		<tr>
			<td width="30%"></td>
			<td><?php echo Html::anchor('action/list.php','社員情報一覧')?></td>
		</tr>
		<tr>
			<td>社員番号</td>
			<td><?=$row1['e_id']?></td>
		</tr>
		<tr>
			<td>社員氏名</td>
			<td><?=$row1['e_name11']?>&nbsp;<?=$row1['e_name12']?></td>
		</tr>
		<tr>
			<td>カナ</td>
			<td><?=$row1['e_name21']?>&nbsp;<?=$row1['e_name22']?></td>
		</tr>
		<tr>
			<td>所属</td>
			<td><?=$row2['affiliation']?></td>
		</tr>
		<tr>
			<td>役職</td>
			<td><?=$row3['position']?></td>
		</tr>
		<tr>
			<td>画像</td>
			<td><?=$row1['e_img']?></td>
		</tr>
		<tr>
			<td>一言コメント</td>
			<td><?=$row1['e_info']?></td>
		</tr>
            <?php endforeach;?>
            <?php endforeach;?>
            <?php endforeach;?>
 </table>
<div class="div-up">
</body>
</html>