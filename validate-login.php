<?php session_start();		

$email = $_POST["email"];	
$senha = $_POST["senha"];

if (empty($email) or empty($senha)) { 
    echo "campos vazios";
 }		

$sql = "SELECT * FROM usuario WHERE email ='$email' AND senha = '$senha' ";

$pdo = new PDO('mysql:host=localhost; dbname=obrassp;', 'root', '');

$stmt = $pdo->prepare($sql);

$stmt->execute();

if($stmt->rowCount() >= 1){

    $_SESSION["email"] = $email;

    echo "http://localhost/ObrasSP/admin.php";
    
}else{
    echo "<script> alert('Usuario ou senha Incorreta');	history.go(-1);	 </script>";
} 

?>