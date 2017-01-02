<?php include "header.php"; ?>
<?php
    if(isset($_GET['kondisi'])) {
        $kondisi = $_GET['kondisi'];
    }

    //inisialisasi variable
    $id = "";
    $nmSupplier = "";
    $alamat = "";
    $telp = "";

    //get value from database
    if($kondisi == 'ubah') {
        $id  = $_GET['id'];
        $qry = "SELECT * FROM supplier WHERE kd_supplier = '$id'";
        $sql = mysqli_query($con, $qry) or die(mysqli_error($con));
        $isi = mysqli_fetch_array($sql);

        $nmSupplier = $isi['nm_supplier'];
        $alamat = $isi['alamat'];
        $telp = $isi['telp'];
    }

    //POST Action
    if(isset($_POST['simpan'])) {
        $kd_supplier  = $_POST['id'];
        $nm_supplier  = $_POST['nmSupplier'];
        $almt         = $_POST['alamat'];
        $telepon      = $_POST['telp'];
        $kondisi      = $_POST['kondisi'];

        if ($kondisi== 'rekam') {
            $query = "INSERT INTO supplier (nm_supplier,alamat,telp) VALUES ('$nm_supplier','$almt','$telepon')";         
        }elseif ($kondisi== "ubah") {
            $query = "UPDATE supplier
                         SET nm_supplier = '$nm_supplier',
                             alamat = '$almt',
                             telp = '$telepon'
                       WHERE kd_supplier = '$kd_supplier'";
        }

        mysqli_query($con,$query) or die(mysqli_error($con));
        echo "
            <script type='text/javascript'>
                alert('Data Berhasil Di".$kondisi."');
                window.location='masSupplier.php'
            </script>
        ";
    }
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Form <?php echo $kondisi == 'rekam' ? 'Tambah' : 'Ubah'; ?> Data Supplier</h1>
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
                                    <label>Nama Supplier</label>
                                    <input class="form-control" name="nmSupplier" value="<?php echo $nmSupplier; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input class="form-control" name="alamat" value="<?php echo $alamat; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Nomor Telepon</label>
                                    <input class="form-control" name="telp" value="<?php echo $telp; ?>">
                                </div>
                                <input type="hidden" name="kondisi" value="<?php echo $kondisi; ?>">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <button type="submit" name="simpan" class="btn btn-default">Simpan</button>
                                <a href="masSupplier.php" class="btn btn-default">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>