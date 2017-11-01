<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>社員情報編集完了</title>
    <style type="text/css">
        input[type=text], select, textarea {
            width: 100%;
            padding: 12px;
            border: 0px;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
            resize: vertical;
           background-color: #B0E0E6;
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
        .show_error {
            color: red;
        }

        .button{ background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <div class="container">


             <h4>社員情報確認完了</h4>
             <label>社員人情報編集＞確認＞完了</label>
             &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
             <br><br>

             <label for="name">社員氏名（名字）</label>
             <input type="text" id="name" name="name"  disabled placeholder="名前（名字）.." required value="<?php print $name?>">


            <label for="full_name">社員氏名（名前）</label>
            <input type="text" id="full_name" name="full_name"  disabled placeholder="名前（名前）.." required value="<?php print $full_name ?>">


            <label for="kana">社員カナ（名字）</label>
            <input type="text" id="kana" name="kana"  disabled placeholder="カナ（名字）.." required value="<?php print $kana ?>">


            <label for="full_kana">社員カナ（名前）</label>
            <input type="text" id="full_kana" name="full_kana" disabled  placeholder="カナ（名前）.." required value="<?php print $full_kana ?>">


            <label for="position">役職</label>
            <input type="text" id="position" name="position"  disabled placeholder="カナ（名前）.." required value="<?php print $position ?>">

            <label for="affiliation">所属</label>
            <input type="text" id="affiliation" name="affiliation"  disabled placeholder="カナ（名前）.." required value="<?php print $affiliation ?>">

    <?php
                if (!empty($employee_id)){
                    print '<input type = "hidden" name ="employee_id"  value ="'.$employee_id.'">';
                    print '<input type ="hidden" name ="mark"  value="update">';
                }
                else{
                    print '<input type ="hidden" name="mark" value="insert">';
                }
			?>
            <button  class ="button"    onclick="location.href='/employee/index'">社員情報一覧</button>
            <button     class ="button"    onclick="location.href='/employee/regist?mark=insert'">追加登録</button>


    </div>
</body>
