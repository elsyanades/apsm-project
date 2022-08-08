<?= form_open('monitoringcs/hapusbanyak', ['class' => 'formhapusbanyak']) ?>
<p>
    <!-- <button type="submit" class="btn btn-danger">
        <i class="fa fa-trash-o"></i> Hapus Banyak
    </button> -->
</p>
<table class="table table-bordered table-striped" cellspacing="0" width="100%" id="datamonitoringcs">
    <thead>
        <tr>
            <!-- <th>
                <input type="checkbox" id="centangSemua">
            </th> -->
            <th>No</th>
            <th>Nomor Order</th>
            <th>Status Barang Ke Vendor</th>
            <th>Status Barang Ke Handling</th>
            <th>Status Barang sudah diterima</th>
            <th>Update Status ke Customer</th>
            <th>Status Surat Jalan Kembali</th>
            <th>Dokumentasi Barang diterima</th>
            <th>Status Monitoring</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>

    </tbody>

</table>
<?= form_close(); ?>
<script>
function listdatamonitoringcs() {
    var table = $('#datamonitoringcs').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            url: "<?= site_url('monitoringcs/listdata') ?>",
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
                "targets": 8,
                "orderable": false,
            }
        ],
        responsive: true,
        buttons: ['copy', 'excel', 'pdf', 'print'],
        initComplete: function () {
                table.buttons().container()
                    .appendTo( $('.col-md-6:eq(0)', table.table().container() ) );
            }
    });
}
$(document).ready(function() {
    // $('#datamahasiswa').DataTable();
    listdatamonitoringcs();

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
                text: `Yakin data monitoringcs dihapus sebanyak ${jmldata.length} data ?`,
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
                                datamonitoringcs();
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

function edit(id) {
    $.ajax({
        type: "post",
        url: "<?= site_url('monitoringcs/formedit') ?>",
        data: {
            id: id
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

function hapus(id) {
    Swal.fire({
        title: 'Hapus',
        text: `Yakin menghapus data monitoring cs ini ?`,
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
                url: "<?= site_url('monitoringcs/hapus') ?>",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(response) {
                    if (response.sukses) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.sukses,
                        });
                        datamonitoringcs();
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

function upload(id) {
    $.ajax({
        type: "post",
        url: "<?= site_url('monitoringcs/formupload') ?>",
        data: {
            id: id
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