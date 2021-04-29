<?php foreach($user as $u): ?>

<form action="<?= base_url() ?>profile/proses_ubah" name="myForm" method="POST" enctype="multipart/form-data"
    onsubmit="return validateFormUpdate()">

    <div class="row mb-4">

        <div class="col-lg-8">

            <div class="card mb-4">
                <div class="card-header bg-primary">
                    <h6 class="font-weight-bold text-white mt-2">Form User</h6>
                </div>
                <div class="card-body">
                    <!-- Id User -->
                    <input class="form-control" name="iduser" type="hidden" value="<?= $u->user_id ?>">

                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" name="nmlengkap" value="<?= $u->user_nmlengkap ?>">
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" value="<?= $u->user_nama ?>">
                    </div>


                </div>
            </div>

            <div class="card mb-5">
                <div class="card-header bg-primary">
                    <h6 class="font-weight-bold text-white mt-2">Ubah Password</h6>
                </div>
                <div class="card-body">

                    <div class="alert alert-info alert-has-icon d-flex shadow">
                        <div class="alert-icon mr-2"><i class="fas fa-exclamation-circle"></i></div>
                        <div class="alert-body">
                            <div class="alert-title">Perhatian !</div>
                            Kosongkan jika tidak ingin merubah
                        </div>
                    </div>

                    <!-- Password lama -->
                    <input name="pwdLama" type="hidden" value="<?= $u->user_password ?>">

                    <!-- Password -->
                    <div class="form-group"><label>Password</label>
                        <input class="form-control" name="pwd" type="password" value="">
                    </div>

                    <!-- Konfirmasi Password -->
                    <div class="form-group"><label>Konfirmasi Password</label>
                        <input class="form-control" name="kpwd" type="password" value="">
                    </div>

                </div>
            </div>

        </div>

        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header bg-primary">
                    <h6 class="font-weight-bold text-white mt-2">Foto</h6>
                </div>
                <div class="card-body">
                    <div class="alert alert-info alert-has-icon d-flex shadow">
                        <div class="alert-icon mr-2"><i class="fas fa-exclamation-circle"></i></div>
                        <div class="alert-body">
                            <div class="alert-title">Extensi Gambar</div>
                            .png .jpeg .jpg
                        </div>
                    </div>

                    <img src="<?= base_url() ?>assets/upload/user/<?= $u->user_foto ?>" alt="blankimg"
                        class="imagecheck-image mb-2 rounded-circle" id="outputImg" width="100%">
                    <br>
                    <span class="text-danger">*kosongkan jika tidak ingin merubah</span>
                    <div class="form-group" onmouseenter="bIn('#ifile')" onmouseleave="bOut('#ifile')">
                        <div class="custom-file" id="ifile">
                            <input type="hidden" name="fotoLama" value="<?= $u->user_foto ?>">
                            <input class="custom-file-input" type="file" id="GetFile" name="photo"
                                onchange="VerifyFileNameAndFileSize()" accept=".png,.jpeg,.jpg">
                            <label class="custom-file-label" for="customFile">Pilih File</label>
                        </div>
                    </div>

                </div>
            </div>

            <button class="btn btn-success btn-lg btn-block" onclick="loadingklik()">Simpan Perubahan <i
                    class="fas fa-check-circle"></i></button>
            <a href="<?= base_url() ?>profile" class="btn btn-danger btn-lg btn-block">Batal <i
                    class="fas fa-times"></i></a>
        </div>

    </div>

</form>

<?php endforeach; ?>