<?php
//1. POSTデータ取得
$name = $_POST["name"];
$email = $_POST["email"];
$age = $_POST["age"];
$naiyou = $_POST["naiyou"];

//2. DB接続します
try {
  //ID ;’root',Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root',''); 
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

//３．データ登録SQL作成
$sql = "INSERT INTO gs_an_table(name,email,naiyou,age,indate)VALUES(:name,:email,:naiyou,:age,sysdate());"; //直接変数入れると危ない
$stmt = $pdo->prepare($sql); //セキュリティを高めるための仕組み
$stmt->bindValue(':name',  $name,  PDO::PARAM_STR);  //Integer（文字列の場合 PDO::PARAM_STR)
$stmt->bindValue(':email', $email, PDO::PARAM_STR);  //Integer（文字列の場合 PDO::PARAM_STR)
$stmt->bindValue(':age',   $age,   PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':naiyou',$naiyou,PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_STR)
$status = $stmt->execute(); //実行ボタン

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("SQLError:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header("Location: index.php"); //LocationのLは大文字、index.phpの前は空白必須
  exit();
}
?>
