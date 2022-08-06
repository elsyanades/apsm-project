<?= form_open('customer/hapusbanyak', ['class' => 'formhapusbanyak']) ?>
<p>
    <button type="submit" class="btn btn-danger">
        <i class="fa fa-trash-o"></i> Hapus Banyak
    </button>
</p>
<table class="table table-sm table-striped" id="datacustomer" style="width: 100%;">
    <thead>
        <tr>
            <th>
                <input type="checkbox" id="centangSemua">
            </th>
            <th>No</th>
            <th>Nama customer</th>
            <th>Alamat customer</th>
            <th>Telepon customer</th>
            <th>Jabatan customer</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>

    </tbody>

</table>
<?= form_close(); ?>
<script>
function listdatacustomer() {
    var table = $('#datacustomer').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            url: "<?= site_url('customer/listdata') ?>",
            type: "POST"
        },
        //optional
        "columnDefs": [{
                "targets": 0,
                "orderable": false,
            },
            {
                "targets": 1,
                "orderable": false,
            },
            {
                "targets": 6,
                "orderable": false,
            }
        ],
        responsive: true,
    })
}
$(document).ready(function() {
    // $('#datamahasiswa').DataTable();
    listdatacustomer();

    $('#centangSemua').click(function(e) {

        if ($(this).is(':checked')) {
            $('.centangId').prop('checked', true);
        } else {
            $('.centangId').prop('checked', false);
        }
    });

    $('.formhapusbanyak').submit(function(e) {
        e.preventDefault();
        let jmldata = $('.centangId:checked');

        if (jmldata.length === 0) {

            Swal.fire({
                icon: 'error',
                title: 'Perhatian',
                text: 'Maaf silahkan pilih data yang mau dihapus !'
            });

        } else {

            Swal.fire({
                title: 'Hapus Data Banyak',
                text: `Yakin data customer dihapus sebanyak ${jmldata.length} data ?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya,Hapus',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: "post",
                        url: $(this).attr('action'),
                        data: $(this).serialize(),
                        dataType: "json",
                        success: function(response) {
                            if (response.sukses) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: response.sukses
                                });
                                datacustomer();
                            }
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            alert(xhr.status + "\n" + xhr.responseText + "\n" +
                                thrownError);
                        }
                    });
                }


            })

        }
        return false;
    });

});

function edit(id_cust) {
    $.ajax({
        type: "post",
        url: "<?= site_url('customer/formedit') ?>",
        data: {
            id_cust: id_cust
        },
        dataType: "json",
        success: function(response) {
            if (response.sukses) {
                $('.viewmodal').html(response.sukses).show();
                $('#modaledit').modal('show');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + "\n" + xhr.responseText + "\n" +
                thrownError);
        }
    });
}

function hapus(id_cust) {
    Swal.fire({
        title: 'Hapus',
        text: `Yakin menghapus data customer ini ?`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya',
        cancelButtonText: 'tidak',
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: "post",
                url: "<?= site_url('customer/hapus') ?>",
                data: {
                    id_cust: id_cust
                },
                dataType: "json",
                success: function(response) {
                    if (response.sukses) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.sukses,
                        });
                        datacustomer();
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" +
                        thrownError);
                }
            });
        }
    })
}

function upload(id_cust) {
    $.ajax({
        type: "post",
        url: "<?= site_url('customer/formupload') ?>",
        data: {
            id_cust: id_cust
        },
        dataType: "json",
        success: function(response) {
            if (response.sukses) {
                $('.viewmodal').html(response.sukses).show();
                $('#modalupload').modal('show');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + "\n" + xhr.responseText + "\n" +
                thrownError);
        }
    });
}
</script>