<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title><?php print $title;?></title>
    <style type="text/css">
        input[type=text], select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
            resize: vertical;
        }
        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #45a049;
        }
        .container {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }
    </style>
</head>
<body>

    <div class="container">
        <form action="/employee/confirm"	method="post">

			<h4><?php print $title;?></h4>
			<label>社員人情報編集＞確認＞完了</label>
			&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
			<a href="/employee/index">社員情報一覧</a><br><br>

			<br><br>
			<label for="name">社員氏名（名字）</label>
			 <input type="text" id="name" name="name" placeholder="名前（名字）.." required value="<?php if(!empty($name)){print $name;} ?>">


			<label for="full_name">社員氏名（名前）</label>
			<input type="text" id="full_name" name="full_name" placeholder="名前（名前）.." required value="<?php if(!empty($full_name)){print $full_name;} ?>">


 			 <label for="kana">社員カナ（名字）</label>
 			 <input type="text" id="kana" name="kana" placeholder="カナ（名字）.." required value="<?php if(!empty($kana)){print $kana;} ?>">


			 <label for="full_kana">社員カナ（名前）</label>
			<input type="text" id="full_kana" name="full_kana" placeholder="カナ（名前）.." required value="<?php if(!empty($full_kana)){print $full_kana;} ?>">


			 <label for="position">役職</label>
			<select id="position" name="position_id">
                <?php
                print '<option value="">' .'</option>';
				 if (! empty($positions)) {
				 	 foreach ($positions as $position) {
                  	 	if ($position_condition && $position['position_id'] == $position_id) {
							print' <option selected="selected" value="'.$position['position_id'].'">'.$position['position'].'</option>';
							 }
						 else {
						 	print '<option value="'.$position['position_id'].'">'.$position['position'].'</option>';
							 }
                        }
                    }
                ?>
				 </select>


				 <label for="affiliation">所属</label>
				 <select id="affiliation" name="affiliation_id">
				  <?php

				  print '<option value="">' .'</option>';
                if (! empty($affiliations)) {
					     foreach ($affiliations as $affiliation) {
					if($affiliation_condition && $affiliation['affiliation_id']==$affiliation_id){
						print '<option selected="selected" value="'.$affiliation['affiliation_id'].'">'.$affiliation['affiliation'].'</option>';
					}
					 else{
				     	print '<option value="'.$affiliation['affiliation_id'].'">'.$affiliation['affiliation'].'</option>';
					   }
					     }
                  }
                ?>
			</select>

			<?php
                if (!empty($employee_id)){
                    print '<input type = "hidden" name ="employee_id"  value ="'.$employee_id.'">';
                    print '<input type ="hidden" name ="mark"  value="update">';
                }
                else{
                    print '<input type ="hidden" name="mark" value="insert">';
                }
			?>
			<input type="submit" value="登録">
			 </form>
		 </div>
</body>
