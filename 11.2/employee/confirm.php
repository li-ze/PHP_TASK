<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title><?php print $title;?></title>
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
</head>
<body>
<div class="div-up">
     <form action="/employee/confirm"	method="post">
		<table width="60%" align="center" class="gridtable">
			<tr>
				<td width="30%"><h3><?php echo $title;?></h3></td>
			</tr>
			<tr>
				<td width="30%"><span class="h">社員情報入力</span>＞確認＞完了</td>
				<td width="30%"></td>
				<td><?php echo Html::anchor('employee/list','社員情報一覧','')?></td>
			</tr>
			<tr>
				<td>社員氏名 (名字)</td>
				<td><input type="text" name="e_name11" value="<?php print $e_name11; ?>"></td>
				<td>※必須 1-5文字</td>
			</tr>
			<tr>
				<td>社員氏名 (名前)</td>
				<td><input type="text" name="e_name12" value="<?php print $e_name12; ?>"></td>
				<td>※必須 1-5文字</td>
			</tr>
			<tr>
				<td>社員カナ (名字)</td>
				<td><input type="text" name="e_name21" value="<?php print $e_name21; ?>"></td>
				<td>※必須 1-5文字</td>
			</tr>
			<tr>
				<td>社員カナ (名前)</td>
				<td><input type="text" name="e_name22" value="<?php print $e_name22; ?>"></td>
				<td>※必須 1-5文字</td>
			</tr>
			<tr>
				<td>役職</td>
				<td><input type="text" name="position" value="<?php print $e_name21; ?>"></td>
				<td>※必須</td>
			</tr>
			<tr>
				<td>所属</td>
				<td><input type="text" name="affiliation" value="<?php print $e_name22; ?>"></td>
				<td>※必須</td>
			</tr>
			<label for="name">社員氏名（名字）</label>
			 <input type="text" id="name" name="e_name11" disabled placeholder="名前（名字）.." required value="<?php print $e_name11?>">


			<label for="full_name">社員氏名（名前）</label>
			<input type="text" id="full_name" name="e_name12"  disabled placeholder="名前（名前）.." required value="<?php print $e_name12 ?>">


 			 <label for="kana">社員カナ（名字）</label>
            <input type="text" id="kana" name="e_name21"  disabled  placeholder="カナ（名字）.." required value="<?php print $e_name21 ?>">


			 <label for="full_kana">社員カナ（名前）</label>
			<input type="text" id="full_kana" name="e_name22"  disabled  placeholder="カナ（名前）.." required value="<?php print $e_name22 ?>">


			 <label for="position">役職</label>
			<input type="text" id="position" name="position"  disabled  placeholder="カナ（名前）.." required value="<?php print $position ?>">

			 <label for="affiliation">所属</label>
			<input type="text" id="affiliation" name="affiliation"  disabled placeholder="カナ（名前）.." required value="<?php print $affiliation ?>">


<form method="post">
			 <input type="hidden" id="name" name="e_name11" value="<?php print $e_name11?>">
			<input type="hidden" id="full_name" name="e_name12"  value="<?php print $e_name12 ?>">
            <input type="hidden" id="kana" name="e_name21"  value="<?php print $e_name21 ?>">
			<input type="hidden" id="full_kana" name="e_name22" value="<?php print $e_name22 ?>">
			<input type="hidden" id="position" name="p_id"  value="<?php print $p_id ?>">
			<input type="hidden" id="affiliation" name="a_id" value="<?php print $a_id ?>">
<?php
                if (!empty($e_id)){
                    print '<input type = "hidden" name ="e_id"  value ="'.$e_id.'">';
                    print '<input type ="hidden" name ="mark"  value="update">';
                }
                else{
                    print '<input type ="hidden" name="mark" value="insert">';
                }
			?>
</form>

		<button  class ="button"	onclick="regist();">編集</button>
		<button	 class ="button"	onclick="done();">登録</button>
		<script type ="text/javascript">
			function regist(){
				var form = document.forms[0];
				var actionPath ="regist";
				form.action =actionPath;
				form.submit();
				}


			function done(){
				var form = document.forms[0];
				var actionPath ="done";
				form.action = actionPath;
				form.submit();
				}
		</script>



    </div>
</body>
