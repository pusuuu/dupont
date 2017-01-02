<?php include "header.php"; ?>
<?php
	if(isset($_GET['kondisi'])) {
		$kondisi = $_GET['kondisi'];
	}

    //inisialisasi variable
    $id = "";
    $divisi = "";
    $nmUser = "";
    $passUser = "";
    $jns = "";

    //get value from database
    if($kondisi == 'ubah') {
        $id  = $_GET['id'];
        $qry = "SELECT * FROM user WHERE kd_user = '$id'";
        $sql = mysqli_query($con, $qry) or die(mysqli_error($con));
        $isi = mysqli_fetch_array($sql);

        $divisi = $isi['kd_divisi'];
        $nmUser = $isi['nm_user'];
        $passUser = $isi['pass_user'];
        $jns = $isi['akses'];
    }

    //POST Action
    if(isset($_POST['simpan'])) {
        $kd_user    = $_POST['id'];
        $kd_divisi  = $_POST['divisi'];
        $nm_user    = $_POST['nmUser'];
        $pass_user  = $_POST['pwd'];
        $jns_akses  = $_POST['hakAkses'];
        $kondisi    = $_POST['kondisi'];

        if ($kondisi== 'rekam') {
            $query = "INSERT INTO user (kd_user,kd_divisi,nm_user,pass_user,akses) VALUES ('$kd_user','$kd_divisi','$nm_user','$pass_user','$jns_akses')";         
        }elseif ($kondisi== "ubah") {
            $query = "UPDATE user
                         SET kd_divisi  = '$kd_divisi',
                             nm_user    = '$nm_user',
                             pass_user  = '$pass_user',
                             akses      = '$jns_akses'
                       WHERE kd_user    = '$kd_user'";
        }

        mysqli_query($con,$query) or die(mysqli_error($con));
        echo "
            <script type='text/javascript'>
                alert('Data Berhasil Di".$kondisi."');
                window.location='masKaryawan.php'
            </script>
        ";
    }
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Form <?php echo $kondisi == 'rekam' ? 'Tambah' : 'Ubah'; ?> Data Karyawan</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Mohon lengkapi form di bawah ini:
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form method="POST">
                                <div class="form-group">
                                    <?php if ($kondisi== 'rekam') { ?>
                                            <label>ID Karyawan</label>
                                            <input class="form-control" name="idKar">
                                    <?php } ?>
                                    <?php if ($kondisi== 'ubah') { ?>
                                            <label>ID Karyawan</label>
                                            <input class="form-control" name="idKar" disabled value="<?php echo $id; ?>">
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label>Nama User</label>
                                    <input class="form-control" name="nmUser" value="<?php echo $nmUser; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Divisi</label>
                                    <select class="form-control" name="divisi">
                                        <?php
                                            $qry = "SELECT * FROM divisi";
                                            $sql = mysqli_query($con,$qry);
                                            
                                            while($row = mysqli_fetch_array($sql)){
                                                if($row["kd_divisi"] == $isi["kd_divisi"])
                                                    echo "<option value='$row[kd_divisi]' selected>$row[nm_divisi]</option>";
                                                else
                                                    echo "<option value='$row[kd_divisi]'>$row[nm_divisi]</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" type="password" name="pwd" value="<?php echo $passUser; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Jenis</label>
                                    <select class="form-control" name="hakAkses" >
                                        <option>-- Pilih Jenis --</option>
                                        <option value="1" <?php echo $jns == 1 ? "selected" : ""; ?> >Admin Gudang</option>
                                        <option value="2" <?php echo $jns == 2 ? "selected" : ""; ?> >Admin produksi</option>
                                        <option value="3" <?php echo $jns == 3 ? "selected" : ""; ?> >Pimpinan Gudang</option>
                                    </select>
                                </div>
                                <input type="hidden" name="kondisi" value="<?php echo $kondisi; ?>">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <button type="submit" name="simpan" class="btn btn-default">Simpan</button>
                                <a href="masKaryawan.php" class="btn btn-default">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>