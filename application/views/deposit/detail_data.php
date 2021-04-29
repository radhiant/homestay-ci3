<?php

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

function tglTimeIndo($tgl)
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
    $split = explode(' ', $tgl);
    $tanggal = explode('-', $split[0]);
    $waktu = explode(':', $split[1]);
    return '<span class="badge badge-primary rounded-pill mr-1"><i class="far fa-calendar-alt"></i> '.$tanggal[2] . ' ' . $bulan[ (int)$tanggal[1] ] . ' ' . $tanggal[0].'</span>'.'<span class="badge badge-primary rounded-pill"><i class="far fa-clock"></i> '.$waktu[0].':'.$waktu[1].'</span>';
}

?>

<?php foreach($data as $d): ?>

<div class="row mb-5">

    <div class="col-lg-12 mb-3">
        <div class="d-flex">
            <div>
                <a href="<?= base_url() ?>deposit" class="btn btn-primary rounded-circle mr-1"><i
                        class="fas fa-arrow-left"></i></a>
            </div>
            <h1 class="h3 font-weight-bold mt-1">Deposit</h1>
        </div>
    </div>

    <div class="col-lg-7">
        <div class="card">
            <div class="card-header bg-primary d-flex justify-content-between">
                <h6 class="font-weight-bold text-white mt-2">Data</h6>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="mr-4">ID Deposit</h5>
                    <h4 class="font-weight-bold"><?= $d->deposit_id ?></h4>
                </div>
                <hr class="sidebar-divider d-none d-md-block">

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
                    <h5 class="mr-4">Tanggal</h5>
                    <h4 class="font-weight-bold"><?= tglTimeIndo($d->deposit_tgl) ?></h4>
                </div>
                <hr class="sidebar-divider d-none d-md-block">

                <div class="d-flex justify-content-between">
                    <h5 class="mr-4">Nominal</h5>
                    <h4 class="font-weight-bold">Rp. <?= number_format($d->deposit_nominal,0,",",".") ?></h4>
                </div>
                <hr class="sidebar-divider d-none d-md-block">

                <div class="d-flex justify-content-between">
                    <h5 class="mr-4">Status</h5>
                    <h4 class="font-weight-bold"><span
                            class="badge <?= $d->deposit_status == 'Diterima' ? 'badge-primary' : 'badge-success' ?> rounded-pill mr-1"><?= $d->deposit_status ?></span>
                    </h4>
                </div>


            </div>
        </div>
    </div>

    <div class="col-lg-5">
        <div class="card mb-4">
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
                    <h6 class="font-weight-bold"><?= tglIndo($d->deposit_tgl_input) ?></h6>
                </div>

            </div>
        </div>

        <?php if($d->deposit_status == 'Dikembalikan'): ?>
        <div class="card">
            <div class="card-header bg-primary">
                <h6 class="font-weight-bold text-white mt-2">Pengembalian</h6>
            </div>
            <div class="card-body">

                <div class="d-flex justify-content-between">
                    <h6 class="mr-4">Tanggal Kembali</h6>
                    <h6 class="font-weight-bold"><?= tglTimeIndo($d->deposit_tgl_kembali) ?></h6>
                </div>
                <hr class="sidebar-divider d-none d-md-block">

                <div class="d-flex justify-content-between">
                    <h6 class="mr-4">Nominal Kembali</h6>
                    <h6 class="font-weight-bold">Rp. <?= number_format($d->deposit_nominal_kembali,0,",",".") ?></h6>
                </div>

            </div>
        </div>
        <?php endif; ?>

    </div>

</div>

<?php endforeach; ?>