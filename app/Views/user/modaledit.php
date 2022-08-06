<!-- Modal -->
<div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('user/updatedata', ['class' => 'formuser']) ?>
            <?= csrf_field(); ?>
            <input type="hidden" value="<?= $id_user ?>" name="id_user">
            <div class="modal-body">
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Nama user</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="nama_user" name="nama_user" value="<?= $nama_user ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Username</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="username" name="username" value="<?= $username ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Email User</label>
                    <div class="col-sm-6">
                        <input type="email" class="form-control" id="email_user" name="email_user" value="<?= $email_user; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Password</label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" id="password_user" name="password_user" value="<?= $password_user ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Level</label>
                    <div class="col-sm-6">
                        <select name="userlevelid" id="userlevelid" class="form-control">
                            <option value="1" <?php if ($userlevelid == '1') echo "selected"; ?>>Superuser</option>
                            <option value="2" <?php if ($userlevelid == '2') echo "selected"; ?>>Marketing</option>
                            <option value="3" <?php if ($userlevelid == '3') echo "selected"; ?>>Staff OPS</option>
                            <option value="4" <?php if ($userlevelid == '4') echo "selected"; ?>>Kepala OPS</option>
                            <option value="5" <?php if ($userlevelid == '5') echo "selected"; ?>>Monitoring CS</option>
                            <option value="6" <?php if ($userlevelid == '6') echo "selected"; ?>>Admin</option>
                        </select>
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
                $('.btnsimpan').html('Update');
            },
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: response.sukses
                })

                $('#modaledit').modal('hide');
                datauser();
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