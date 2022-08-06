<?= form_open('marketing/hapusbanyak', ['class' => 'formhapusbanyak']) ?>
<p>
    <!-- <button type="submit" class="btn btn-danger">
        <i class="fa fa-trash-o"></i> Hapus Banyak
    </button> -->
</p>
<table class="table table-striped table-bordered dataTable display" cellspacing="0" width="100%" id="datamarketing">
    <thead>
        <tr>
            <!-- <th>
                <input type="checkbox" id="centangSemua">
            </th> -->
            <th>No</th>
            <th>Nomor Order</th>
            <th>Tanggal Order</th>
            <th>Nama Customer</th>
            <th>Kota Tujuan</th>
            <th>Nama Vendor</th>
            <th>Nama Handling</th>
            <th>Status Marketing Retail</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>

    </tbody>

</table>
<?= form_close(); ?>
<script>
function listdatamarketing() {
    var table = $('#datamarketing').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            url: "<?= site_url('marketing/listdata') ?>",
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
                "targets": 7,
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
    listdatamarketing();

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
                text: `Yakin data marketing dihapus sebanyak ${jmldata.length} data ?`,
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
                                datamarketing();
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
        url: "<?= site_url('marketing/formedit') ?>",
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
        text: `Yakin menghapus data marketing ini ?`,
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
                url: "<?= site_url('marketing/hapus') ?>",
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
                        datamarketing();
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

// function upload(id) {
//     $.ajax({
//         type: "post",
//         url: "<?= site_url('marketing/formupload') ?>",
//         data: {
//             id: id
//         },
//         dataType: "json",
//         success: function(response) {
//             if (response.sukses) {
//                 $('.viewmodal').html(response.sukses).show();
//                 $('#modalupload').modal('show');
//             }
//         },
//         error: function(xhr, ajaxOptions, thrownError) {
//             alert(xhr.status + "\n" + xhr.responseText + "\n" +
//                 thrownError);
//         }
//     });
// }
</script>