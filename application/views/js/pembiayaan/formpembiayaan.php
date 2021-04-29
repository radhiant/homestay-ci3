<script>

var nilai = document.getElementById('nilai');
nilai.addEventListener('keyup', function(e) {
    nilai.value = formatRupiah(this.value, '');
});

function submit(){
    loadingklik();
    $('#myForm').submit();
}

function cancel(){
    var base_url = $('#baseurl').val();
    loadingklik();
    window.location.href = base_url + "pembiayaan";
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
    var pelanggan = document.forms["myForm"]["pelanggan"].value;
    var kamar = document.forms["myForm"]["kamar"].value;
    var sales = document.forms["myForm"]["sales"].value;
    var biaya = document.forms["myForm"]["biaya"].value;
    var tglM = document.forms["myForm"]["tglM"].value;
    var tglK = document.forms["myForm"]["tglK"].value;
    var total = document.forms["myForm"]["total"].value;

    if (pelanggan == "") {
        validasi('Pilih Pelanggan!', 'warning');
        return false;
    } else if (kamar == '') {
        validasi('Pilih Kamar!', 'warning');
        return false;
    } else if (sales == '') {
        validasi('Pilih Sales!', 'warning');
        return false;
    } else if (biaya == '') {
        validasi('Biaya Kamar wajib di isi!', 'warning');
        return false;
    } else if (tglM == '') {
        validasi('Tanggal Masuk wajib di isi!', 'warning');
        return false;
    } else if (tglK == '') {
        validasi('Tanggal Keluar wajib di isi!', 'warning');
        return false;
    } else if (total == '') {
        validasi('Total wajib di isi!', 'warning');
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