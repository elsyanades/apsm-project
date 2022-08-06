<!-- Modal -->
<div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Marketing Retail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('marketing/simpandata', ['class' => 'formmarketing']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="" class="col-sm-5 col-form-label">No Order</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="no_order" name="no_order">
                        <div class="invalid-feedback errorNoOrder">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-5 col-form-label">Tanggal Order</label>
                    <div class="col-sm-6">
                    <input type="date" class="form-control" id="tgl_order" name="tgl_order" value="<?= date('Y-m-d');?>">
                    <div class="invalid-feedback errorTgl">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-5 col-form-label">Nama Customer</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="nama_cust" name="nama_cust">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-5 col-form-label">Kota Tujuan</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="kota_tujuan" name="kota_tujuan">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-5 col-form-label">Nama Vendor</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="nama_vendor" name="nama_vendor">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-5 col-form-label">Nama Handling</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="nama_handling" name="nama_handling">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-5 col-form-label">Status Marketing Retail</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="status_marketing" name="status_marketing">
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btnsimpan">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

            <?= form_close() ?>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('.formmarketing').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function() {
                $('.btnsimpan').attr('disable', 'disabled');
                $('.btnsimpan').html('<i class="fa fa-spin fa-spinner"></i>');
            },
            complete: function() {
                $('.btnsimpan').removeAttr('disable');
                $('.btnsimpan').html('Simpan');
            },
            success: function(response) {
                if (response.error) {
                    if (response.error.no_order) {
                        $('#no_order').addClass('is-invalid');
                        $('.errorNoOrder').html(response.error.no_order);
                    } else {
                        $('#no_order').removeClass('is-invalid');
                        $('.errorNoOrder').html('');
                    }

                    if (response.error.tgl_order) {
                        $('#tgl_order').addClass('is-invalid');
                        $('.errorTgl').html(response.error.tgl_order);
                    } else {
                        $('#tgl_order').removeClass('is-invalid');
                        $('.errorTgl').html('');
                    }
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: response.sukses
                    })

                    $('#modaltambah').modal('hide');
                    datamarketing();
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" +
                    thrownError);
            }
        });
        return false;
    });
});
</script>