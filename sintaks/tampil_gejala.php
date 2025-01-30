<div class="card shadow">
  <div class="card-header bg-primary text-white border-dark text-center"><strong>Data Gejala</strong></div>
  <div class="card-body">
    <a class="btn btn-success mb-2 text-white fw-bold" href="?page=gejala&action=tambah">Tambah+</a>
    <table class="table table-bordered table-striped" id="myTable">
    <thead>
      <tr>
        <th width="50px" class="text-center">No.</th>
        <th width="700px">Nama Gejala</th>
        <th width="100px"></th>
      </tr>
    </thead>
    <tbody>
			<!-- letakkan proses menampilkan disini -->
    <?php
        $no=1;
        $sql = "SELECT*FROM gejala ORDER BY nama_gejala ASC";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
    ?>
     <tr>
        <td class="text-center"><?php echo $no++; ?></td>
	<td><?php echo $row['nama_gejala']; ?></td>
	<td align="center">
            <a class="btn btn-warning" href="?page=gejala&action=update&id=<?php echo $row['id_gejala']; ?>">
                <i class="fas fa-edit"></i>
            </a>
            <a onclick="return confirm('Yakin menghapus data ini ?')" class="btn btn-danger" href="?page=gejala&action=hapus&id=<?php echo $row['id_gejala']; ?>">
                <i class="fas fa-trash"></i>
            </a>
        </td>
     </tr>
    <?php
     }
     $conn->close();
    ?>
   </tbody>
</table>
</div>
</div>