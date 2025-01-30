<?php
// mengambil data dari parameter
$id_aturan=$_GET['id'];

// hapus basis aturan
$sql = "DELETE FROM basis_aturan WHERE id_aturan='$id_aturan'";
$conn->query($sql);

// hapus detail basis aturan
$sql = "DELETE FROM detail_basis_aturan WHERE id_aturan='$id_aturan'";
$conn->query($sql);

$conn->close();

header("Location:?page=aturan");
?>