<?php
include("conexao.php");
$id=$_GET["id"];
$delete = "DELETE FROM teste WHERE id_teste='$id'";
$stmt = $conexao->prepare($delete);
$stmt->execute();
?>