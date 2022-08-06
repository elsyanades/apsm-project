<!-- Modal -->
<div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Monitoring CS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('monitoringcs/simpandata', ['class' => 'formmonitoringcs']) ?>
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
                    <label for="" class="col-sm-4 col-form-label">Status Barang Ke Vendor</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="status_barang_ke_vendor" name="status_barang_ke_vendor">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Status Barang Ke Handling</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="status_barang_handling" name="status_barang_handling">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Status Barang sudah diterima</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="status_barang_sudah_diterima" name="status_barang_sudah_diterima">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Update Status ke Customer</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="update_status_ke_customer" name="update_status_ke_customer">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Status Surat Jalan Kembali</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="status_surat_jalan_kembali" name="status_surat_jalan_kembali">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Dokumentasi Barang diterima</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="upload_dokumen" name="upload_dokumen">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Status Monitoring</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="status_monitoring_cs" name="status_monitoring_cs">
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

                    // if (response.error.telp_vendor) {
                    //     $('#telp_vendor').addClass('is-invalid');
                    //     $('.errorTelp').html(response.error.telp_vendor);
                    // } else {
                    //     $('#telp_vendor').removeClass('is-invalid');
                    //     $('.errorTelp').html('');
                    // }
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: response.sukses
                    })

                    $('#modaltambah').modal('hide');
                    datamonitoringcs();
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