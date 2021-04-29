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
    return $split[0] . '-' . $split[1] . '-' . $split[2].' '.$splitWaktu[0].':'.$splitWaktu[1];
}
?>
<?php foreach($data as $d): ?>

<form action="<?= base_url() ?>pendapatan/proses_ubah" name="myForm" method="POST" enctype="multipart/form-data"
    onsubmit="return validateForm()" id="myForm">

    <div class="row mb-4">

    <div class="col-lg-12 mb-4 d-flex justify-content-between">
            <div class="d-flex">
                <div>
                    <a href="<?= base_url() ?>pendapatan" class="btn btn-primary rounded-circle mr-1"><i
                            class="fas fa-arrow-left"></i></a>
                </div>
                <h1 class="h3 font-weight-bold mt-1">Pendapatan</h1>
            </div>

            <div class="d-flex">
                <div>
                    <button type="submit" class="btn btn-success rounded-pill shadow mr-2" onclick="loadingklik()">
                        <span class="text">Simpan Perubahan</span> <i class="fas fa-check-circle"></i>
                    </button>
                </div>
                <div>
                    <a href="<?= base_url() ?>pendapatan" class="btn btn-danger rounded-pill shadow">
                        <span class="text">Batal</span> <i class="fas fa-times-circle"></i>
                    </a>
                </div>
            </div>

        </div>

        <div class="col-lg-1"></div>

        <div class="col-lg-10">
            <div class="card mb-5">
                <!-- Card Header - Accordion -->
                <div class="card-header bg-success d-flex justify-content-between">
                    <h6 class="font-weight-bold text-white mt-2">Form Ubah</h6>

                </div>
                <div class="card-body">

                <input type="hidden" value="<?= $d->pendapatan_id ?>" name="idpendapatan">


                    <div class="form-group">
                        <label>Pilih Pelanggan</label>
                        <select name="pelanggan" class="form-control chosen">
                            <option value="">--Pilih--</option>
                            <?php foreach($pelanggan as $p): ?>
                            <option value="<?= $p->pelanggan_id ?>" <?= $d->pelanggan_id == $p->pelanggan_id ? 'selected' : '' ?>>[<?= $p->pelanggan_noktp ?>]
                                <?= $p->pelanggan_nama ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Pilih Kamar</label>
                        <select name="kamar" class="form-control chosen" onchange="getKamar()" id="kamar">
                            <option value="">--Pilih--</option>
                            <?php foreach($kamar as $k): ?>
                            <option value="<?= $k->kamar_id ?>" <?= $d->kamar_id == $k->kamar_id ? 'selected' : '' ?>><?= $k->kamar_no ?> -
                                <?= $k->kamar_type ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    

                    <div class="form-group">
                        <label>Lama Sewa</label>
                        <input type="number" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" name="ls" id="ls" value="<?= $d->pendapatan_lamasewa == null ? '0' : $d->pendapatan_lamasewa ?>">
                    </div>

                    <div class="form-group">
                        <label>Type Sewa</label>
                        <select name="ts" class="form-control chosen" onchange="getTS()" id="ts">
                            <option value="">--Pilih--</option>
                            <?php foreach($pilsewa as $t): ?>
                            <option value="<?= $t->pilsewa_id ?>" <?= $d->pilsewa_id == $t->pilsewa_id ? 'selected' : '' ?>><?= $t->pilsewa_nama ?> -
                                <?= $t->pilsewa_type ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Biaya Kamar</label>
                        <input type="text" class="form-control" name="biaya" id="biaya" value="<?= number_format($d->pendapatan_biaya,0,",",".") ?>">
                    </div>

                    <div class="form-group">
                        <label>Tanggal Masuk</label>
                        <input type="text" class="form-control datetimepicker" name="tglM" id="tglM" value="<?= tglwaktuIndo($d->pendapatan_tgl_masuk) ?>" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label>Tanggal Keluar</label>
                        <input type="text" class="form-control datetimepicker" name="tglK" id="tglK" value="<?= tglwaktuIndo($d->pendapatan_tgl_keluar) ?>" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label>Pembayaran</label>
                        <select name="pembayaran" class="form-control chosen">
                            <option value="">--Pilih--</option>
                            <option value="Tunai" <?= $d->pendapatan_pembayaran == "Tunai" ? 'selected' : '' ?>>Tunai</option>
                            <option value="Aplikasi" <?= $d->pendapatan_pembayaran == "Aplikasi" ? 'selected' : '' ?>>Aplikasi</option>
                            <option value="Transfer" <?= $d->pendapatan_pembayaran == "Transfer" ? 'selected' : '' ?>>Transfer</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Total Harga Sewa</label>
                        <input type="text" class="form-control" name="total" id="total"  value="<?= number_format($d->pendapatan_total,0,",",".") ?>">
                    </div>

                    <div class="form-group">
                        <label>Pilih Sales</label>
                        <select name="sales" class="form-control chosen" onchange="CalcDiff()">
                            <option value="">--Pilih--</option>
                            <?php foreach($sales as $s): ?>
                            <option value="<?= $s->sales_id ?>" <?= $d->sales_id == $s->sales_id ? 'selected' : '' ?>>
                                <?= $s->sales_nama ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Fee Sales</label>
                        <input type="text" class="form-control" name="fee" id="fee" value="<?= $d->pendapatan_fee == null ? '0' : number_format($d->pendapatan_fee,0,",",".") ?>">
                    </div>

                    <div class="form-group">
                        <label>Status Pembayaran</label>
                        <select name="spembayaran" class="form-control chosen">
                            <option value="">--Pilih--</option>
                            <option value="Lunas" <?= $d->pendapatan_spembayaran == "Lunas" ? 'selected' : '' ?>>Lunas</option>
                            <option value="DP" <?= $d->pendapatan_spembayaran == "DP" ? 'selected' : '' ?>>DP</option>
                            <option value="Belum Bayar" <?= $d->pendapatan_spembayaran == "Belum Bayar" ? 'selected' : '' ?>>Belum Bayar</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea name="ket" class="form-control"><?= $d->pendapatan_ket ?></textarea>
                    </div>

                    <?php 
                    $tglNow = date('Y-m-d H:i:s'); 
                    if($d->pendapatan_status == '' || $d->pendapatan_status == null): ?>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="">--Pilih--</option>
                            <option value="Check-in">Check-in</option>
                            <option value="Check-out" <?= $tglNow >= $d->pendapatan_tgl_keluar ? 'selected' : '' ?>>Check-out</option>
                        </select>
                    </div>
                    <?php else: ?>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="">--Pilih--</option>
                            <option value="Check-in" <?= $d->pendapatan_status == "Check-in" ? "selected" : "" ?>>Check-in</option>
                            <option value="Check-out" <?= $d->pendapatan_status == "Check-out" ? "selected" : "" ?>>Check-out</option>
                        </select>
                    </div>

                    <?php endif; ?>


                </div>
            </div>
        </div>

        <div class="col-lg-1">

        </div>

    </div>

</form>

<?php endforeach; ?>