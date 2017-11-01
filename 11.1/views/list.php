<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>社員情報一覧</title>
    <style type="text/css">
        #searchInput {
                 background-image: url('https://static.runoob.com/images/mix/searchicon.png'); /* 搜索按钮 */
                 background-position: 10px 12px; /* 検索ボタン定位*/
                 background-repeat: no-repeat; /* 不重复图片 */
                 width: 70%;
                 font-size: 16px;
                 padding: 12px 20px 12px 40px;
                 border: 1px solid #ddd;
                 margin-bottom: 12px;
                }

       #myTable {
                 border-collapse: collapse;
                 width: 100%;
                 border: 1px solid #ddd;
                 font-size: 18px;
                 }

        #myTable th, #myTable td {
                 text-align: left;
                 padding: 12px;
                 }

        #myTable tr {
                 /* テーブルの枠*/
                 border-bottom: 1px solid #ddd;
                 }

        #myTable tr.header, #myTable tr:hover {
                 /* 表头及鼠标移动过 tr 时添加背景 */
                 background-color: #f1f1f1;
                 }

        .delete_button {
                background-color: #f44336;
                color: white;
                border: none;
                padding: 12px 28px;
                margin-left: 5%;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                border-radius: 12px;
                width: 30%;
                }

        .update_button {
                background-color: #008CBA;
                color: white;
                border: none;
                padding: 12px 28px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                border-radius: 12px;
                width: 30%;
                }
    </style>
</head>
<body>
                <h3>社員情報一覧</h3>
                <input type="text" id="searchInput" onkeyup="myFunction()" placeholder="搜索...">
                <button>検索</button>
                 &nbsp &nbsp &nbsp &nbsp &nbsp
                 <a href="/employee/regist?mark=insert">社員情報入力</a>

                 <?php
                 if (count($employees) !== 0) {
                    print '<table id="myTable">'.
                          '<tr class="header">'.
                          '<th style ="width:15%;">社員番号</th>'.
                          '<th style ="width:15%;">社員氏名</th>'.
                          '<th style ="width:15%;">社員カナ</th>'.
                          '<th style ="width:15%;">所属</th>'.
                          '<th style ="width:15%;">役職</th>'.
                          '</tr>';
                          foreach ($employees as $employee) {
                          print '<tr>'.
                                    '<td>'.$employee['employee_id'].'</td>>'.
                                    '<td>'.$employee['name'].'&nbsp'.$employee['full_name'].'</td>'.
                                    '<td>'.$employee['kana'].'&nbsp'.$employee['full_kana'].'</td>'.
                                    '<td>'.$employee['affiliation'].'</td>'.
                                    '<td>'.$employee['position'].'</td>'.
                                    '<td>'.
                                    "<button class='update_button' onclick=\"location.href='/employee/regist?mark=update&employee_id=" . $employee['employee_id'] . "'\">編集</button>".
                                    "<button class='delete_button' onclick=\"location.href='/employee/delete?employee_id=" . $employee['employee_id'] . "'\">削除</button>".
                                    '</td>'.
                                    '</tr>';
                                     }
                         print '</table>';
                                        }
                else {
                         print '<p>データが存在しません。</p>';
                      }
                 ?>
</body>
</html>
















