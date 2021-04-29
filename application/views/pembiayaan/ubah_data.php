<form action="<?= base_url() ?>pembiayaan/proses_ubah" name="myForm" method="POST" enctype="multipart/form-data"
    onsubmit="return validateForm()" id="myForm">

    <?php foreach($data as $d): ?>

    <div class="row mb-4">

        <div class="col-lg-12 mb-4 d-flex justify-content-between">
            <div class="d-flex">
                <div>
                    <a href="<?= base_url() ?>pembiayaan" class="btn btn-primary rounded-circle mr-1"><i
                            class="fas fa-arrow-left"></i></a>
                </div>
                <h1 class="h3 font-weight-bold mt-1">Pembiayaan</h1>
            </div>

            <div class="d-flex">
                <div>
                    <button type="submit" class="btn btn-success rounded-pill shadow mr-2" onclick="loadingklik()">
                        <span class="text">Simpan Perubahan</span> <i class="fas fa-check-circle"></i>
                    </button>
                </div>
                <div>
                    <a href="<?= base_url() ?>pembiayaan" class="btn btn-danger rounded-pill shadow">
                        <span class="text">Batal</span> <i class="fas fa-times-circle"></i>
                    </a>
                </div>
            </div>

        </div>

        <div class="col-lg-1"></div>

        <div class="col-lg-10">
            <div class="card mb-5">
                <!-- Card Header - Accordion -->
                <div class="card-header bg-primary d-flex justify-content-between">
                    <h6 class="font-weight-bold text-white mt-2">Form Tambah</h6>

                </div>
                <div class="card-body">

                <input type="hidden" value="<?= $d->pembiayaan_id ?>" name="idpembiayaan">


                    <div class="form-group">
                        <label>Pilih Kategori</label>
                        <select name="katbiaya" class="form-control chosen">
                            <option value="">--Pilih--</option>
                            <?php foreach($katbiaya as $k): ?>
                            <option value="<?= $k->katbiaya_id ?>" <?= $d->katbiaya_id == $k->katbiaya_id ? 'selected' : '' ?>><?= $k->katbiaya_nama ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Pilih Jenis</label>
                        <select name="jnsbiaya" class="form-control chosen">
                            <option value="">--Pilih--</option>
                            <?php foreach($jnsbiaya as $j): ?>
                            <option value="<?= $j->jnsbiaya_id ?>" <?= $d->jnsbiaya_id == $j->jnsbiaya_id ? 'selected' : '' ?>><?= $j->jnsbiaya_nama ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="text" class="form-control datepicker" name="tgl" id="tgl" autocomplete="off" value="<?= $d->pembiayaan_tgl ?>">
                    </div>

                    <div class="form-group">
                        <label>Nama Biaya</label>
                        <input type="text" class="form-control" name="nmbiaya" id="nmbiaya" value="<?= $d->pembiayaan_nmbiaya ?>">
                    </div>

                    <div class="form-group">
                        <label>Nilai</label>
                        <input type="text" class="form-control" name="nilai" id="nilai" value="<?= number_format($d->pembiayaan_nilai,0,",",".") ?>">
                    </div>

                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="text" class="form-control" name="jumlah" id="jumlah" value="<?= $d->pembiayaan_jumlah ?>">
                    </div>

                    <div class="form-group">
                        <label>Satuan</label>
                        <input type="text" class="form-control" name="satuan" id="satuan" value="<?= $d->pembiayaan_satuan ?>">
                    </div>

                    <div class="form-group">
                        <label>Pilih Sumber Biaya</label>
                        <select name="smbrbiaya" class="form-control chosen">
                            <option value="">--Pilih--</option>
                            <?php foreach($smbrbiaya as $s): ?>
                            <option value="<?= $s->smbrbiaya_id ?>" <?= $d->smbrbiaya_id == $s->smbrbiaya_id ? 'selected' : '' ?>><?= $s->smbrbiaya_nama ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Pilih Vendor</label>
                        <select name="vendor" class="form-control chosen">
                            <option value="">--Pilih--</option>
                            <?php foreach($vendor as $s): ?>
                            <option value="<?= $s->vendor_id ?>" <?= $d->vendor_id == $s->vendor_id ? 'selected' : '' ?>><?= $s->vendor_nama ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea name="ket" class="form-control"><?=  $d->pembiayaan_ket?></textarea>
                    </div>


                </div>
            </div>
        </div>

        <div class="col-lg-1"></div>

    </div>

    <?php endforeach; ?>

</form>