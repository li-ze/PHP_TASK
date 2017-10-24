<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <?php echo Asset::css('bootstrap.min.css');?>
<title>社員情報一覧</title>
<style type="text/css">
table.gridtable {
	font-family: verdana,arial,sans-serif;
	font-size:14px;
	color:#333333;
	border-width: 1px;
	border-color: #666666;
	border-collapse: collapse;
}
table.gridtable th {
    text-align:center;
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
</style>
</head>
<body>
	<table align="center" width=90%>
		<tr>
			<td>社員情報一覧</td>
		</tr>
		<tr>
			<td align="left"><input type="text" name="search" id="search"
				placeholder="検索でキーワード"> <input type="submit" value="検索"></td>
			<td align="right"><?php echo Html::anchor('action/regist.php','社員情報入力')?></td>
		</tr>
	</table>
	<table  class="gridtable" align="center" width=90%>
		<div class="btn-group">



        <?php
        if (! empty($info)) {
          echo "  <tr>";
           echo " <th>社員番号</th>";
           echo " <th>社員氏名</th>";
           echo " <th>社員カナ</th>";
         echo "   <th>所属</th>";
          echo "  <th>役職</th>";
          echo "  <th>操作</th>";
        echo "    </tr>";
            foreach ($info as $row) {
                echo " <tr align='center'>";
                echo "<td><a href='detail/{$row['e_id']}' >{$row['e_id']}</a></td>";
                echo "<td>{$row['e_name1']}</td>";
                echo "<td>{$row['e_name2']}</td>";
                echo "<td>{$row['position']}</td>";
                echo "<td>{$row['affiliation']}</td>";
                echo "<td>

				<form action=''method='post'>
				<input type='hidden' name='e_id' value='{$row['e_id']}'>
 				<a href='edit/{$row['e_id']}' class='btn btn-primary span1'>編集</a>
				<input type='submit' value='削除'class='btn btn-danger span9'>
				</form>
			         </td>";
                echo "</tr>";
            }
        }else {
            echo " <tr>";
            echo "<td>データが存在しません。</td>";
            echo "</tr>";
        }
        ?>
		</div>
	</table>
</body>
</html>

