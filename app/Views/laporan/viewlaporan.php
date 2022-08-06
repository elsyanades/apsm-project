<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?>
<title>APSM | Laporan </title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
        <!-- DataTables -->
        <link href="<?=base_url()?>/template/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>/template/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url()?>/template/assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <script src="<?=base_url()?>/template/assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?=base_url()?>/template/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="<?=base_url()?>/template/assets/plugins/datatables/dataTables.responsive.min.js"></script>  
        <script src="<?=base_url()?>/template/assets/plugins/datatables/responsive.bootstrap4.min.js"></script>  
        <script src="<?=base_url()?>/template/assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="<?=base_url()?>/template/assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
        <script src="<?=base_url()?>/template/assets/plugins/datatables/jszip.min.js"></script>
        <script src="<?=base_url()?>/template/assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="<?=base_url()?>/template/assets/plugins/datatables/vfs_fonts.js"></script>
        <script src="<?=base_url()?>/template/assets/plugins/datatables/buttons.html5.min.js"></script>
        <script src="<?=base_url()?>/template/assets/plugins/datatables/buttons.print.min.js"></script>
        <script src="<?=base_url()?>/template/assets/plugins/datatables/buttons.colVis.min.js"></script>

        <div class="col-sm-12">
    <div class="page-title-box">
        <h4 class="page-title">Cetak Laporan</h4>
    </div>
</div>

<div class="col-sm-12">
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">List Laporan </h4>
            </div>
            <div class="card-body">
                <?php echo form_open('Laporan') ?>
                <?= csrf_field(); ?>
                <div class="container align-items-center">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="inputMulaiTanggal" class="font-weight-bold">Mulai Tanggal :</label>
                                <input type="date" id="inputMulaiTanggal" name="mulai_tanggal" class="form-control" name="mulai_tanggal" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="inputSampaiTanggal" class="font-weight-bold">Sampai Tanggal :</label>
                                <input type="date" id="inputSampaiTanggal" name="sampai_tanggal" class="form-control" name="sampai_tanggal" required>
                            </div>
                        </div>
                        <div class="container text-center">
                            <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Find</button>
                            <a href="<?= base_url('laporan/print_report'); ?>" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Print</a>
                        </div>
                    </div>
                </div>
                <?php echo form_close()?>
                <br>
                <table id="laporan" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center" width="20px">No</th>
                            <th class="text-center">No Order</th>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">Nama Customer</th>
                            <th class="text-center">Nama Vendor</th>
                            <th class="text-center">Kota Tujuan</th>
                            <th class="text-center">No Surat Jalan</th>
                            <th class="text-center">Status Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        <?php foreach ($view_report as $key => $value) { ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td class="text-center"><?= $value['no_order']; ?></td>
                                <td class="text-center"><?= date('d/m/Y', strtotime($value["tgl_order"])); ?></td>
                                <td class="text-center"><?= $value['nama_cust']; ?></td>
                                <td class="text-center"><?= $value['nama_vendor']; ?></td>
                                <td class="text-center"><?= $value['kota_tujuan']; ?></td>
                                <td class="text-center"><?= $value['no_surat_jalan']; ?></td>
                                <td class="text-center"><?= $value['status_pembayaran']; ?></td>
                            </tr>
                        <?php }; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
<script>
 var table = $('#laporan').DataTable({
        responsive: true,
        buttons: ['copy', 'excel', 'pdf', 'print'],
        initComplete: function () {
                table.buttons().container()
                    .appendTo( $('.col-md-6:eq(0)', table.table().container() ) );
            }
    });
</script>
<?= $this->endSection() ?>