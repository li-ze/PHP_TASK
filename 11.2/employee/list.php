<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
 <?php echo Asset::css('bootstrap.min.css');?>
<title>社員情報一覧</title>
<style type="text/css">
table.gridtable {
	font-family: verdana, arial, sans-serif;
	font-size: 14px;
	color: #333333;
	border-width: 1px;
	border-color: #666666;
	border-collapse: collapse;
	margin-top: 11;
	margin-left: auto;
	margin-right: auto;
	width: 70%;
}

table.gridtable th {
	text-align: center;
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #dedede;
}

table.gridtable td {
	text-align: center;
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #ffffff;
}

table.count {
	font-family: verdana, arial, sans-serif;
	font-size: 14px;
	margin-top: 9;
	margin-left: auto;
	margin-right: auto;
	width: 70%;
}

table.no {
	font-family: verdana, arial, sans-serif;
	font-size: 14px;
	margin-top: 9;
	margin-left: auto;
	margin-right: auto;
	width: 70%;
}

.div-up {
	margin-top: 4%
}
</style>
</head>
<body>
	<div class="div-up">
		<table align="center" width=70%>
			<tr>
				<td><h4>社員情報一覧</h4></td>
			</tr>
			<tr>
				<td align="left"><input type="text" name="search" id="search"
					placeholder="検索キーワード"> <input class='btn btn-inverse' type="submit"
					value="検索"></td>
				<td align="right"><?php echo Html::anchor('/employee/regist?mark=insert','社員情報入力')?></td>
			</tr>
		</table>
	<table class="gridtable">
		<div class="btn-group">
<?php
if (count($employees) !== 0) {
    echo "<tr>";
    echo "<th>社員番号</th>";
    echo "<th>社員氏名</th>";
    echo "<th>社員カナ</th>";
    echo "<th>所属</th>";
    echo "<th>役職</th>";
    echo "<th width=20%>操作</th>";
    echo "</tr>";
    foreach ($employees as $employee) {
        echo "<tr>";
        echo "<td>{$employee['e_id']}</td>";
        echo "<td>{$employee['e_name11']}&nbsp{$employee['e_name12']}</td>";
        echo "<td>{$employee['e_name21']}&nbsp'{$employee['e_name22']}</td>";
        echo "<td>{$employee['affiliation']}</td>";
        echo "<td>{$employee['position']}</td>";
        echo "<td><button class='btn btn-primary' onclick=\"location.href='/employee/regist?mark=update&e_id=" . $employee['e_id'] . "'\">編集</button>
                  <button class='btn btn-danger' onclick=\"location.href='/employee/delete?e_id=" . $employee['e_id'] . "'\">削除</button>
              </td>";
        echo "</tr>";
    }
    echo "</table>";
    foreach ($count as $counts) {
        echo "<table class='count'>";
        echo "<tr>";
        echo "<td>{$counts['count']}件<td>";
        echo "</tr>";
        echo "</table>";
    }
} else {
    echo "<table class='no'>";
    echo "<tr>";
    echo "<td>データが存在しません。<td>";
    echo "</tr>";
    echo "</table>";
}
?>
		</div>
	<div class="div-up">
</body>
</html>
















