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
    var namaV = document.forms["myForm"]["namaV"].value;
    var kontak = document.forms["myForm"]["kontak"].value;

    if (namaV == "") {
        validasi('Nama Vendor wajib di isi!', 'warning');
        return false;
    } else if(kontak == ""){
        validasi('Nama Kontak wajib di isi!', 'warning');
        return false;
    } 

}

function validateFormUpdate() {
    var namaV = document.forms["myFormUpdate"]["namaV"].value;
    var kontak = document.forms["myFormUpdate"]["kontak"].value;

    if (namaV == "") {
        validasi('Nama Vendor wajib di isi!', 'warning');
        return false;
    } else if(kontak == ""){
        validasi('Nama Kontak wajib di isi!', 'warning');
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