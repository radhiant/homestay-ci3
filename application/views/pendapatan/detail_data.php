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
    return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0].'<br>'.$splitWaktu[0].':'.$splitWaktu[1];
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

    <div class="col-lg-12 mb-3">
        <div class="d-flex">
            <div>
                <a href="<?= base_url() ?>pendapatan" class="btn btn-primary rounded-circle mr-1"><i
                        class="fas fa-arrow-left"></i></a>
            </div>
            <h1 class="h3 font-weight-bold mt-1">Pendapatan</h1>
        </div>
    </div>

    <div class="col-lg-7">
        <div class="card">
            <div class="card-header bg-primary d-flex justify-content-between">
                <h6 class="font-weight-bold text-white mt-2">Data</h6>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="mr-4">Pelanggan</h5>
                    <h4 class="font-weight-bold"><?= $d->pelanggan_nama ?></h4>
                </div>
                <hr class="sidebar-divider d-none d-md-block">

                <div class="d-flex justify-content-between">
                    <h5 class="mr-4">Nomor Kamar</h5>
                    <h4 class="font-weight-bold"><?= $d->kamar_no ?></h4>
                </div>
                <hr class="sidebar-divider d-none d-md-block">

                <div class="d-flex justify-content-between">
                    <h5 class="mr-4">Type Kamar</h5>
                    <h4 class="font-weight-bold"><?= $d->kamar_type ?></h4>
                </div>
                <hr class="sidebar-divider d-none d-md-block">

                <div class="d-flex justify-content-between">
                    <h5 class="mr-4">Biaya Kamar</h5>
                    <h4 class="font-weight-bold">Rp. <?= number_format($d->pendapatan_biaya,0,",",".") ?></h4>
                </div>
                <hr class="sidebar-divider d-none d-md-block">

                <div class="d-flex justify-content-between">
                    <h5 class="mr-4">Sales</h5>
                    <h4 class="font-weight-bold"><?= $d->sales_nama ?></h4>
                </div>
                <hr class="sidebar-divider d-none d-md-block">

                <div class="d-flex justify-content-between">
                    <h5 class="mr-4">Fee</h5>
                    <h4 class="font-weight-bold">Rp. <?= number_format($d->pendapatan_fee,0,",",".") ?></h4>
                </div>
                <hr class="sidebar-divider d-none d-md-block">

                <div class="d-flex justify-content-between">
                    <h5 class="mr-4">Tanggal Masuk</h5>
                    <h4 class="font-weight-bold text-right"><?= tglwaktuIndo($d->pendapatan_tgl_masuk) ?></h4>
                </div>
                <hr class="sidebar-divider d-none d-md-block">

                <div class="d-flex justify-content-between">
                    <h5 class="mr-4">Tanggal Keluar</h5>
                    <h4 class="font-weight-bold text-right"><?= tglwaktuIndo($d->pendapatan_tgl_keluar) ?></h4>
                </div>
                <hr class="sidebar-divider d-none d-md-block">

                <div class="d-flex justify-content-between">
                    <h5 class="mr-4">Total Biaya</h5>
                    <h4 class="font-weight-bold">Rp. <?= number_format($d->pendapatan_total,0,",",".") ?></h4>
                </div>
                <hr class="sidebar-divider d-none d-md-block">

                <div class="d-flex justify-content-between">
                    <h5 class="mr-4">Keterangan</h5>
                    <h4 class="font-weight-bold ml-2"><?= $d->pendapatan_ket ?></h4>
                </div>

            </div>
        </div>
    </div>

    <div class="col-lg-5">
        <div class="card">
            <div class="card-header bg-primary">
                <h6 class="font-weight-bold text-white mt-2">User Input</h6>
            </div>
            <div class="card-body">

                <div class="d-flex justify-content-between">
                    <h6 class="mr-4">User Input</h6>
                    <h6 class="font-weight-bold"><?= $d->user_nmlengkap ?></h6>
                </div>
                <hr class="sidebar-divider d-none d-md-block">

                <div class="d-flex justify-content-between">
                    <h6 class="mr-4">Tanggal Input</h6>
                    <h6 class="font-weight-bold"><?= tglIndo($d->pendapatan_tgl_input) ?></h6>
                </div>

            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header bg-primary">
                <h6 class="font-weight-bold text-white mt-2">Jenis Sewa</h6>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h6 class="mr-4">Lama Sewa</h6>
                    <h6 class="font-weight-bold"><?= $d->pendapatan_lamasewa ?> Hari</h6>
                </div>
                <hr class="sidebar-divider d-none d-md-block">
                <div class="d-flex justify-content-between">
                    <h6 class="mr-4">Type Sewa</h6>
                    <h6 class="font-weight-bold"><?= $d->pilsewa_nama ?></h6>
                </div>
                <hr class="sidebar-divider d-none d-md-block">
                <div class="d-flex justify-content-between">
                    <h6 class="mr-4">Harga Sewa</h6>
                    <h6 class="font-weight-bold">Rp. <?= number_format($d->pilsewa_harga,0,",",".") ?></h6>
                </div>
                <hr class="sidebar-divider d-none d-md-block">
                <div class="d-flex justify-content-between">
                    <h6 class="mr-4">Pembayaran</h6>
                    <h6 class="font-weight-bold"><?= $d->pendapatan_pembayaran ?></h6>
                </div>
                <hr class="sidebar-divider d-none d-md-block">
                <div class="d-flex justify-content-between">
                    <h6 class="mr-4">Status Pembayaran</h6>
                    <h6 class="font-weight-bold"><?= $d->pendapatan_spembayaran ?></h6>
                </div>
            </div>
        </div>
    </div>

</div>

<?php endforeach; ?>