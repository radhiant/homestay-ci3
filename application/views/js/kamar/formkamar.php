<script>

var nilai = document.getElementById('nilai');
nilai.addEventListener('keyup', function(e) {
    nilai.value = formatRupiah(this.value, '');
});

var nilaiU = document.getElementById('nilaiU');
nilaiU.addEventListener('keyup', function(e) {
    nilaiU.value = formatRupiah(this.value, '');
});

function disable(){
    $('#bSubmit').hide();
    $('#bSubmitDisable').show();
}

function enable(){
    $('#bSubmit').show();
    $('#bSubmitDisable').hide();
}

/* Fungsi formatRupiah */
function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
}


function validateForm() {
    var nokamar = document.forms["myForm"]["nokamar"].value;
    var type = document.forms["myForm"]["type"].value;
    var biaya = document.forms["myForm"]["biaya"].value;

    if (nokamar == "") {
        validasi('No Kamar wajib di isi!', 'warning');
        return false;
    } else if (type == '') {
        validasi('Type Kamar wajib di isi!', 'warning');
        return false;
    } else if (biaya == '') {
        validasi('Biaya Kamar wajib di isi!', 'warning');
        return false;
    } 

}

function validateFormUpdate() {
    var nokamar = document.forms["myFormUpdate"]["nokamar"].value;
    var type = document.forms["myFormUpdate"]["type"].value;
    var biaya = document.forms["myFormUpdate"]["biaya"].value;

    if (nokamar == "") {
        validasi('No Kamar wajib di isi!', 'warning');
        return false;
    } else if (type == '') {
        validasi('Type Kamar wajib di isi!', 'warning');
        return false;
    } else if (biaya == '') {
        validasi('Biaya Kamar wajib di isi!', 'warning');
        return false;
    } 

}


function validasi(judul, status) {
    swal.fire({
        title: judul,
        icon: status,
        confirmButtonColor: '#4e73df',
    });
}




</script>