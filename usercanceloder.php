<?php
if(isset($_GET["oderID"])){
$oder=$_GET['oderID'];
try{
    $stmt=$pdo->prepare("DELETE FROM oders WHERE oderID='{$oder}';");
    $stmt->execute();
    if($stmt){
        header("location:router.php?page=userOders");
    }
}catch(PDOException $e){
    echo $e->getMessage();
}
}