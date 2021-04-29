<?php

function tglwaktuIndo($tgl)
{
    $tanggal = explode(' ', $tgl);
    
    $bulan = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
    $split = explode('-', $tanggal[0]);
    $splitWaktu = explode(':', $tanggal[1]);
    return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0].' '.$splitWaktu[0].':'.$splitWaktu[1];
}

function tglIndo($tgl)
{
    
    $bulan = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
    $split = explode('-', $tgl);
    return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
}

?>

<?php foreach($data as $d): ?>

<div class="row mb-5">
    <div class="col-lg-12 col-md-12 col-12 col-sm-12 mt-4 mb-5">
        <div class="d-flex justify-content-between">
            <div>
                <img class="ml-4 rounded" width="225" src="<?= base_url() ?>assets/icon/logo-homestay.png">
                <div class="ml-4 mt-4">
                    <p>Jl. Jengki, Kb. Pala, Kec. Makasar <br /> Kota Jakarta Timur, DKI Jakarta, 13650
                        <br /> www.yourwebsite.com <br /> 0812-xxxx-xxxx
                    </p>
                </div>
            </div>
            <div class="mr-4">
                <h6>Invoice #<?= $d->pendapatan_id; ?></h6>
                <h6>Created at:</h6>
                <h6><?= tglIndo($d->pendapatan_tgl_input) ?></h6>
            </div>
        </div>
    </div>

    <div class="col-lg-12 col-md-12 col-12 col-sm-12 mt-3 mb-5">
        <div class="d-flex justify-content-between">
            <div>
                <h6 class="ml-4"><b>Tenant:</b></h6>
                <br>
                <p class="ml-4"><?= $d->pelanggan_nama ?> <br /><?= $d->pelanggan_notelp ?> <br /> KTP -
                    <?= $d->pelanggan_noktp ?></p>
            </div>
            <div>
                <h6 class="mr-4"><b>Booking Date:</b></h6>
                <br>
                <p class="mr-4"><?= tglIndo($d->pendapatan_tgl_input) ?> <br />Checkin :
                    <?= tglwaktuIndo($d->pendapatan_tgl_masuk) ?> <br /> Checkout :
                    <?= tglwaktuIndo($d->pendapatan_tgl_keluar) ?></p>
            </div>
        </div>
    </div>

    <div class="col-lg-12 col-md-12 col-12 col-sm-12 mb-5">
        <table class="table">
            <thead>
                <th>No Kamar</th>
                <th>Type</th>
                <th>Type Sewa</th>
                <th>Harga</th>
                <th>Lama</th>
                <th>Total</th>
            </thead>
            <tbody>
                <tr>
                    <td><?= $d->kamar_no ?></td>
                    <td><?= $d->kamar_type ?></td>
                    <td><?= $d->pilsewa_nama == '' ? '(Tidak diisi)' : $d->pilsewa_nama ?></td>
                    <td>Rp <?= number_format($d->pilsewa_harga,0,",",".") ?></td>
                    <td><?= $d->pendapatan_lamasewa ?></td>
                    <td>
                        <?php 
                        $pilsewa = $d->pilsewa_harga == '' || $d->pilsewa_harga == null ? '0' : $d->pilsewa_harga;
                        $lmsewa = $d->pendapatan_lamasewa == '' || $d->pendapatan_lamasewa == null ? '0' : $d->pendapatan_lamasewa;
                        $subtotal = $pilsewa * $lmsewa;
                        echo 'Rp '. number_format($subtotal,0,",",".");
                    ?>
                    </td>
                </tr>
                <!-- <tr>
                <td colspan="5"></td>
                <td>TOTAL </td>
                </tr> -->
            </tbody>
        </table>
    </div>

</div>

<div class="row mt-5 justify-content-end">
    <div class="col-3 text-center mb-5">
        <br><br><br>
        <hr class="sidebar-divider d-none d-md-block">
        <h5><?= $this->session->userdata('login_session')['nama_lengkap']; ?></h5>
        <h6>
            <?php if($this->session->userdata('login_session')['level'] == '1'): ?>
            Admin
            <?php elseif($this->session->userdata('login_session')['level'] == '2'): ?>
            Operator
            <?php endif;  ?>
        </h6>
    </div>
</div>

<?php endforeach; ?>