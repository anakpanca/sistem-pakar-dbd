<?php 
$id_penyakit=$_GET['id'];

if(isset($_POST['update'])){
    $nama_penyakit=$_POST['nama_penyakit'];
    $keterangan=$_POST['keterangan'];
    $solusi=$_POST['solusi'];

    // proses update
    $sql = "UPDATE penyakit SET nama_penyakit='$nama_penyakit',keterangan='$keterangan',solusi='$solusi' WHERE id_penyakit='$id_penyakit'";
    if ($conn->query($sql) === TRUE) {
        header("Location:?page=penyakit");
    }
}


$sql = "SELECT * FROM penyakit WHERE id_penyakit='$id_penyakit'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST">
            <div class="card border-0">
                <div class="card">
                <div class="card-header bg-primary text-white border-0 text-center"><strong>Update Data Penyakit</strong></div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Nama Penyakit</label>
                        <input type="text" class="form-control shadow-sm" name="nama_penyakit" value="<?php echo $row['nama_penyakit'] ?>" maxlength="50" required>
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan</label>
                        <input type="text" class="form-control shadow-sm" name="keterangan" value="<?php echo $row['keterangan'] ?>" maxlength="200" required>
                    </div>
                    <div class="form-group">
                        <label for="">Solusi</label>
                        <input type="text" class="form-control shadow-sm" name="solusi" value="<?php echo $row['solusi'] ?>" maxlength="200" required>
                    </div>

                <input class="btn btn-success text-white fw-bold" type="submit" name="update" value="Update">
                <a class="btn btn-danger fw-bold" href="?page=penyakit">Batal</a>

                </div>
            </div>
        </form>
    </div>
</div>