<?php 
$idusers=$_GET['id'];

// proses update
if(isset($_POST['update'])){

    // mengambil data dari users
    $role=$_POST['role'];

    // proses update
    $sql = "UPDATE users SET role='$role' WHERE idusers='$idusers'";
    if ($conn->query($sql) === TRUE) {
        header("Location:?page=users");
    }
}


$sql = "SELECT * FROM users WHERE idusers='$idusers'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<div class="row">
    <div class="col-sm-12">
        <form action="" method="POST">
            <div class="card border-0">
                <div class="card">
                <div class="card-header bg-primary text-white border-0 text-center"><strong>Update Data Users</strong></div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" class="form-control shadow-sm" name="username" value="<?php echo $row['username'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="text" class="form-control shadow-sm" name="pass" value="" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Role</label>
                        <select class="form-control chosen" data-placeholder="Pilih Role" name="role">
                            <option value="<?php echo $row['role']; ?>"><?php echo $row['role']; ?></option>
                            <option value="Dokter">Dokter</option>
                            <option value="Admin">Admin</option>
                            <option value="Pasien">Pasien</option>
                        </select>
                <input class="btn btn-success text-white fw-bold mt-2" type="submit" name="update" value="Update">
                <a class="btn btn-danger fw-bold mt-2" href="?page=users">Batal</a>

                </div>
            </div>
        </form>
    </div>
</div>