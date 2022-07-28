<!-- Modal -->
<div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('customer/simpandata', ['class' => 'formcustomer']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Nama customer</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="nama_cust" name="nama_cust">
                        <div class="invalid-feedback errorNama">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Alamat customer</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="alamat_cust" name="alamat_cust">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Telepon customer</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="telp_cust" name="telp_cust">
                        <div class="invalid-feedback errorTelp">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Jabatan customer</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="jabatan_cust" name="jabatan_cust">
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
    $('.formcustomer').submit(function(e) {
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
                    if (response.error.nama_cust) {
                        $('#nama_cust').addClass('is-invalid');
                        $('.errorNama').html(response.error.nama_cust);
                    } else {
                        $('#nama_cust').removeClass('is-invalid');
                        $('.errorNama').html('');
                    }

                    if (response.error.telp_cust) {
                        $('#telp_cust').addClass('is-invalid');
                        $('.errorTelp').html(response.error.telp_cust);
                    } else {
                        $('#telp_cust').removeClass('is-invalid');
                        $('.errorTelp').html('');
                    }
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: response.sukses
                    })

                    $('#modaltambah').modal('hide');
                    datacustomer();
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