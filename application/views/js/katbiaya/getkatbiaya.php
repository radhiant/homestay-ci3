<script>
function pesan(judul, status) {
    swal.fire({
        title: judul,
        icon: status,
        confirmButtonColor: '#6777ef',
    });
}

function konfirmasi(id) {
    var base_url = $('#baseurl').val();

    swal.fire({
        title: "Hapus Data ini?",
        icon: "warning",
        closeOnClickOutside: false,
        showCancelButton: true,
        confirmButtonText: 'Iya',
        confirmButtonColor: '#6777ef',
        cancelButtonText: 'Batal',
        cancelButtonColor: '#d33',
    }).then((result) => {
        if (result.value) {
            loadingklik();
            window.location.href = base_url + "Katbiaya/proses_hapus/" + id;
        }
    });

}

function hapusAll() {
    var base_url = $('#baseurl').val();

    swal.fire({
        title: "Yakin hapus semua?",
        icon: "warning",
        closeOnClickOutside: false,
        showCancelButton: true,
        confirmButtonText: 'Iya',
        confirmButtonColor: '#6777ef',
        cancelButtonText: 'Batal',
        cancelButtonColor: '#d33',
    }).then((result) => {
        if (result.value) {
            loadingklik();
            window.location.href = base_url + "Katbiaya/hapus_all";
        }
    });

}

function hapusSelected() {
    var base_url = $('#baseurl').val();

    swal.fire({
        title: "Yakin dihapus?",
        icon: "warning",
        closeOnClickOutside: false,
        showCancelButton: true,
        confirmButtonText: 'Iya',
        confirmButtonColor: '#6777ef',
        cancelButtonText: 'Batal',
        cancelButtonColor: '#d33',
    }).then((result) => {
        if (result.value) {
            loadingklik();
            $('#formHapus').submit();
        }
    });

}

function getKatbiaya(id) {
    disable();
    var link = $('#baseurl').val();
    var base_url = link + 'Katbiaya/getData';

    $.ajax({
        type: 'POST',
        data: 'id=' + id,
        url: base_url,
        dataType: 'json',
        success: function(hasil) {
            $('#idkatbiaya').val(hasil[0].katbiaya_id);
            $('#namaK').val(hasil[0].katbiaya_nama);
            $('#ket').val(hasil[0].katbiaya_ket);
            enable();
        }
    });
}



var table;
$(document).ready(function() {

    //datatables
    table = $('#table-1').DataTable({

        "processing": true,
        "serverSide": true,
        "info": true,
        "order": [],
        "lengthMenu": [
            [5, 10, 25, 50, 100],
            [5, 10, 25, 50, 100]
        ],
        "pageLength": 10,

        lengthChange: true,

        dom: 'Bfrtip',

        "language": {
            search: '<a class="btn btn-primary btn-sm btn-circle"><i class="fas fa-search aria-hidden="true""></i></a>',
            searchPlaceholder: 'Search...'
        },

        buttons: [{
                extend: 'pageLength',
                className: 'btn btn-info shadow rounded-pill ml-2 mt-2 mb-2',
                titleAttr: 'Page Length',

            },

            {
                extend: 'pdfHtml5',
                className: 'btn-danger shadow rounded-pill ml-2 mt-2 mb-2',
                text: '<i class="far fa-file-pdf"></i> PDF',
                titleAttr: 'PDF',
                customize: function(doc) {
                    doc.styles.tableHeader.alignment = 'left';
                    doc.content[1].table.widths =
                        Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                },
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excelHtml5',
                className: 'btn-success shadow rounded-pill ml-2 mt-2 mb-2',
                text: '<i class="far fa-file-excel"></i> Excel',
                titleAttr: 'Excel',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'print',
                className: 'btn btn-bluee shadow rounded-pill ml-2 mt-2 mb-2',
                text: '<i class="fas fa-print"></i> Print',
                titleAttr: 'Print',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                text: '<i class="fas fa-trash"></i> Hapus Semua',
                className: 'btn-danger shadow rounded-pill ml-2 mt-2 mb-2',
                titleAttr: 'Hapus Semua',
                action: function(e, dt, node, config) {
                    hapusAll();
                }
            },
            {
                text: '<i class="fas fa-trash"></i> Hapus yg terpilih',
                className: 'btn-secondary disabled shadow rounded-pill hapus ml-2 mt-2 mb-2',
                action: function(e, dt, node, config) {
                    hapusSelected();
                }

            },
            {
                extend: 'colvis',
                className: 'btn-info shadow rounded-pill ml-2 d-inline mt-2 mb-2',
                text: 'Hide Column',
                titleAttr: 'Hide',

            },


        ],

        "ajax": {
            "url": "<?php echo site_url('Katbiaya/getDataKatbiaya')?>",
            "type": "POST"
        },



        "columnDefs": [{
                "targets": [5],
                "orderable": false,
            },
            {
                "targets": [0],
                "orderable": false,
            },
        ],

        "drawCallback": function() {
            $('.dataTables_paginate > .pagination a').addClass('rounded-pill ml-1 mr-1 shadow');
        }

    });

    $('div.dataTables_filter input').addClass('mr-2 shadow rounded-pill');
    $('div.dataTables_filter').addClass('mt-3');
    $('div.dataTables_info').addClass('ml-2');
    $('div.dataTables_paginate').addClass('mr-1 mb-4');
    $('div.dt-buttons ').addClass('mt-2');



});

function validateHapus() {
    var check = $('#table-1').find('input[type=checkbox]:checked').length;
    if (check > 0) {
        return true;
    } else {
        validasi('Pilih yg akan dihapus!', 'warning');
        return false;
    }
}

function checkAll(ele) {
    var checkboxes = document.getElementsByTagName('input');

    if (ele.checked) {
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].type == 'checkbox') {
                checkboxes[i].checked = true;
            }
            check();
        }
    } else {
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].type == 'checkbox') {
                checkboxes[i].checked = false;
            }
            check();
        }
    }
}

function check() {
    var checkboxes = $('input[name="chkbox[]"]');
    var checkLength = $('input[name="chkbox[]"]:checked');

    if (checkLength.length != '') {
        $('.hapus').removeClass('btn-secondary disabled');
        $('.hapus').addClass('btn-danger');
    } else {
        $('.hapus').removeClass('btn-danger');
        $('.hapus').addClass('btn-secondary disabled');
    }

    if (checkLength.length == checkboxes.length) {
        $('#cbx').prop('checked', true);
    } else {
        $('#cbx').prop('checked', false);
    };


}


function validasi(judul, status) {
    swal.fire({
        title: judul,
        icon: status,
        confirmButtonColor: '#4e73df',
    });
}
</script>