<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
	margin-top:11;
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
	}
.div-up{ margin-top:4%}
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
				placeholder="検索でキーワード"> <input class='btn btn-inverse' type="submit" value="検索"></td>
			<td align="right"><?php echo Html::anchor('action/regist.php','社員情報入力')?></td>
		</tr>
	</table>
	<table class="gridtable" align="center" width=70%>
		<div class="btn-group">
        <?php
        if (! empty($info)) {
            echo " <tr>";
            echo " <th>社員番号</th>";
            echo " <th>社員氏名</th>";
            echo " <th>社員カナ</th>";
            echo " <th>所属</th>";
            echo " <th>役職</th>";
            echo " <th width=20%>操作</th>";
            echo " </tr>";
            foreach ($info as $row) {
                echo " <tr align='center'>";
                echo "<td><a href='detail/{$row['e_id']}' >{$row['e_id']}</a></td>";
                echo "<td>{$row['e_name11']}&nbsp;{$row['e_name12']}</td>";
                echo "<td>{$row['e_name21']}&nbsp;{$row['e_name22']}</td>";
                echo "<td>{$row['position']}</td>";
                echo "<td>{$row['affiliation']}</td>";
                echo "<td>

				<form action=''method='post'>
				<input type='hidden' name='e_id' value='{$row['e_id']}'>
 				<a href='edit/{$row['e_id']}' class='btn btn-primary'>編集</a>
				<input type='submit' value='削除'class='btn btn-danger span9'>
				</form>
			         </td>";
                echo "</tr>";
            }
            echo "</table>";
            foreach ($count as $counts) {
                echo "<table class='count' align='center' width=70%>";
                echo "<tr>";
                echo "<td>{$counts['count']}件数<td>";
                echo "</tr>";
                echo "</table>";
            }
        } else {
            echo "<table class='gridtable' align='center' width=90%>";
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

