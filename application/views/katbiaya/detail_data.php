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

<div class="row justify-content-center">

    <div class="col-lg-12 mb-3">
        <div class="d-flex">
            <div>
                <a href="<?= base_url() ?>katbiaya" class="btn btn-primary rounded-circle mr-1"><i
                        class="fas fa-arrow-left"></i></a>
            </div>
            <h1 class="h3 font-weight-bold mt-1">Detail</h1>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="card">
            <div class="card-header bg-primary d-flex justify-content-between">
                <h6 class="font-weight-bold text-white mt-2">Data</h6>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="mr-4">ID Kategori Biaya</h5>
                    <h4 class="font-weight-bold"><?= $d->katbiaya_id ?></h4>
                </div>

                <hr class="sidebar-divider d-none d-md-block">

                <div class="d-flex justify-content-between">
                    <h5 class="mr-4">Kategori Biaya</h5>
                    <h4 class="font-weight-bold"><?= $d->katbiaya_nama ?></h4>
                </div>

                <hr class="sidebar-divider d-none d-md-block">

                <div class="d-flex justify-content-between">
                    <h5 class="mr-4">Keterangan</h5>
                    <h4 class="font-weight-bold"><?= $d->katbiaya_ket ?></h4>
                </div>

            </div>
        </div>
    </div>


<?php endforeach; ?>