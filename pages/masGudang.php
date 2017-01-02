<?php 
include "header.php";
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Master Gudang</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
			<div class="alert alert-success">
                Ingin menambah data Gudang baru?
                <a href="frmGudang.php?kondisi=rekam" class="alert-link">Tambah Baru</a>.
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    Daftar Data Gudang
                </div>
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Gudang</th>
                                    <th>Keterangan</th>
                                    <th>Jenis</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $i= 0;
                                $lihatdata= "SELECT * FROM gudang";
                                $sql= mysqli_query($con,$lihatdata);

                                if($sql === FALSE) { 
                                    die(mysqli_error($con)); // TODO: better error handling
                                }
                                while ($row= mysqli_fetch_array($sql)) {
                                $i++;
                                $id= $row['kd_gudang'];


                                echo "
                                <tr class='odd gradeX'>
                                    <td>".$i."</td>
                                    <td>".$row['nm_gudang']."</td>
                                    <td>".$row['keterangan']."</td>
                                    <td>".$row['jenis']."</td>
                                    <td class='center'>
                                        <a class='btn btn-info btn-circle' href='frmGudang.php?kondisi=ubah&id=".$row['kd_gudang']."'>
                                            <i class='fa fa-edit'></i>
                                        </a>
                                        <a class='btn btn-info btn-circle' href='delete.php?modul=gudang&id=$id'>
                                            <i class='fa fa-trash'></i>
                                        </a>
                                    </td>
                                </tr>";
                                }
                            ?>
                            </tbody>
                        </table>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>