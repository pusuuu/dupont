<?php include "header.php"; ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Penerimaan Supplier</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
			<div class="alert alert-success">
                Ingin menambah data penerimaan supplier baru?
                <a href="frmtrxGudangInS.php?kondisi=rekam" class="alert-link">Tambah Baru</a>.
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    Daftar Data Penerimaan Supplier
                </div>
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Supplier</th>
                                    <th>Alamat</th>
                                    <th>Telp</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<tr>
                                    <td>No.</td>
                                    <td>Nama Supplier</td>
                                    <td>Alamat</td>
                                    <td>Telp</td>
                                    <td>Aksi</td>
                                </tr>
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