<!-- Modal -->
<div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Marketing</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('marketing/updatedata', ['class' => 'formmarketing']) ?>
            <?= csrf_field(); ?>
            <input type="hidden" value="<?= $id?>" name="id">
            <div class="modal-body">
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">No Order</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="no_order" name="no_order" value="<?= $no_order ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Nama Customer</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="nama_cust" name="nama_cust" value="<?= $nama_cust ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Kota Tujuan</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="kota_tujuan" name="kota_tujuan" value="<?= $kota_tujuan; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Nama Vendor</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="nama_vendor" name="nama_vendor" value="<?= $nama_vendor ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Nama Handling</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="nama_handling" name="nama_handling" value="<?= $nama_handling ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Status Marketing</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="status_marketing" name="status_marketing" value="<?= $status_marketing ?>">
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
                $('.btnsimpan').html('Update');
            },
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: response.sukses
                })

                $('#modaledit').modal('hide');
                datamarketing();
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