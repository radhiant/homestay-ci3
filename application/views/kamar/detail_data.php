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

?>

<?php foreach($data as $d): ?>

<div class="row">

    <div class="col-lg-12 mb-3">
        <div class="d-flex">
            <div>
                <a href="<?= base_url() ?>kamar" class="btn btn-primary rounded-circle mr-1"><i
                        class="fas fa-arrow-left"></i></a>
            </div>
            <h1 class="h3 font-weight-bold mt-1">Detail</h1>
        </div>
    </div>

    <div class="col-lg-7">
        <div class="card">
            <div class="card-header bg-primary d-flex justify-content-between">
                <h6 class="font-weight-bold text-white mt-2">Data</h6>
            </div>
            <div class="card-body">
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
                    <h4 class="font-weight-bold">Rp. <?= number_format($d->kamar_biaya,0,",",".") ?></h4>
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
                    <h6 class="font-weight-bold"><?= tglIndo($d->kamar_tgl_input) ?></h6>
                </div>

            </div>
        </div>
    </div>

</div>

<?php endforeach; ?>