<script>

function filter() {
    var base_url = $('#baseurl').val();
    var tahun = $('#thn').val();
    var bulan = $('#bln').val() == '' ? 'Semua' : $('#bln').val();
    
    loadingklik();
    window.location.href = base_url + "LapPembiayaan/index/" + bulan + "/" + tahun;
}

function print() {
    var base_url = $('#baseurl').val();
    var tahun = $('#thn').val();
    var bulan = $('#bln').val() == '' ? 'Semua' : $('#bln').val();
    
    window.open(base_url + "LapPembiayaan/print/" + bulan + "/" + tahun);
}

function jan() {
    resetOptBulan();
    $('#bulan').text('Januari');
    $('#bln').val('January');
    $('#jan').addClass("active");
    getPembiayaan();
}

function feb() {
    resetOptBulan();
    $('#bulan').text('Februari');
    $('#bln').val('February');
    $('#feb').addClass("active");
    getPembiayaan();
}

function mart() {
    resetOptBulan();
    $('#bulan').text('Maret');
    $('#bln').val('March');
    $('#mart').addClass("active");
    getPembiayaan();
}

function apr() {
    resetOptBulan();
    $('#bulan').text('April');
    $('#bln').val('April');
    $('#apr').addClass("active");
    getPembiayaan();
}

function may() {
    resetOptBulan();
    $('#bulan').text('Mei');
    $('#bln').val('May');
    $('#may').addClass("active");
    getPembiayaan();
}

function jun() {
    resetOptBulan();
    $('#bulan').text('Juni');
    $('#bln').val('June');
    $('#jun').addClass("active");
    getPembiayaan();
}

function jul() {
    resetOptBulan();
    $('#bulan').text('Juli');
    $('#bln').val('July');
    $('#jul').addClass("active");
    getPembiayaan();
}

function agus() {
    resetOptBulan();
    $('#bulan').text('Agustus');
    $('#bln').val('August');
    $('#agus').addClass("active");
    getPembiayaan();
}

function sep() {
    resetOptBulan();
    $('#bulan').text('September');
    $('#bln').val('September');
    $('#sep').addClass("active");
    getPembiayaan();
}

function oct() {
    resetOptBulan();
    $('#bulan').text('Oktober');
    $('#bln').val('October');
    $('#oct').addClass("active");
    getPembiayaan();
}

function nov() {
    resetOptBulan();
    $('#bulan').text('November');
    $('#bln').val('November');
    $('#nov').addClass("active");
    getPembiayaan();
}

function dec() {
    resetOptBulan();
    $('#bulan').text('Desember');
    $('#bln').val('December');
    $('#dec').addClass("active");
    getPembiayaan();
}

function tya(tahun) {
    resetOptTahun();
    $("#tahun").html(tahun);
    $('#thn').val(tahun);
    $('#tya').addClass("active");
    getPembiayaan();
}

function py(tahun) {
    resetOptTahun();
    $("#tahun").html(tahun);
    $('#thn').val(tahun);
    $('#py').addClass("active");
    getPembiayaan();
}

function yn(tahun) {
    resetOptTahun();
    $("#tahun").html(tahun);
    $('#thn').val(tahun);
    $('#yn').addClass("active");
    getPembiayaan();
}

function reset() {
    resetOptBulan();
    $('#bulan').text('Pilih Bulan');
    getPembiayaan();
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