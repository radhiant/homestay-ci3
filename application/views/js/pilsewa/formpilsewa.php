<script>

function disable(){
    $('#bSubmit').hide();
    $('#bSubmitDisable').show();
}

function enable(){
    $('#bSubmit').show();
    $('#bSubmitDisable').hide();
}

var harga = document.getElementById('harga');
harga.addEventListener('keyup', function(e) {
    harga.value = formatRupiah(this.value, '');
});

var hargai = document.getElementById('hargai');
hargai.addEventListener('keyup', function(e) {
    hargai.value = formatRupiah(this.value, '');
});

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
    var ps = document.forms["myForm"]["ps"].value;
    var harga = document.forms["myForm"]["harga"].value;

    if (ps == "") {
        validasi('Pilihan Sewa Barang wajib di isi!', 'warning');
        return false;
    }else if(harga == ''){
        validasi('Harga wajib di isi!', 'warning');
        return false;
    }

}

function validateFormUpdate() {
    var ps = document.forms["myFormUpdate"]["ps"].value;

    if (ps == "") {
        validasi('Jenis Barang wajib di isi!', 'warning');
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