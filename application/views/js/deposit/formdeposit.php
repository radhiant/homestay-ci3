<script>
$(document).ready(function() {
    getKamar();
});

function getKamar() {
    var link = $('#baseurl').val();
    var base_url = link + 'deposit/getKamarPendapatan';
    var id = $('#pelanggan').val();
    $("#kamar").attr('disabled', true);

    $('#kamar')
        .empty()
        .append('<option value="">--Pilih--</option>')
        .find('option:first')
        .attr("selected", "selected");

    $.ajax({
        type: 'POST',
        data: 'id=' + id,
        url: base_url,
        dataType: 'json',
        success: function(hasil) {
            $("#kamar").attr('disabled', false);
            for (let i = 0; i < hasil.length; i++) {
                $("#kamar").append('<option value=' + hasil[i].kamar_id + '>' + hasil[i].kamar_no + ' - ' +
                    hasil[i].kamar_type + '</option>');
            };

            getSelectedKamar();
        }
    });
}

function getSelectedKamar() {
    var kamarId = $('#kamarid').val();
    $("#kamar").val(kamarId).trigger("chosen:updated");
}

var nominal = document.getElementById('nominal');
nominal.addEventListener('keyup', function(e) {
    nominal.value = formatRupiah(this.value, '');
});



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
    var pelanggan = document.forms["myForm"]["pelanggan"].value;
    var kamar = document.forms["myForm"]["kamar"].value;
    var tgl = document.forms["myForm"]["tgl"].value;
    var nominal = document.forms["myForm"]["nominal"].value;

    if (pelanggan == "") {
        validasi('Pilih Pelanggan!', 'warning');
        return false;
    } else if (kamar == '') {
        validasi('Pilih Kamar!', 'warning');
        return false;
    } else if (tgl == '') {
        validasi('Tanggal Deposit wajib di isi!', 'warning');
        return false;
    } else if (nominal == '') {
        validasi('Nominal wajib di isi!', 'warning');
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