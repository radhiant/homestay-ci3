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

<div class="row mb-5">

    <div class="col-lg-12 mb-3">
        <div class="d-flex">
            <div>
                <a href="<?= base_url() ?>pembiayaan" class="btn btn-primary rounded-circle mr-1"><i
                        class="fas fa-arrow-left"></i></a>
            </div>
            <h1 class="h3 font-weight-bold mt-1">Pembiayaan</h1>
        </div>
    </div>

    <div class="col-lg-7">
        <div class="card">
            <div class="card-header bg-primary d-flex justify-content-between">
                <h6 class="font-weight-bold text-white mt-2">Data</h6>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="mr-4">ID Pembiayaan</h5>
                    <h4 class="font-weight-bold"><?= $d->pembiayaan_id ?></h4>
                </div>
                <hr class="sidebar-divider d-none d-md-block">

                <div class="d-flex justify-content-between">
                    <h5 class="mr-4">Kategori Biaya</h5>
                    <h4 class="font-weight-bold"><?= $d->katbiaya_nama ?></h4>
                </div>
                <hr class="sidebar-divider d-none d-md-block">

                <div class="d-flex justify-content-between">
                    <h5 class="mr-4">Jenis kategori</h5>
                    <h4 class="font-weight-bold"><?= $d->jnsbiaya_nama ?></h4>
                </div>
                <hr class="sidebar-divider d-none d-md-block">

                <div class="d-flex justify-content-between">
                    <h5 class="mr-4">Tanggal</h5>
                    <h4 class="font-weight-bold"><?= tglIndo($d->pembiayaan_tgl) ?></h4>
                </div>
                <hr class="sidebar-divider d-none d-md-block">

                <div class="d-flex justify-content-between">
                    <h5 class="mr-4">Nama Biaya</h5>
                    <h4 class="font-weight-bold"><?= $d->pembiayaan_nmbiaya ?></h4>
                </div>
                <hr class="sidebar-divider d-none d-md-block">

                <div class="d-flex justify-content-between">
                    <h5 class="mr-4">Nilai Biaya</h5>
                    <h4 class="font-weight-bold">Rp. <?= number_format($d->pembiayaan_nilai,0,",",".") ?></h4>
                </div>
                <hr class="sidebar-divider d-none d-md-block">

                <div class="d-flex justify-content-between">
                    <h5 class="mr-4">Jumlah</h5>
                    <h4 class="font-weight-bold"><?= $d->pembiayaan_jumlah ?></h4>
                </div>
                <hr class="sidebar-divider d-none d-md-block">

                <div class="d-flex justify-content-between">
                    <h5 class="mr-4">Satuan</h5>
                    <h4 class="font-weight-bold"><?= $d->pembiayaan_satuan ?></h4>
                </div>
                <hr class="sidebar-divider d-none d-md-block">

                <div class="d-flex justify-content-between">
                    <h5 class="mr-4">Sumber Biaya</h5>
                    <h4 class="font-weight-bold"><?= $d->smbrbiaya_nama ?></h4>
                </div>
                <hr class="sidebar-divider d-none d-md-block">

                <div class="d-flex justify-content-between">
                    <h5 class="mr-4">Vendor</h5>
                    <h4 class="font-weight-bold"><?= $d->vendor_nama ?></h4>
                </div>
                <hr class="sidebar-divider d-none d-md-block">

                <div class="d-flex justify-content-between">
                    <h5 class="mr-4">Keterangan</h5>
                    <h4 class="font-weight-bold"><?= $d->pembiayaan_ket ?></h4>
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
                    <h6 class="font-weight-bold"><?= tglIndo($d->pembiayaan_tgl_input) ?></h6>
                </div>

            </div>
        </div>
    </div>

</div>

<?php endforeach; ?>