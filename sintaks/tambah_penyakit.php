<!-- letakkan proses tambah data disini -->
<?php

if(isset($_POST['simpan'])){
    //mengambil data dari form
    $nama_penyakit=$_POST['nama_penyakit'];
    $keterangan=$_POST['keterangan'];
    $solusi=$_POST['solusi'];
    
	//proses simpan
    $sql = "INSERT INTO penyakit VALUES (null,'$nama_penyakit','$keterangan','$solusi')";
    if ($conn->query($sql) === TRUE) {
        header("Location:?page=penyakit");
    }
    
}
?>

<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST">
            <div class="card border-0">
                <div class="card">
                <div class="card-header bg-primary text-white border-dark text-center"><strong>Tambah Data Penyakit</strong></div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Nama Penyakit</label>
                        <input type="text" class="form-control shadow-sm" name="nama_penyakit" maxlength="50" required>
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan</label>
                        <input type="text" class="form-control shadow-sm" name="keterangan" maxlength="200" required>
                    </div>
                    <div class="form-group">
                        <label for="">Solusi</label>
                        <input type="text" class="form-control shadow-sm" name="solusi" maxlength="200" required>
                    </div>
                <input class="btn btn-success text-white fw-bold" type="submit" name="simpan" value="Simpan">
                <a class="btn btn-danger fw-bold" href="?page=penyakit">Batal</a>

                </div>
            </div>
        </form>
    </div>
</div>