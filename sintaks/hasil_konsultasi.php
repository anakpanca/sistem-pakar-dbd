<!-- proses menampilkan data hasil konsultasi -->
<?php 
//mengambil id dari parameter
$id_konsultasi=$_GET['id_konsultasi'];

$sql = "SELECT * FROM konsultasi WHERE id_konsultasi='$id_konsultasi'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!-- tampilan halaman hasil konsultasi -->
<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST">
            <div class="card border-0">
                <div class="card">
                    <div class="card-header bg-primary text-white border-0 text-center"><strong>Hasil konsultasi</strong></div>
                    <div class="card-body">

                        <div class="form-group">
                            <label for="">Nama Pasien</label>
                            <input type="text" class="form-control" value="<?php echo $row['nama'] ?>" name="nama" readonly>
                        </div>

                        <!-- tabel gejala-gejala -->
                        <label for="">Gejala-Gejala Penyakit Yang Dipilih :</label>
                        <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th width="40px">No.</th>
                            <th width="700px">Nama Gejala</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $no=1;
                            $sql = "SELECT detail_konsultasi.id_konsultasi,detail_konsultasi.id_gejala,gejala.nama_gejala
                                        FROM detail_konsultasi INNER JOIN gejala 
                                        ON detail_konsultasi.id_gejala=gejala.id_gejala WHERE id_konsultasi='$id_konsultasi'";
                            $result = $conn->query($sql);
                            while($row = $result->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row['nama_gejala']; ?></td>
                            </tr>
                         <?php
                            }
                        ?>
                        </tbody>
                        </table>

                        <!-- hasil konsultasi penyakit -->
                        <label for="">Hasil konsultasi penyakit :</label>
                        <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th width="40px">No.</th>
                            <th width="150px">Nama Penyakit</th>
                            <th width="100px">Persentase</th>
                            <th width="700px">Solusi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $no=1;
                            $sql = "SELECT detail_penyakit.id_konsultasi,detail_penyakit.id_penyakit,penyakit.nama_penyakit,
                                            penyakit.solusi,detail_penyakit.persentase
                                        FROM detail_penyakit INNER JOIN penyakit 
                                        ON detail_penyakit.id_penyakit=penyakit.id_penyakit WHERE id_konsultasi='$id_konsultasi'
                                        ORDER BY persentase DESC";
                            $result = $conn->query($sql);
                            while($row = $result->fetch_assoc()) {
                        ?>
                            <tr>
                                <td class="text-center"><?php echo $no++; ?></td>
                                <td><?php echo $row['nama_penyakit']; ?></td>
                                <td class="text-center"><?php echo $row['persentase'] . "%"; ?></td>
                                <td><?php echo $row['solusi']; ?></td>
                            </tr>
                         <?php
                            }
                            $conn->close();
                        ?>
                        </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>