</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Homestay <?= date("Y"); ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

</body>

<script>
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
            loadingklik();
            window.location.href = base_url + "login/logout/";
        }
    });

}
</script>

<script type="text/javascript">
// 1 detik = 1000
window.setTimeout("waktu()", 1000);

function waktu() {
    var tanggal = new Date();
    setTimeout("waktu()", 1000);

    var jam = tanggal.getHours();
    var menit = tanggal.getMinutes();
    var detik = tanggal.getSeconds();

    if (jam < 10) {
        jam = '0' + tanggal.getHours();
    }

    if (menit < 10) {
        menit = '0' + tanggal.getMinutes();
    }

    if (detik < 10) {
        detik = '0' + tanggal.getSeconds();
    }
    document.getElementById("jam").innerHTML = '<i class="far fa-clock mr-1"></i>' + jam + ":" + menit + ":" + detik
}
</script>

<script language="JavaScript">
var tanggallengkap = new String();
var namahari = ("Minggu Senin Selasa Rabu Kamis Jumat Sabtu");
namahari = namahari.split(" ");
var namabulan = ("Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember");
namabulan = namabulan.split(" ");
var tgl = new Date();
var hari = tgl.getDay();
var tanggal = tgl.getDate();
var bulan = tgl.getMonth();
var tahun = tgl.getFullYear();

document.getElementById("hari").innerHTML = '<i class="far fa-calendar-alt mr-2"></i>' + namahari[hari] + ", " + tanggal + " " + namabulan[bulan] + " " + tahun;
</script>

</html>