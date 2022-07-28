<!-- Modal -->
<div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kepala OPS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('kepalaops/simpandata', ['class' => 'formkepalaops']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">No Order</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="no_order" name="no_order">
                        <div class="invalid-feedback errorNoOrder">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Jenis Armada</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="jenis_armada" name="jenis_armada">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Data Armada</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="data_armada" name="data_armada">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Staff Operasional</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="staf_ops" name="staf_ops">
                        <div class="invalid-feedback errorStaf">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Status Pickup</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="status_pickup" name="status_pickup">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Status Loading</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="status_loading" name="status_loading">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Nama Vendor</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="nama_vendor2" name="nama_vendor2">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Status Operasional</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="status_ops" name="status_ops">
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
    $('.formkepalaops').submit(function(e) {
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

                    if (response.error.staf_ops) {
                        $('#staf_ops').addClass('is-invalid');
                        $('.errorStaf').html(response.error.staf_ops);
                    } else {
                        $('#staf_ops').removeClass('is-invalid');
                        $('.errorStaf').html('');
                    }
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: response.sukses
                    })

                    $('#modaltambah').modal('hide');
                    datakepalaops();
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