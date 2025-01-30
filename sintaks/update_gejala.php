<?php 
$id_gejala=$_GET['id'];
if(isset($_POST['update'])){
    $nama_gejala=$_POST['nama_gejala'];

    // proses update
    $sql = "UPDATE gejala SET nama_gejala='$nama_gejala' WHERE id_gejala='$id_gejala'";
    if ($conn->query($sql) === TRUE) {
        header("Location:?page=gejala");
    }
}


$sql = "SELECT * FROM gejala WHERE id_gejala='$id_gejala'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST">
            <div class="card border-0">
                <div class="card border-0">
                <div class="card-header bg-primary text-white border-dark text-center"><strong>Update Data Gejala</strong></div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Nama Gejala</label>
                        <input type="text" class="form-control shadow-sm" name="nama_gejala" value="<?php echo $row['nama_gejala'] ?>" maxlength="200" required>
                </div>

                <input class="btn btn-success" type="submit" name="update" value="Update">
                <a class="btn btn-danger" href="?page=gejala">Batal</a>

                </div>
            </div>
        </form>
    </div>
</div>