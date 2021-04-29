<script>

function filter() {
    var base_url = $('#baseurl').val();
    var tahun = $('#thn').val();
    var bulan = $('#bln').val() == '' ? 'Semua' : $('#bln').val();
    
    loadingklik();
    window.location.href = base_url + "LapPendapatan/index/" + bulan + "/" + tahun;
}

function print() {
    var base_url = $('#baseurl').val();
    var tahun = $('#thn').val();
    var bulan = $('#bln').val() == '' ? 'Semua' : $('#bln').val();
    
    window.open(base_url + "LapPendapatan/print/" + bulan + "/" + tahun);
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




</script>