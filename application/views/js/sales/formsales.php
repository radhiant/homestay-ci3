<script>

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
    var namaS = document.forms["myForm"]["namaS"].value;
    var notelp = document.forms["myForm"]["notelp"].value;
    var tglbayar = document.forms["myForm"]["tglbayar"].value;
    var biayaS = document.forms["myForm"]["biayaS"].value;

    if (namaS == "") {
        validasi('Nama Sales wajib di isi!', 'warning');
        return false;
    } else if (notelp == '') {
        validasi('Nomor Telepon wajib di isi!', 'warning');
        return false;
    } else if (tglbayar == '') {
        validasi('Tanggal Bayar wajib di isi!', 'warning');
        return false;
    } else if (biayaS == '') {
        validasi('Biaya Sales wajib di isi!', 'warning');
        return false;
    }

}

function validateFormUpdate() {
    var namaS = document.forms["myFormUpdate"]["namaS"].value;
    var notelp = document.forms["myFormUpdate"]["notelp"].value;
    var tglbayar = document.forms["myFormUpdate"]["tglbayar"].value;
    var biayaS = document.forms["myFormUpdate"]["biayaS"].value;

    if (namaS == "") {
        validasi('Nama Sales wajib di isi!', 'warning');
        return false;
    } else if (notelp == '') {
        validasi('Nomor Telepon wajib di isi!', 'warning');
        return false;
    } else if (tglbayar == '') {
        validasi('Tanggal Bayar wajib di isi!', 'warning');
        return false;
    } else if (biayaS == '') {
        validasi('Biaya Sales wajib di isi!', 'warning');
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