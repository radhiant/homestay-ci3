<script>
function disable() {
    $('#bSubmit').hide();
    $('#bSubmitDisable').show();
}

function enable() {
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
    var noktp = document.forms["myForm"]["noktp"].value;
    var namaL = document.forms["myForm"]["namaL"].value;
    var kelamin = document.forms["myForm"]["kelamin"].value;
    var notelp = document.forms["myForm"]["notelp"].value;
    var pekerjaan = document.forms["myForm"]["pekerjaan"].value;
    var alamat = document.forms["myForm"]["alamat"].value;
    // var mydata = document.forms["myForm"]["mydata"].value;

    if (noktp == "") {
        validasi('No. KTP wajib di isi!', 'warning');
        return false;
    } else if (namaL == '') {
        validasi('Nama Lengkap wajib di isi!', 'warning');
        return false;
    } else if (kelamin == '') {
        validasi('Pilih Kelamin!', 'warning');
        return false;
    } else if (notelp == '') {
        validasi('Nomor Telepon wajib di isi!', 'warning');
        return false;
    } else if (pekerjaan == '') {
        validasi('Pekerjaan wajib di isi!', 'warning');
        return false;
    } else if (alamat == '') {
        validasi('Alamat wajib di isi!', 'warning');
        return false;
    }
    //  else if (mydata == '') {
    //     validasi('Scan KTP dulu!', 'warning');
    //     return false;
    // }

}

function validateFormUpdate() {
    var noktp = document.forms["myFormUpdate"]["noktp"].value;
    var namaL = document.forms["myFormUpdate"]["namaL"].value;
    var kelamin = document.forms["myFormUpdate"]["kelamin"].value;
    var notelp = document.forms["myFormUpdate"]["notelp"].value;
    var pekerjaan = document.forms["myFormUpdate"]["pekerjaan"].value;
    var alamat = document.forms["myFormUpdate"]["alamat"].value;


    if (noktp == "") {
        validasi('No. KTP wajib di isi!', 'warning');
        return false;
    } else if (namaL == '') {
        validasi('Nama Lengkap wajib di isi!', 'warning');
        return false;
    } else if (kelamin == '') {
        validasi('Pilih Kelamin!', 'warning');
        return false;
    } else if (notelp == '') {
        validasi('Nomor Telepon wajib di isi!', 'warning');
        return false;
    } else if (pekerjaan == '') {
        validasi('Pekerjaan wajib di isi!', 'warning');
        return false;
    } else if (alamat == '') {
        validasi('Alamat wajib di isi!', 'warning');
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

function fileIsValid(fileName) {
    var ext = fileName.match(/\.([^\.]+)$/)[1];
    ext = ext.toLowerCase();
    var isValid = true;
    switch (ext) {
        case 'png':
        case 'jpeg':
        case 'jpg':

            break;
        default:
            this.value = '';
            isValid = false;
    }
    return isValid;
}

function VerifyFileNameAndFileSize() {
    var file = document.getElementById('GetFile').files[0];
    var mydata = document.forms["myForm"]["mydata"].value;

    if (file != null) {
        var fileName = file.name;
        if (fileIsValid(fileName) == false) {
            validasi('Format bukan gambar!', 'warning');
            document.getElementById('GetFile').value = null;
            return false;
        }
        var content;
        var size = file.size;
        var DecimalSize = Math.round((size / 1024));
        if ((size != null) && (DecimalSize >= 4096)) {
            validasi('Ukuran maximum 4 MB', 'warning');
            document.getElementById('GetFile').value = null;
            return false;
        }

        var ext = fileName.match(/\.([^\.]+)$/)[1];
        ext = ext.toLowerCase();
        mydata = null;
        $(".custom-file-label").addClass("selected").html(file.name);
        document.getElementById('bingkai').src = window.URL.createObjectURL(file);
        return true;

    } else
        return false;
}

</script>




<!-- Code to handle taking the snapshot and displaying it locally -->
<script language="JavaScript">
$('#pre_take_buttons').hide();

function bukaKamera() {
    $('#my_camera').show();
    Webcam.set({
        height: 180,
        image_format: 'png',
        jpeg_quality: 100,
        constraints: {
            width: {
                exact: 1280
            },
            height: {
                exact: 720
            }
        }
    });
    Webcam.attach('#my_camera');

    $('#pre_take_buttons').show();
    $('#bingkai').hide();
    $('#bukaKamera').hide();
    $('#uploadGambar').hide();
    
    document.getElementById('mydata').value = '';

}

function preview_snapshot() {
    // freeze camera so user can preview pic
    Webcam.freeze();

    // swap button sets
    document.getElementById('pre_take_buttons').style.display = 'none';
    document.getElementById('post_take_buttons').style.display = '';
}

function cancel_preview() {
    // cancel preview freeze and return to live camera feed
    Webcam.unfreeze();

    // swap buttons back
    document.getElementById('pre_take_buttons').style.display = '';
    document.getElementById('post_take_buttons').style.display = 'none';
}

function save_photo() {
    // actually snap photo (from preview freeze) and display it
    Webcam.snap(function(data_uri) {

        var raw_image_data = data_uri.replace(/^data\:image\/\w+\;base64\,/, '');

        document.getElementById('mydata').value = raw_image_data;

        // display results in page
        document.getElementById("bingkai").src = data_uri;


        // swap buttons back
        document.getElementById('results').style.display = 'none';
        document.getElementById('pre_take_buttons').style.display = '';
        document.getElementById('post_take_buttons').style.display = 'none';

        $('#pre_take_buttons').hide();
        $('#bingkai').show();
        $('#bukaKamera').show();
        $('#my_camera').hide();
        $('#uploadGambar').show();

        Webcam.reset();
    });
}
</script>