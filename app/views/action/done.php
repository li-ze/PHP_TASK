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
 <?php echo Asset::css('bootstrap.min.css');?>
</head>
<body>
<h4>社員情報登録完了</h4>
	 	<?php foreach($emp as $row1):?>
		<?php foreach($aff as $row2):?>
		<?php foreach($pos as $row3):?>
		<table width="50%" class="gridtable">
		<tr>
				<td width="30%">社員番号</td>
				<td><?=$row1['e_id']?></td>
			</tr>
			<tr>
				<td>社員氏名 (名字)</td>
				<td><?=$row1['e_name1']?></td>
				<td>※必須 1-5文字</td>
			</tr>
			<tr>
				<td>社員カナ (名字)</td>
				<td><?=$row1['e_name2']?></td>
				<td>※必須 1-5文字</td>
			</tr>
			<tr>
				<td>所属</td>
				<td><?=$row2['affiliation']?></td>
				<td>※必須</td>
			</tr>
			<tr>
				<td>役職</td>
				<td><?=$row3['position']?></td>
				<td>※必須</td>
			</tr>
			<tr>
				<td>画像</td>
				<td><?=$row1['e_img']?></td>
				<td>※任意 http:// もしくはhttps://の文字列</td>
			</tr>
			<tr>
				<td>一言コメント</td>
				<td><?=$row1['e_info']?></td>
				<td>※任意 300文字まで</td>
			</tr>
			<tr>
				<td><?php echo Html::anchor('action/list.php','社員情報一覧',array('class'=>'btn btn-primary span1'))?></td>
				<td><?php echo Html::anchor('action/regist.php','追加登録',array('class'=>'btn btn-primary span1'))?></td>
			</tr>
		</table>
	<?php endforeach?>
	<?php endforeach?>
	<?php endforeach?>
</body>
</html>