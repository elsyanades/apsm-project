<?= form_open('customer/simpandatabanyak', ['class' => 'formsimpanbanyak']) ?>
<?= csrf_field(); ?>
<p>
    <button type="button" class="btn btn-warning btnkembali">
        Kembali
    </button>

    <button type="submit" class="btn btn-primary btnsimpanbanyak">
        Simpan Data
    </button>
</p>
<table class="table table-sm table-bordered">
    <thead>
        <tr>
            <th>Nama customer</th>
            <th>Alamat customer</th>
            <th>Telepon customer</th>
            <th>Jabatan customer</th>
            <th>#</th>
        </tr>
    </thead>

    <tbody class="formtambah">
        <tr>
            <td>
            <input type="hidden" name="id_cust[]" class="form-control">
            <input type="text" name="nama_cust[]" class="form-control">
            </td>
            <td>
                <input type="text" name="alamat_cust[]" class="form-control">
            </td>
            <td>
                <input type="text" name="telp_cust[]" class="form-control">
            </td>
            <td>
                <input type="text" name="jabatan_cust[]" class="form-control">
            </td>
            <td>
                <button type="button" class="btn btn-primary btnaddform">
                    <i class="fa fa-plus"></i>
                </button>
            </td>
        </tr>
    </tbody>
</table>
<?= form_close(); ?>
<script>
$(document).ready(function(e) {

    $('.formsimpanbanyak').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function() {
                $('.btnsimpanbanyak').attr('disable', 'disabled');
                $('.btnsimpanbanyak').html('<i class="fa fa-spin fa-spinner"></i>');
            },
            complete: function() {
                $('.btnsimpanbanyak').removeAttr('disable');
                $('.btnsimpanbanyak').html('Simpan');
            },
            success: function(response) {
                if (response.sukses) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        html: `${response.sukses}`,
                    }).then((result) => {
                        if (result.value) {
                            window.location.href = (
                                "<?= site_url('customer/index') ?>");
                        }
                    });

                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" +
                    thrownError);
            }
        });
        return false;
    });

    $('.btnaddform').click(function(e) {
        e.preventDefault();

        $('.formtambah').append(`
        <tr>
            <td>
            <input type="hidden" name="id_cust[]" class="form-control">
                <input type="text" name="nama_cust[]" class="form-control">
            </td>
            <td>
                <input type="text" name="alamat_cust[]" class="form-control">
            </td>
            <td>
                <input type="text" name="telp_cust[]" class="form-control">
            </td>
            <td>
                <input type="text" name="jabatan_cust[]" class="form-control">
            </td>
            <td>
                <button type="button" class="btn btn-danger btnhapusform">
                    <i class="fa fa-trash"></i>
                </button>
            </td>
        </tr>
        `);
    });
    $('.btnkembali').click(function(e) {
        e.preventDefault();

        datacustomer();
    });
});

$(document).on('click', '.btnhapusform', function(e) {
    e.preventDefault();

    $(this).parents('tr').remove();
});
</script>