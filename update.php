<?php
//1. POSTデータ取得
$name   = $_POST["name"];
$url  = $_POST["url"];
$comment = $_POST["comment"]; //追加されています
$id = $_POST["id"];

//2. DB接続します
require_once("funcs.php");
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare("UPDATE gs_bm_table SET
                    name = :name,
                    url = :url,
                    comment = :comment,
                    indate = sysdate()
                WHERE
                    id = :id"
                );


// 数値の場合 PDO::PARAM_INT
// 文字の場合 PDO::PARAM_STR
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':url', $url, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
$stmt->bindValue(':id',     $id,     PDO::PARAM_INT);

//実行
$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
    sql_error($stmt);
} else {
    redirect("select.php");
}


// <?php
// //1. POSTデータ取得
// $name   = $_POST["name"];
// $email  = $_POST["email"];
// $naiyou = $_POST["naiyou"];
// $age    = $_POST["age"];
// $id     = $_POST["id"];

// //2. DB接続します
// require_once("funcs.php");
// $pdo = db_conn();

// //３．データ登録SQL作成
// $stmt = $pdo->prepare("UPDATE gs_bm_table SET name=:name,email=:email,age=:age,naiyou=:naiyou WHERE id=:id");
// //Integer（数値の場合 PDO::PARAM_INT)
// //Integer（文字列の場合 PDO::PARAM_STR)
// $stmt->bindValue(':name',   $name,   PDO::PARAM_STR);
// $stmt->bindValue(':email',  $email,  PDO::PARAM_STR);
// $stmt->bindValue(':age',    $age,    PDO::PARAM_INT);
// $stmt->bindValue(':naiyou', $naiyou, PDO::PARAM_STR);
// $stmt->bindValue(':id',     $id,     PDO::PARAM_INT);
// $status = $stmt->execute(); //実行

// //４．データ登録処理後
// if ($status == false) {
//     sql_error($stmt);
// } else {
//     redirect("select.php");
// }
