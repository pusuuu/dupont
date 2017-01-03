<?php
include "header.php"; 
include "function.php";
?>
<?php
    if(isset($_GET['kondisi'])) {
        $kondisi = $_GET['kondisi'];
    }

    //inisialisasi variable
    //$id = "";
    //$nmSupplier = "";
    //$alamat = "";
    //$telp = "";

    //get value from database
    /*if($kondisi == 'ubah') {
        $id  = $_GET['id'];
        $qry = "SELECT * FROM supplier WHERE kd_supplier = '$id'";
        $sql = mysqli_query($con, $qry) or die(mysqli_error($con));
        $isi = mysqli_fetch_array($sql);

        $nmSupplier = $isi['nm_supplier'];
        $alamat = $isi['alamat'];
        $telp = $isi['telp'];
    }*/

    //POST Action
    if(isset($_POST['simpan'])) {
        $kd_pene_sup       = $_POST['id'];
        $tgl_pene_sup      = date("y-m-d");
        $kd_gudang         = $_POST['kdGudang'];
        $kd_supplier       = $_POST['kdSup'];
        $kondisi           = $_POST['kondisi'];

        if ($kondisi== 'rekam') {
            $query = "INSERT INTO penerimaan_supplier (kd_pene_sup,tgl_pene_sup,kd_gudang,kd_supplier) VALUES ('$kd_pene_sup','$tgl_pene_sup','$kd_gudang','$kd_supplier')";         
        }/*elseif ($kondisi== "ubah") {
            $query = "UPDATE supplier
                         SET nm_supplier = '$nm_supplier',
                             alamat = '$almt',
                             telp = '$telepon'
                       WHERE kd_supplier = '$kd_supplier'";
        }*/

        mysqli_query($con,$query) or die(mysqli_error($con));
        echo "
            <script type='text/javascript'>
                alert('Data Berhasil Di".$kondisi."');
                window.location='trxGudangInS.php'
            </script>
        ";
    }
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
        <?php echo autoid('penerimaan_supplier', 'kd_pene_sup', 'PNSP');?>
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
                                    <label>No. Pemasukkan</label>
                                    <input class="form-control" name="notrans" disabled value="<?php echo autoid('penerimaan_supplier', 'kd_pene_sup', 'PNSP');?>">
                                </div>
                                
                                <div class="form-group">
                                    <label>Kode Gudang</label>
                                    <input class="form-control" name="kdGudang">
                                </div>
                                <div class="form-group">
                                    <label>Kode Supplier</label>
                                    <input class="form-control" name="kdSup">
                                </div>
                                <input type="hidden" name="kondisi" value="<?php echo $kondisi; ?>">
                                <input type="hidden" name="id" value="<?php echo autoid('penerimaan_supplier', 'kd_pene_sup', 'PNSP');?>">
                                <button type="submit" name="simpan" class="btn btn-default">Simpan</button>
                                <a href="trxGudangInS.php" class="btn btn-default">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>