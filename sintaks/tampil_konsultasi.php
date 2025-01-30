
<?php
date_default_timezone_set("Asia/Jakarta");
if(isset($_POST['proses'])){

    //mengambil data dari form
    $nama_pasien=$_POST['nama_pasien'];
    $tgl=date("Y/m/d");

    //proses simpan konsultasi
    $sql = "INSERT INTO konsultasi VALUES (Null,'$tgl','$nama_pasien')";
    mysqli_query($conn,$sql);

    //mengambil id gejala
    $id_gejala=$_POST['id_gejala'];

    //proses mengambil data konsultasi
    $sql = "SELECT * FROM konsultasi ORDER BY id_konsultasi DESC";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $id_konsultasi=$row['id_konsultasi'];

    //proses simpan detail konsultasi
    $jumlah = count($id_gejala);
    $i=0;
    while($i < $jumlah){
        $id_gejalane=$id_gejala[$i];
        $sql = "INSERT INTO detail_konsultasi VALUES ($id_konsultasi,'$id_gejalane')";
        mysqli_query($conn,$sql);
        $i++;
    }

    //mengambil data dari tabel penyakit untuk di cek di basis aturan
    $sql = "SELECT*FROM penyakit";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {

        $id_penyakit = $row['id_penyakit']; 
        $nama_penyakit = $row['nama_penyakit'];
        $jyes=0;

        //mencari jumlah gejala di basis aturan berdasarkan penyakit
        $sql2 = "SELECT COUNT(id_penyakit) AS jml_gejala
            FROM basis_aturan INNER JOIN detail_basis_aturan
            ON basis_aturan.id_aturan=detail_basis_aturan.id_aturan
            WHERE id_penyakit='$id_penyakit'";
        $result2 = $conn->query($sql2);
        $row2 = $result2->fetch_assoc();
        $jml_gejala=$row2['jml_gejala'];

        //mancari gejala pada basis aturan
        $sql3 = "SELECT id_penyakit, id_gejala
            FROM basis_aturan INNER JOIN detail_basis_aturan
            ON basis_aturan.id_aturan=detail_basis_aturan.id_aturan
            WHERE id_penyakit='$id_penyakit'";
        $result3 = $conn->query($sql3);
        while($row3 = $result3->fetch_assoc()) {

            $id_gejalane=$row3['id_gejala'];

            //membandingkan apakah yang dipilih pada konsultasi sesuai
            $sql4 = "SELECT id_gejala FROM detail_konsultasi
                WHERE id_konsultasi='$id_konsultasi' AND id_gejala='$id_gejalane'";
            $result4 = $conn->query($sql4);
            if ($result4->num_rows > 0) {
                $jyes+=1;
            }
        }
      
        // mencari persentase
        if($jml_gejala>0){
            $peluang = round(($jyes/$jml_gejala)*100,2);
        } else {
            $peluang = 0;
        }

        // simpan data detail penyakit
        if($peluang>0){
            $sql = "INSERT INTO detail_penyakit VALUES ($id_konsultasi,'$id_penyakit','$peluang')";
            mysqli_query($conn,$sql);
        }

        header("Location:?page=konsultasi&action=hasil&id_konsultasi=$id_konsultasi");

    }

}
?>
<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST" name="Form" onsubmit="return validasiForm()">
            <div class="card border-0">
                <div class="card">
                <div class="card-header bg-primary text-white border-0 text-center"><strong>Konsultasi Penyakit</strong></div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Nama Pasien</label>
                        <input type="text" class="form-control" name="nama_pasien" maxlength="50" required>
                    </div>
               
                <!-- tabel data gejala -->   
                <div class="form-group">
                <label for="">Pilih gejala-gejala berikut</label>
                    <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="30px"></th>
                                    <th width="30px">No.</th>
                                    <th width="700px">Nama Gejala</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $no=1;
                                $sql = "SELECT*FROM gejala ORDER BY nama_gejala ASC";
                                $result = $conn->query($sql);
                                while($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <td align="center"><input type="checkbox" class="check-item" name="<?php echo 'id_gejala[]';?>"value="<?php echo $row['id_gejala']; ?>"></td>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row['nama_gejala']; ?></td>
                                
                            </tr>
                            <?php
                                }
                                $conn->close();
                            ?>
                            </tbody>
                        </table>
                </div>

                <input class="btn btn-primary" type="submit" name="proses" value="Proses">
     
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    function validasiForm()
    {
       

    //validasi gejala yang belum dipilih
    var checkbox=document.getElementsByName('<?php echo 'id_gejala[]';?>');

    var isChecked=false;

    for(var i=0;i<checkbox.length;i++){
        if(checkbox[i].checked){
            isChecked = true;
            break;
        }
    }

    //jika belum ada yang di check
    if(!isChecked){
        alert('Pilih setidaknya satu gejala !!');
        return false;
    }

    return true;
}


</script>