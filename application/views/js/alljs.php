<!-- Bootstrap core JavaScript-->
<script src="<?= base_url() ?>assets/sbadmin/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url() ?>assets/sbadmin/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url() ?>assets/sbadmin/js/sb-admin-2.min.js"></script>


<script src="<?= base_url(); ?>assets/plugin/sweetalert2/dist/sweetalert2.all.min.js"></script>

<script src="<?= base_url(); ?>assets/plugin/datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url(); ?>assets/plugin/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?= base_url(); ?>assets/plugin/bdaterangepicker/daterangepicker.js"></script>
<script src="<?= base_url(); ?>assets/plugin/chosen/chosen.jquery.min.js"></script>

<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.bootstrap4.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/fixedcolumns/3.3.2/js/dataTables.fixedColumns.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>


<!-- First, include the Webcam.js JavaScript Library -->
<script type="text/javascript" src="<?= base_url(); ?>assets/plugin/webcamjs/webcam.min.js"></script>

<?php if($this->session->flashdata('Pesan')): ?>
<!-- doing this-->
<?= $this->session->flashdata('Pesan') ?>
<?php elseif($judul == 'Print'): ?>

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
    })
});
</script>
<?php endif; ?>

<script>
$(document).ready(function() {
    $( ".datepicker" ).datepicker({
        format: "yyyy-mm-dd",
        locale:'id',
        autoclose: true,
    });

    $( ".datetimepicker" ).datetimepicker({
        format: "yyyy-mm-dd hh:ii",
        autoclose: true,
        locale:'id',
    });


    $( ".chosen" ).chosen();
});

function loadingklik() {
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



function logout() {

    var base_url = $('#baseurl').val();

    swal.fire({
        title: "Anda ingin logout?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: 'Iya',
        confirmButtonColor: '#4e73df',
        cancelButtonText: 'Batal',
        cancelButtonColor: '#d33',
    }).then((result) => {
        if (result.value) {
            Swal.fire({
                title: 'Memuat...',
                onBeforeOpen: () => {
                    Swal.showLoading()
                },
            });
            window.location.href = base_url + "login/logout/";
        }
    });

}
</script>