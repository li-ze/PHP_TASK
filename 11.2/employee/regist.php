<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title;?></title>
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
</style>
</head>
<body>
<div class="div-up">
     <form action="/employee/confirm"	method="post">
		<table width="60%" align="center" class="gridtable">
			<tr>
				<td width="30%"><h3><?php echo $title1;?></h3></td>
			</tr>
			<tr>
				<td width="30%"><span class="h">社員情報入力</span>＞確認＞完了</td>
				<td width="30%"></td>
				<td><?php echo Html::anchor('employee/list','社員情報一覧','')?></td>
			</tr>
			<tr>
				<td>社員氏名 (名字)</td>
				<td><input type="text" name="e_name11" value="<?php if(!empty($e_name11)){print $e_name11;} ?>"></td>
				<td>※必須 1-5文字</td>
			</tr>
			<tr>
				<td>社員氏名 (名前)</td>
				<td><input type="text" name="e_name12" value="<?php if(!empty($e_name12)){print $e_name12;} ?>"></td>
				<td>※必須 1-5文字</td>
			</tr>
			<tr>
				<td>社員カナ (名字)</td>
				<td><input type="text" name="e_name21" value="<?php if(!empty($e_name21)){print $e_name21;} ?>"></td>
				<td>※必須 1-5文字</td>
			</tr>
			<tr>
				<td>社員カナ (名前)</td>
				<td><input type="text" name="e_name22" value="<?php if(!empty($e_name22)){print $e_name22;} ?>"></td>
				<td>※必須 1-5文字</td>
			</tr>
			<tr>
			 	<td>役職</td>
				<td><select name="p_id">
                <?php
                print '<option value="">' .'</option>';
				 if (! empty($positions)) {
				 	 foreach ($positions as $position) {
                  	 	if ($position_condition && $position['p_id'] == $p_id) {
							print' <option selected="selected" value="'.$position['p_id'].'">'.$position['position'].'</option>';
							 }
						 else {
						 	print '<option value="'.$position['p_id'].'">'.$position['position'].'</option>';
							 }
                        }
                    }
                ?>
				 </select></td>
				<td>※必須</td>
			</tr>
			<tr>
				<td>所属</td>
				 <td><select name="a_id">
				 <?php
				  print '<option value="">' .'</option>';
                if (! empty($affiliations)) {
					     foreach ($affiliations as $affiliation) {
					if($affiliation_condition && $affiliation['a_id']==$a_id){
						print '<option selected="selected" value="'.$affiliation['a_id'].'">'.$affiliation['affiliation'].'</option>';
					}
					 else{
				     	print '<option value="'.$affiliation['a_id'].'">'.$affiliation['affiliation'].'</option>';
					   }
					     }
                  }
                ?>
			</select></td>
			<td>※必須</td>
			<?php
                if (!empty($e_id)){
                    print '<input type = "hidden" name ="e_id"  value ="'.$e_id.'">';
                    print '<input type ="hidden" name ="mark"  value="update">';
                }
                else{
                    print '<input type ="hidden" name="mark" value="insert">';
                }
			?>
			<tr>
				<td align="right"><input type="submit" value="登録" class='btn btn-inverse' ></td>
			</tr>
		</table>
<div class="div-up">
			 </form>
		 </div>
</body>
