<?php include "header.php"; ?>
<?php
	if(isset($_GET['kondisi'])) {
		$kondisi = $_GET['kondisi'];
	}

    //inisialisasi variable
    $id = "";
    $nmBarang = "";
    $ket = "";
    $jns = "";

    //get value from database
    if($kondisi == 'ubah') {
        $id  = $_GET['id'];
        $qry = "SELECT * FROM barang WHERE kd_barang = '$id'";
        $sql = mysqli_query($con, $qry) or die(mysqli_error($con));
        $isi = mysqli_fetch_array($sql);

        $nmBarang = $isi['nm_barang'];
        $ket = $isi['keterangan'];
        $jns = $isi['jenis'];
    }

    //POST Action
    if(isset($_POST['simpan'])) {
        $kd_barang  = $_POST['id'];
        $nm_barang  = $_POST['nmBarang'];
        $keterangan = $_POST['ket'];
        $jenis      = $_POST['jns'];
        $kondisi    = $_POST['kondisi'];

        if ($kondisi== 'rekam') {
            $query = "INSERT INTO barang (nm_barang,keterangan,jenis) VALUES ('$nm_barang','$keterangan','$jenis')";         
        }elseif ($kondisi== "ubah") {
            $query = "UPDATE barang
                         SET nm_barang = '$nm_barang',
                             keterangan = '$keterangan',
                             jenis = '$jenis'
                       WHERE kd_barang = '$kd_barang'";
        }

        mysqli_query($con,$query) or die("Error, $kondisi query failed");
        echo "
            <script type='text/javascript'>
                alert('Data Berhasil Di".$kondisi."');
                window.location='masBarang.php'
            </script>
        ";
    }
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Form <?php echo $kondisi == 'rekam' ? 'Tambah' : 'Ubah'; ?> Data Barang</h1>
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
                                    <label>Nama Barang</label>
                                    <input class="form-control" name="nmBarang" value="<?php echo $nmBarang; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <input class="form-control" name="ket" value="<?php echo $ket; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Jenis</label>
                                    <select class="form-control" name="jns" >
                                        <option>-- Pilih Jenis --</option>
                                        <option value="1" <?php echo $jns == 1 ? "selected" : ""; ?> >Bahan Mentah</option>
                                        <option value="2" <?php echo $jns == 2 ? "selected" : ""; ?> >Barang Jadi</option>
                                    </select>
                                </div>
                                <input type="hidden" name="kondisi" value="<?php echo $kondisi; ?>">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <button type="submit" name="simpan" class="btn btn-default">Simpan</button>
                                <a href="masBarang.php" class="btn btn-default">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>