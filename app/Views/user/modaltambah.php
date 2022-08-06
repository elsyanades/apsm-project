<!-- Modal -->
<div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('user/simpandata', ['class' => 'formuser']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Nama User</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="nama_user" name="nama_user">
                        <div class="invalid-feedback errorNama">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Username</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="username" name="username">
                        <div class="invalid-feedback errorUsername">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Email User</label>
                    <div class="col-sm-6">
                        <input type="email" class="form-control" id="email_user" name="email_user">
                        <div class="invalid-feedback errorEmail">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Password</label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" id="password_user" name="password_user">
                        <div class="invalid-feedback errorPass">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Level</label>
                    <div class="col-sm-6">
                        <select name="userlevelid" id="userlevelid" class="form-control">
                            <option value="">-Pilih-</option>
                            <option value="1">Superuser</option>
                            <option value="2">Marketing</option>
                            <option value="3">Staff OPS</option>
                            <option value="4">Kepala OPS</option>
                            <option value="5">Monitoring CS</option>
                            <option value="6">Admin</option>
                        </select>
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
    $('.formuser').submit(function(e) {
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
                    if (response.error.nama_user) {
                        $('#nama_user').addClass('is-invalid');
                        $('.errorNama').html(response.error.nama_user);
                    } else {
                        $('#nama_user').removeClass('is-invalid');
                        $('.errorNama').html('');
                    }
                    if (response.error.username) {
                        $('#username').addClass('is-invalid');
                        $('.errorUsername').html(response.error.username);
                    } else {
                        $('#username').removeClass('is-invalid');
                        $('.errorUsername').html('');
                    }

                    if (response.error.email_user) {
                        $('#email_user').addClass('is-invalid');
                        $('.errorEmail').html(response.error.email_user);
                    } else {
                        $('#email_user').removeClass('is-invalid');
                        $('.errorEmail').html('');
                    }

                    if (response.error.password_user) {
                        $('#password_user').addClass('is-invalid');
                        $('.errorPass').html(response.error.password_user);
                    } else {
                        $('#password_user').removeClass('is-invalid');
                        $('.errorPass').html('');
                    }
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: response.sukses
                    })

                    $('#modaltambah').modal('hide');
                    datauser();
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