<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?>
<title>APSM | Data User</title>
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
        
<div class="col-sm-12">
    <div class="page-title-box">
    </div>
</div>

<div class="col-sm-12">
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data User</h4>
            </div>
            <div class="card-body">

                <button type="button" class="btn btn-primary btn-sm tomboltambah">
                    <i class="fa fa-plus-circle"></i> Tambah Data
                </button>
                <!-- <button type="button" class="btn btn-info btn-sm tomboltambahbanyak">
                    <i class="fa fa-plus-circle"></i> Tambah Data Banyak
                </button> -->
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
function datauser() {
    $.ajax({
        url: "<?= site_url('user/ambildata') ?>",
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
    datauser();

    $('.tomboltambah').click(function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?= site_url('user/formtambah') ?>",
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
            url: "<?= site_url('user/formtambahbanyak') ?>",
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