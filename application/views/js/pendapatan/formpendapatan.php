<script>
$(document).ready(function() {
    var myDate = new Date();
    var lamaSewa = $('#ls').val();
    totalHS();
    formatDate(myDate, lamaSewa);
});

function getTS() {
    var link = $('#baseurl').val();
    var base_url = link + 'pendapatan/getPilsewa';
    var id = $('#ts').val();
    var ls = $('#ls').val();
    var myDate = new Date();
    $('#biaya').val('Memuat...');

    $.ajax({
        type: 'POST',
        data: 'id=' + id,
        url: base_url,
        dataType: 'json',
        success: function(hasil) {

            if (id == '') {
                $('#biaya').val(formatRupiah('0', ''));
                formatDate(myDate, 0);
                totalHS();
            }
            $('#biaya').val(formatRupiah(hasil[0].pilsewa_harga, ''));
            formatDate(myDate, ls);
            totalHS();
            
            
            
        }
    });
}


var biaya = document.getElementById('biaya');
biaya.addEventListener('keyup', function(e) {
    biaya.value = formatRupiah(this.value, '');
});

var total = document.getElementById('total');
total.addEventListener('keyup', function(e) {
    total.value = formatRupiah(this.value, '');
});

var fee = document.getElementById('fee');
fee.addEventListener('keyup', function(e) {
    fee.value = formatRupiah(this.value, '');
});

$("#ls").keyup(function() {
    var myDate = new Date();

    if (this.value == '' || this.value == '0' || this.value == null) {

        formatDate(myDate, 0);
        totalHS();
    } else {
        formatDate(myDate, this.value);
        totalHS();
    };
});

function formatDate(date, number) {

    var d = date;
    var ts = $("#ts option:selected").text().split('-');
    var mingguan;

    if (number > 0) {
        if (ts[0] == 'Harian ') {
            d.setTime(d.getTime() + 86400000 * parseInt(number));
        } else if (ts[0] == 'Mingguan ') {
            mingguan = parseInt(number) * 7;
            d.setTime(d.getTime() + 86400000 * parseInt(mingguan));
        }

    } else {
        d.setTime(d.getTime() + 86400000);
    }


    var
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();


    if (month.length < 2)
        month = '0' + month;
    if (day.length < 2)
        day = '0' + day;

    return $('#tglK').val([year, month, day].join('-') + ' 12:00');
}

$("#biaya").keyup(function() {
    var a = $('#tglM').val();
    var b = $('#tglK').val();
    var c = $('#biaya').val();

    if (a == '' || b == '' || c == '') {

    } else {
        totalHS();
    }

});

$("#tglM").change(function() {
    var a = $('#tglM').val();
    var b = $('#tglK').val();
    var c = $('#biaya').val();

    if (a == '' || b == '' || c == '') {

    } else {
        totalHS();
    }

});

$("#tglK").change(function() {
    var a = $('#tglM').val();
    var b = $('#tglK').val();
    var c = $('#biaya').val();

    if (a == '' || b == '' || c == '') {

    } else {
        totalHS();
    }

});

function submit() {
    loadingklik();
    $('#myForm').submit();
}

function cancel() {
    var base_url = $('#baseurl').val();
    loadingklik();
    window.location.href = base_url + "pendapatan";
}

// function CalcDiff() {
//     var a = new Date($('#tglM').val());
//     var b = new Date($('#tglK').val());
//     var c = $('#biaya').val();
//     var biaya = c.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-');

//     var timeDiff = 0
//     if (b) {
//         timeDiff = (b - a) / 1000;
//     }
//     var selisih = Math.floor(timeDiff / (86400));

//     var total = parseInt(biaya) * selisih;

//     $('#total').val(formatRupiah(total.toString()));
// }

function totalHS() {
    var ls = $('#ls').val();
    var biaya = $('#biaya').val().replace(/[^,\d]/g, '').toString();
    var total;
    if (ls == null || ls == '0' || ls == '') {
        $('#total').val('0');
    } else if (biaya == null || biaya == '0' || biaya == '') {
        $('#total').val('0');
    } else {
        total = parseInt(biaya) * parseInt(ls);
        $('#total').val(formatRupiah(total.toString()));
    }
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