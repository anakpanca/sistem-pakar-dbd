<!-- letakkan proses tambah data disini -->
<?php

if(isset($_POST['simpan'])){
    //mengambil data dari form
    $nama_gejala=$_POST['nama_gejala'];
	
    
	//proses simpan
    $sql = "INSERT INTO gejala VALUES (null,'$nama_gejala')";
    if ($conn->query($sql) === TRUE) {
        header("Location:?page=gejala");
    }
    
}
?>

<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST">
            <div class="card border-0">
                <div class="card">
                <div class="card-header bg-primary text-white border-dark"><strong>Tambah Data Gejala</strong></div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Nama Gejala</label>
                        <input type="text" class="form-control shadow-sm" name="nama_gejala" maxlength="200" required>
                    </div>

                <input class="btn btn-success" type="submit" name="simpan" value="Simpan">
                <a class="btn btn-danger" href="?page=gejala">Batal</a>

                </div>
            </div>
        </form>
    </div>
</div>