<!-- Modal -->
<div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('customer/updatedata', ['class' => 'formcustomer']) ?>
            <?= csrf_field(); ?>
            <input type="hidden" value="<?= $id_cust ?>" name="id_cust">
            <div class="modal-body">
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Nama customer</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="nama_cust" name="nama_cust" value="<?= $nama_cust ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Alamat customer</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="alamat_cust" name="alamat_cust" value="<?= $alamat_cust; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Telepon customer</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="telp_cust" name="telp_cust" value="<?= $telp_cust ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Jabatan customer</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="jabatan_cust" name="jabatan_cust" value="<?= $jabatan_cust ?>">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btnsimpan">Update</button>
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
                $('.btnsimpan').html('Update');
            },
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: response.sukses
                })

                $('#modaledit').modal('hide');
                datacustomer();
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