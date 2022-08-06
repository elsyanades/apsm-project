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
            <?= form_open('monitoringcs/updatedata', ['class' => 'formmonitoringcs']) ?>
            <?= csrf_field(); ?>
            <input type="hidden" value="<?= $id?>" name="id">
            <div class="modal-body">
                <div class="form-group row">
                    <label for="" class="col-sm-5 col-form-label">No Order</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="no_order" name="no_order" value="<?= $no_order ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-5 col-form-label">Status Barang Ke Vendor</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="status_barang_ke_vendor" name="status_barang_ke_vendor" value="<?= $status_barang_ke_vendor ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-5 col-form-label">Status Barang Ke Handling</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="status_barang_handling" name="status_barang_handling" value="<?= $status_barang_handling ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-5 col-form-label">Status Barang sudah diterima</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="status_barang_sudah_diterima" name="status_barang_sudah_diterima" value="<?= $status_barang_sudah_diterima ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-5 col-form-label">Update Status ke Customer</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="update_status_ke_customer" name="update_status_ke_customer" value="<?= $update_status_ke_customer ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-5 col-form-label">Status Surat Jalan Kembali</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="status_surat_jalan_kembali" name="status_surat_jalan_kembali" value="<?= $status_surat_jalan_kembali ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-5 col-form-label">Dokumentasi Barang diterima</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="upload_dokumen" name="upload_dokumen" value="<?= $upload_dokumen ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-5 col-form-label">Status Monitoring</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="status_monitoring_cs" name="status_monitoring_cs" value="<?= $status_monitoring_cs ?>">
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
    $('.formmonitoringcs').submit(function(e) {
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
                datamonitoringcs();
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