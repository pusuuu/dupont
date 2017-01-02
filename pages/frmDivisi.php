<?php include "header.php"; ?>
<?php
    if(isset($_GET['kondisi'])) {
        $kondisi = $_GET['kondisi'];
    }

    //inisialisasi variable
    $id = "";
    $nmDivisi = "";

    //get value from database
    if($kondisi == 'ubah') {
        $id  = $_GET['id'];
        $qry = "SELECT * FROM divisi WHERE kd_divisi = '$id'";
        $sql = mysqli_query($con, $qry) or die(mysqli_error($con));
        $isi = mysqli_fetch_array($sql);

        $nmDivisi = $isi['nm_divisi'];
    }

    //POST Action
    if(isset($_POST['simpan'])) {
        $kd_divisi  = $_POST['id'];
        $nm_divisi  = $_POST['nmDivisi'];
        $kondisi    = $_POST['kondisi'];

        if ($kondisi== 'rekam') {
            $query = "INSERT INTO divisi (nm_divisi) VALUES ('$nm_divisi')";         
        }elseif ($kondisi== "ubah") {
            $query = "UPDATE divisi
                         SET nm_divisi = '$nm_divisi'
                       WHERE kd_divisi = '$kd_divisi'";
        }

        mysqli_query($con,$query) or die(mysqli_error($con));
        echo "
            <script type='text/javascript'>
                alert('Data Berhasil Di".$kondisi."');
                window.location='masDivisi.php'
            </script>
        ";
    }
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Form <?php echo $kondisi == 'rekam' ? 'Tambah' : 'Ubah'; ?> Data DIvisi</h1>
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
                                    <label>Nama Divisi</label>
                                    <input class="form-control" name="nmDivisi" value="<?php echo $nmDivisi; ?>">
                                </div>
                                <input type="hidden" name="kondisi" value="<?php echo $kondisi; ?>">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <button type="submit" name="simpan" class="btn btn-default">Simpan</button>
                                <a href="masDivisi.php" class="btn btn-default">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>