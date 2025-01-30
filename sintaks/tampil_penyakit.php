<div class="card border-0">
  <div class="card-header bg-primary text-white border-dark text-center"><strong>Data Penyakit</strong></div>
  <div class="card-body">
    <a class="btn btn-success mb-2 text-white fw-bold" href="?page=penyakit&action=tambah">Tambah+</a>
    <table class="table table-bordered table-striped" id="myTable">
    <thead>
      <tr class="text-center">
        <th width="50px">No.</th>
        <th width="200px">Nama Penyakit</th>
        <th width="500px">Keterangan</th>
        <th width="200px">Solusi</th>
        <th width="100px"></th>
      </tr>
    </thead>
    <tbody>
			<!-- letakkan proses menampilkan disini -->
    <?php
        $no=1;
        $sql = "SELECT*FROM penyakit ORDER BY nama_penyakit ASC";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
    ?>
     <tr>
        <td class="text-center"><?php echo $no++; ?></td>
	<td><?php echo $row['nama_penyakit']; ?></td>
	<td><?php echo $row['keterangan']; ?></td>
	<td><?php echo $row['solusi']; ?></td>
    <td align="center">
            <a class="btn btn-warning" href="?page=penyakit&action=update&id=<?php echo $row['id_penyakit']; ?>">
                <i class="fas fa-edit"></i>
            </a>
            <a onclick="return confirm('Yakin menghapus data ini ?')" class="btn btn-danger" href="?page=penyakit&action=hapus&id=<?php echo $row['id_penyakit']; ?>">
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