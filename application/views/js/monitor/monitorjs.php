<script src="<?= base_url() ?>assets/sbadmin/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url() ?>assets/sbadmin/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url() ?>assets/sbadmin/js/sb-admin-2.min.js"></script>

<script>
$(document).ready(function() {


    setTimeout(
        function() {
            location.reload();
        }, 25000);

    downScroll();

});




function upScroll() {
    $("html, body").animate({
        scrollTop: 0
    }, 15000);
}

function downScroll() {
    window.scrollTo(0, 0);
    $("html, body").animate({
        scrollTop: $("#bottom").offset().top
    }, 10000, function() {
        upScroll();
    });
}
</script>