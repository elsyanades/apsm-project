<!-- Modal -->
<div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Vendor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('vendors/simpandata', ['class' => 'formvendor']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Nama Vendor</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="nama_vendor" name="nama_vendor">
                        <div class="invalid-feedback errorNama">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Alamat Vendor</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="alamat_vendor" name="alamat_vendor">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Telepon Vendor</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="telp_vendor" name="telp_vendor">
                        <div class="invalid-feedback errorTelp">

                        </div>
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
    $('.formvendor').submit(function(e) {
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
                    if (response.error.nama_vendor) {
                        $('#nama_vendor').addClass('is-invalid');
                        $('.errorNama').html(response.error.nama_vendor);
                    } else {
                        $('#nama_vendor').removeClass('is-invalid');
                        $('.errorNama').html('');
                    }

                    if (response.error.telp_vendor) {
                        $('#telp_vendor').addClass('is-invalid');
                        $('.errorTelp').html(response.error.telp_vendor);
                    } else {
                        $('#telp_vendor').removeClass('is-invalid');
                        $('.errorTelp').html('');
                    }
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: response.sukses
                    })

                    $('#modaltambah').modal('hide');
                    datavendor();
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