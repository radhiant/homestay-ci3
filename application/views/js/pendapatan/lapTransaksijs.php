<script>
var table;
$(document).ready(function() {

    filterPembayaran = $('#pmbyrn').val();

    //datatables
    table = $('#table-1').DataTable({

        // "processing": true,
        // "serverSide": true,
        "info": false,
        "order": [],
        // "lengthMenu": [
        //     [5, 10, 25, 50, 100],
        //     [5, 10, 25, 50, 100]
        // ],
        // "pageLength": 10,

        "bLengthChange": false,
        "pageLength": -1,
        "lengthMenu": false,
        "paging": false,

        dom: 'Bfrtip',

        "language": {
            search: '<a class="btn btn-primary btn-sm btn-circle"><i class="fas fa-search aria-hidden="true""></i></a>',
            searchPlaceholder: 'Search...'
        },

        scrollX: true,
        scrollY: "500px",
        // scrollCollapse: true,
        // paging:         false,
        // fixedColumns:   {
        //     heightMatch: 'none',
        //     leftColumns: 2,
        // },

        "initComplete": function(settings, json) {
            $('body').find('.dataTables_scrollBody').addClass("scrollbar");
        },

        buttons: [{
            extend: 'collection',
            text: filterPembayaran == 'semua_pembayaran' ? 'Filter Pembayaran' :
                capitalizeFirstLetter(filterPembayaran),
            className: 'btn btn-success shadow rounded-pill ml-3 mt-2 mb-2 position-absolute',
            buttons: [

                {
                    text: 'Semua',
                    className: 'buttonsToHide',
                    action: function(e, dt, node, config) {
                        Fsemua();
                    }
                },
                {
                    text: 'Tunai',
                    action: function(e, dt, node, config) {
                        Ftunai();
                    }
                },
                {
                    text: 'Aplikasi',
                    action: function(e, dt, node, config) {
                        Faplikasi();
                    }
                },
                {
                    text: 'Transfer',
                    action: function(e, dt, node, config) {
                        Ftransfer();
                    }
                }
            ]
        }],


        "drawCallback": function() {
            $('.dataTables_paginate > .pagination a').addClass(
                'rounded-pill ml-1 mr-1 mt-2 shadow');
        }

    });

    $('div.dataTables_filter input').addClass('mr-2 shadow rounded-pill');
    $('div.dataTables_filter').addClass('mt-1 mb-2');
    $('div.dataTables_info').addClass('ml-2');
    $('div.dataTables_paginate').addClass('mr-1 mb-4');
    $('div.dt-buttons ').addClass('mt-2');

    if (filterPembayaran == 'semua_pembayaran') {
        table.buttons('.buttonsToHide').nodes().addClass('hidden');
    }


});

function filter() {
    var base_url = $('#baseurl').val();
    var tahun = $('#thn').val();
    var bulan = $('#bln').val() == '' ? 'Semua' : $('#bln').val();
    var pmbyrn = $('#pmbyrn').val() == '' ? 'semua_pembayaran' : $('#pmbyrn').val();

    loadingklik();
    window.location.href = base_url + "LapTransaksi/index/" + bulan + "/" + tahun + "/" + pmbyrn;
}

function Ftunai() {
    var base_url = $('#baseurl').val();
    var tahun = $('#thn').val();
    var bulan = $('#bln').val() == '' ? 'Semua' : $('#bln').val();

    loadingklik();
    window.location.href = base_url + "LapTransaksi/index/" + bulan + "/" + tahun + "/" + 'tunai';
}

function Faplikasi() {
    var base_url = $('#baseurl').val();
    var tahun = $('#thn').val();
    var bulan = $('#bln').val() == '' ? 'Semua' : $('#bln').val();

    loadingklik();
    window.location.href = base_url + "LapTransaksi/index/" + bulan + "/" + tahun + "/" + 'aplikasi';
}

function Ftransfer() {
    var base_url = $('#baseurl').val();
    var tahun = $('#thn').val();
    var bulan = $('#bln').val() == '' ? 'Semua' : $('#bln').val();

    loadingklik();
    window.location.href = base_url + "LapTransaksi/index/" + bulan + "/" + tahun + "/" + 'transfer';
}

function Fsemua() {
    var base_url = $('#baseurl').val();
    var tahun = $('#thn').val();
    var bulan = $('#bln').val() == '' ? 'Semua' : $('#bln').val();

    loadingklik();
    window.location.href = base_url + "LapTransaksi/index/" + bulan + "/" + tahun + "/" + 'semua_pembayaran';
}


function print() {
    var base_url = $('#baseurl').val();
    var tahun = $('#thn').val();
    var bulan = $('#bln').val() == '' ? 'Semua' : $('#bln').val();
    var pmbyrn = $('#pmbyrn').val() == '' ? 'semua_pembayaran' : $('#pmbyrn').val();

    window.open(base_url + "LapTransaksi/print/" + bulan + "/" + tahun + "/" + pmbyrn);
}

function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}


function jan() {
    resetOptBulan();
    $('#bulan').text('Januari');
    $('#bln').val('January');
    $('#jan').addClass("active");
    getPendapatan();
}

function feb() {
    resetOptBulan();
    $('#bulan').text('Februari');
    $('#bln').val('February');
    $('#feb').addClass("active");
    getPendapatan();
}

function mart() {
    resetOptBulan();
    $('#bulan').text('Maret');
    $('#bln').val('March');
    $('#mart').addClass("active");
    getPendapatan();
}

function apr() {
    resetOptBulan();
    $('#bulan').text('April');
    $('#bln').val('April');
    $('#apr').addClass("active");
    getPendapatan();
}

function may() {
    resetOptBulan();
    $('#bulan').text('Mei');
    $('#bln').val('May');
    $('#may').addClass("active");
    getPendapatan();
}

function jun() {
    resetOptBulan();
    $('#bulan').text('Juni');
    $('#bln').val('June');
    $('#jun').addClass("active");
    getPendapatan();
}

function jul() {
    resetOptBulan();
    $('#bulan').text('Juli');
    $('#bln').val('July');
    $('#jul').addClass("active");
    getPendapatan();
}

function agus() {
    resetOptBulan();
    $('#bulan').text('Agustus');
    $('#bln').val('August');
    $('#agus').addClass("active");
    getPendapatan();
}

function sep() {
    resetOptBulan();
    $('#bulan').text('September');
    $('#bln').val('September');
    $('#sep').addClass("active");
    getPendapatan();
}

function oct() {
    resetOptBulan();
    $('#bulan').text('Oktober');
    $('#bln').val('October');
    $('#oct').addClass("active");
    getPendapatan();
}

function nov() {
    resetOptBulan();
    $('#bulan').text('November');
    $('#bln').val('November');
    $('#nov').addClass("active");
    getPendapatan();
}

function dec() {
    resetOptBulan();
    $('#bulan').text('Desember');
    $('#bln').val('December');
    $('#dec').addClass("active");
    getPendapatan();
}

function tya(tahun) {
    resetOptTahun();
    $("#tahun").html(tahun);
    $('#thn').val(tahun);
    $('#tya').addClass("active");
    getPendapatan();
}

function py(tahun) {
    resetOptTahun();
    $("#tahun").html(tahun);
    $('#thn').val(tahun);
    $('#py').addClass("active");
    getPendapatan();
}

function yn(tahun) {
    resetOptTahun();
    $("#tahun").html(tahun);
    $('#thn').val(tahun);
    $('#yn').addClass("active");
    getPendapatan();
}

function reset() {
    resetOptBulan();
    $('#bulan').text('Pilih Bulan');
    getPendapatan();
}

function resetOptBulan() {
    $("#jan").removeClass("active");
    $("#feb").removeClass("active");
    $("#mart").removeClass("active");
    $("#apr").removeClass("active");
    $("#may").removeClass("active");
    $("#jun").removeClass("active");
    $("#jul").removeClass("active");
    $("#agus").removeClass("active");
    $("#sep").removeClass("active");
    $("#oct").removeClass("active");
    $("#nov").removeClass("active");
    $("#dec").removeClass("active");
    $('#bln').val('');
}


function tya(tahun) {
    resetOptTahun();
    $("#tahun").html(tahun);
    $('#thn').val(tahun);
    $('#tya').addClass("active");
}

function py(tahun) {
    resetOptTahun();
    $("#tahun").html(tahun);
    $('#thn').val(tahun);
    $('#py').addClass("active");
}

function yn(tahun) {
    resetOptTahun();
    $("#tahun").html(tahun);
    $('#thn').val(tahun);
    $('#yn').addClass("active");
}


function resetOptTahun() {
    $("#tya").removeClass("active");
    $("#py").removeClass("active");
    $("#yn").removeClass("active");
    $('#thn').val('');
}

function validasi(judul, status) {
    swal.fire({
        title: judul,
        icon: status,
        confirmButtonColor: '#4e73df',
    });
}
</script>