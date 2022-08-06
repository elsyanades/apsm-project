<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?>
<title>APSM | Data Marketing Retail</title>
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
    </div>
</div>

<div class="col-sm-12">
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Marketing Retail</h4>
            </div>
            <div class="card-body">
            <div class="card-title">
                <button type="button" class="btn btn-primary btn-sm tomboltambah">
                    <i class="fa fa-plus-circle"></i> Tambah Data
                </button>
                <!-- <button type="button" class="btn btn-info btn-sm tomboltambahbanyak">
                    <i class="fa fa-plus-circle"></i> Tambah Data Banyak
                </button> -->
            </div>

            <p class="card-text viewdata"> </p>

            </div>
        </div>
    </section>
</div>
<div class="col-sm-12">
    <div class="page-title-box">
</div>
</div>
<div class="viewmodal" style="display: none;"></div>
<script>
function datamarketing() {
    $.ajax({
        url: "<?= site_url('marketing/ambildata') ?>",
        dataType: "json",
        success: function(response) {
            $('.viewdata').html(response.data);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + "\n" + xhr.responseText + "\n" +
                thrownError);
        }
    });
}
$(document).ready(function() {
    datamarketing();

    $('.tomboltambah').click(function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?= site_url('marketing/formtambah') ?>",
            dataType: "json",
            success: function(response) {
                $('.viewmodal').html(response.data).show();

                $('#modaltambah').modal('show');
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" +
                    thrownError);
            }
        });
    });

    $('.tomboltambahbanyak').click(function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?= site_url('marketing/formtambahbanyak') ?>",
            dataType: "json",
            beforeSend: function() {
                $('.viewdata').html('<i class="fa fa-spin fa-spinner"></i>')
            },
            success: function(response) {
                $('.viewdata').html(response.data).show();
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" +
                    thrownError);
            }
        });
    });
});
</script>
<?= $this->endSection() ?>