<?php 

 function getBulan($bulan)
{
    switch ($bulan) {
        case "January":
          return 'Januari';
          break;
        case "February":
            return 'Februari';
          break;
        case "March":
            return 'Maret';
          break;
        case "April":
            return 'April';
          break;
        case "May":
            return 'Mei';
          break;
        case "June":
            return 'Juni';
          break;
        case "July":
            return 'Juli';
          break;
        case "August":
            return 'Agustus';
          break;
        case "September":
            return 'September';
          break;
        case "October":
            return 'Oktober';
          break;
        case "November":
            return 'November';
          break;
        case "December":
            return 'Desember';
          break;
          
        default:
        return 'Semua';
      }
}

?>

<div class="row">

    <div class="col-lg-12 col-md-12 col-12 col-sm-12 mt-4 mb-5">
        <div class="d-flex">
            <img class="mr-3 ml-4 rounded" width="225" src="<?= base_url() ?>assets/icon/logo-homestay.png">
            <div>
                <h1>Laporan Pendapatan</h1>
                <h4><?= getBulan($bulan) ?> - <?= $tahun ?></h4>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-md-6">

        <div class="card">
            <div class="card-body">
                <h1 class="text-grey-300 text-center">Pendapatan</h1>
                <h1 class="text-grey-300 text-center">
                    <?= $totalPendapatan == '' ? "Rp 0" : 'Rp '.number_format($totalPendapatan,0,",","."); ?></h1>
            </div>
        </div>

    </div>

    <div class="col-lg-6 col-md-6">

        <div class="card">
            <div class="card-body">
                <h1 class="text-grey-300 text-center">Pembiayaan</h1>
                <h1 class="text-grey-300 text-center">
                    <?= $totalPembiayaan == '' ? "Rp 0" : 'Rp '.number_format($totalPembiayaan,0,",","."); ?></h1>
            </div>
        </div>

    </div>

    <div class="col-lg-12 mt-5">
        <div class="card">
            <div class="card-body">
                <h1 class="text-grey-300 text-center">Profit</h1>
                <h1 class="text-grey-300 text-center">
                    <?php 
                        $total = $totalPendapatan - $totalPembiayaan;
                        echo 'Rp '.number_format($total,0,",",".");
                    ?>
                </h1>
            </div>
        </div>
    </div>

</div>