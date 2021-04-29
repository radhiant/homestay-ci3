<!-- General JS Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

<script src="<?= base_url(); ?>assets/plugin/sweetalert2/dist/sweetalert2.all.min.js"></script>

<?php if($this->session->flashdata('Pesan')): ?>
<!-- doing this-->
<?= $this->session->flashdata('Pesan') ?>

<?php else: ?>
<script>
$(document).ready(function() {
    Swal.fire({
        timer: 1000,
        showClass: {
            popup: 'animate__animated animate__bounceIn'
        },
        hideClass: {
            popup: 'animate__animated animate__bounceOut'
        },
        html: '<div class="cssload-dots"> ' +
            ' <div class="cssload-dot"></div> ' +
            ' <div class="cssload-dot"></div> ' +
            ' <div class="cssload-dot"></div> ' +
            ' <div class="cssload-dot"></div> ' +
            ' <div class="cssload-dot"></div> ' +
            ' </div> ' +
            '<svg version="1.1" xmlns="http://www.w3.org/2000/svg"> ' +
            ' <defs> ' +
            ' <filter id="goo"> ' +
            ' <feGaussianBlur in="SourceGraphic" result="blur" stdDeviation="12"></feGaussianBlur> ' +
            ' <feColorMatrix in="blur" mode="matrix" ' +
            ' values="1 0 0 0 0	0 1 0 0 0	0 0 1 0 0	0 0 0 18 -7" result="goo"></feColorMatrix> ' +
            ' <!--<feBlend in2="goo" in="SourceGraphic" result="mix" ></feBlend>--> ' +
            ' </filter> ' +
            ' </defs> ' +
            '</svg>' +
            '<h4>Memuat...</h4>' +
            '<br>',
        showCloseButton: false,
        showCancelButton: false,
        showConfirmButton: false,
        focusConfirm: false,
    });

    setTimeout(
        function() {
            $('#cardLogin').addClass('animate__animated animate__bounceIn');
        }, 1700);


});
</script>
<?php endif; ?>

<script>
function proses_login() {

    var usr = $("[name='user']").val();
    var pwd = $("[name='pwd']").val();

    if (usr != '' && pwd != '') {
        $('#btnLogin').addClass('animate__animated animate__bounceIn');
        lodingklik();
    };



}

function validateForm() {
    var usr = document.forms["myForm"]["user"].value;
    var pwd = document.forms["myForm"]["pwd"].value;

    if (usr == "") {
        validasi('Username masih kosong!', 'warning');
        return false;
    } else if (pwd == '') {
        validasi('Password masih kosong!', 'warning');
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

function lodingklik() {
    Swal.fire({
        showClass: {
            popup: 'animate__animated animate__bounceIn'
        },
        hideClass: {
            popup: 'animate__animated animate__bounceOut'
        },
        html: '<div class="cssload-dots"> ' +
            ' <div class="cssload-dot"></div> ' +
            ' <div class="cssload-dot"></div> ' +
            ' <div class="cssload-dot"></div> ' +
            ' <div class="cssload-dot"></div> ' +
            ' <div class="cssload-dot"></div> ' +
            ' </div> ' +
            '<svg version="1.1" xmlns="http://www.w3.org/2000/svg"> ' +
            ' <defs> ' +
            ' <filter id="goo"> ' +
            ' <feGaussianBlur in="SourceGraphic" result="blur" stdDeviation="12"></feGaussianBlur> ' +
            ' <feColorMatrix in="blur" mode="matrix" ' +
            ' values="1 0 0 0 0	0 1 0 0 0	0 0 1 0 0	0 0 0 18 -7" result="goo"></feColorMatrix> ' +
            ' <!--<feBlend in2="goo" in="SourceGraphic" result="mix" ></feBlend>--> ' +
            ' </filter> ' +
            ' </defs> ' +
            '</svg>' +
            '<h4>Memuat...</h4>' +
            '<br>',
        showCloseButton: false,
        showCancelButton: false,
        showConfirmButton: false,
        focusConfirm: false,
    })
}
</script>