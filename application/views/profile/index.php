<?php foreach($data as $u): ?>

<div class="row">

    <div class="col-lg-12">
        <div class="d-flex justify-content-between">
            <h1 class="h4 mb-4 text-gray-800 font-weight-bold">
                <span class="badge badge-primary btn-circle"><i class="fas fa-user mt-1 mb-1"></i></span> Profile
            </h1>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card mb-4">
            <div class="card-header bg-primary">
                <h6 class="font-weight-bold text-white mt-2">Foto</h6>
            </div>
            <div class="card-body">

                <img src="<?= base_url() ?>assets/upload/user/<?= $u->user_foto ?>" alt="blankimg"
                    class="imagecheck-image mb-2 rounded-circle" id="outputImg" width="100%">

            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="card">
            <div class="card-header bg-primary d-flex justify-content-between">
                <h6 class="font-weight-bold text-white mt-2">Data</h6>
                <div class="d-flex">


                    <div>
                        <a href="<?= base_url() ?>profile/ubah/<?= $u->user_id ?>"
                            class="btn btn-success rounded-circle btn-sm ml-1"><i class="far fa-edit"></i></a>
                    </div>

                </div>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="mr-4">Nama Lengkap</h4>
                    <h5 class="font-weight-bold"><?= $u->user_nmlengkap ?></h5>
                </div>
                <hr class="sidebar-divider d-none d-md-block">

                <div class="d-flex justify-content-between">
                    <h4 class="mr-4">Username</h4>
                    <h4 class="font-weight-bold"><?= $u->user_nama ?></h4>
                </div>
                <hr class="sidebar-divider d-none d-md-block">

                <div class="d-flex justify-content-between">
                    <h4 class="mr-4">Level</h4>
                    <h4 class="font-weight-bold">
                        <?php if($u->user_level == '1'): ?>
                        <span class="badge badge-success rounded-pill">Admin</span>
                        <?php elseif($u->user_level == '2'): ?>
                        <span class="badge badge-primary rounded-pill">Operator</span>
                        <?php endif;  ?>
                    </h4>
                </div>
            </div>
        </div>


    </div>

</div>

<?php endforeach; ?>