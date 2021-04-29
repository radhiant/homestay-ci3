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
        return 'Pilih Bulan';
      }
}

?>

<div class="row">

    <div class="col-lg-12">
        <div class="d-flex justify-content-between">
            <h1 class="h4 mb-4 text-gray-800 font-weight-bold">
                <span class="badge badge-primary btn-circle"><i class="fas fa-print mt-1 mb-1"></i></span> Laporan
            </h1>

            <div class="d-flex">

                <input type="hidden" id="bln" name="bln" value="<?= $bulan ?>">
                <input type="hidden" id="thn" name="thn" value="<?= $tahun ?>">

                <div class="dropdown">
                    <button class="btn btn-sm btn-primary dropdown-toggle rounded-pill shadow mr-2" id="bulan"
                        type="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"><?= getBulan($bulan) ?></button>
                    <div class="dropdown-menu ">
                        <a href="javascript:void(0);" id="jan"
                            class="dropdown-item <?= $bulan == 'January' ? 'active' : '' ?>" onclick="jan()">Januari</a>

                        <a href="javascript:void(0);" id="feb"
                            class="dropdown-item <?= $bulan == 'February' ? 'active' : '' ?>"
                            onclick="feb()">Februari</a>

                        <a href="javascript:void(0);" id="mart"
                            class="dropdown-item <?= $bulan == 'March' ? 'active' : '' ?>" onclick="mart()">Maret</a>

                        <a href="javascript:void(0);" id="apr"
                            class="dropdown-item <?= $bulan == 'April' ? 'active' : '' ?>" onclick="apr()">April</a>

                        <a href="javascript:void(0);" id="may"
                            class="dropdown-item <?= $bulan == 'May' ? 'active' : '' ?>" onclick="may()">Mei</a>

                        <a href="javascript:void(0);" id="jun"
                            class="dropdown-item <?= $bulan == 'June' ? 'active' : '' ?>" onclick="jun()">Juni</a>

                        <a href="javascript:void(0);" id="jul"
                            class="dropdown-item <?= $bulan == 'July' ? 'active' : '' ?>" onclick="jul()">Juli</a>

                        <a href="javascript:void(0);" id="agus"
                            class="dropdown-item <?= $bulan == 'August' ? 'active' : '' ?>" onclick="agus()">Agustus</a>

                        <a href="javascript:void(0);" id="sep"
                            class="dropdown-item <?= $bulan == 'September' ? 'active' : '' ?>"
                            onclick="sep()">September</a>

                        <a href="javascript:void(0);" id="oct"
                            class="dropdown-item <?= $bulan == 'October' ? 'active' : '' ?>" onclick="oct()">Oktober</a>

                        <a href="javascript:void(0);" id="nov"
                            class="dropdown-item <?= $bulan == 'November' ? 'active' : '' ?>"
                            onclick="nov()">November</a>

                        <a href="javascript:void(0);" id="dec"
                            class="dropdown-item <?= $bulan == 'December' ? 'active' : '' ?>"
                            onclick="dec()">Desember</a>

                        <div class="dropdown-divider"></div>
                        <a href="javascript:void(0);" class="dropdown-item" onclick="reset()">Reset</a>

                    </div>
                </div>

                <div class="dropdown">
                    <button class="btn btn-sm btn-primary dropdown-toggle rounded-pill shadow mr-2" id="tahun"
                        type="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"><?= $tahun ?></button>
                    <div class="dropdown-menu ">
                        <a class="dropdown-item <?= $tahun == $twoyearago ? 'active' : '' ?>" id="tya"
                            href="javascript:void(0);" onclick="tya('<?= $twoyearago ?>')"><?= $twoyearago ?></a>
                        <a class="dropdown-item <?= $tahun == $previousyear ? 'active' : '' ?>" id="py"
                            href="javascript:void(0);" onclick="py('<?= $previousyear ?>')"><?= $previousyear ?></a>
                        <a class="dropdown-item <?= $tahun == $yearnow ? 'active' : '' ?>" id="yn"
                            href="javascript:void(0);" onclick="yn('<?= $yearnow ?>')"><?= $yearnow ?></a>
                    </div>
                </div>

                <div>
                    <a href="javascript:void(0);" onclick="filter()"
                        class="btn btn-sm btn-success rounded-pill shadow mr-2"><i class="fas fa-filter"></i>
                        Filter</a>
                </div>

                <div>
                    <a href="javascript:void(0);" onclick="print()"
                        class="btn btn-sm btn-primary rounded-pill shadow"><i class="fas fa-print"></i>
                        Print</a>
                </div>
            </div>

        </div>
    </div>

    <div class="col-lg-6 col-md-6">

        <div class="card border-0 shadow">
            <div class="card-body">
                <h1 class="text-grey-300 text-center">Pendapatan</h1>
                <h1 class="text-grey-300 text-center">
                    <?= $totalPendapatan == '' ? "Rp 0" : 'Rp '.number_format($totalPendapatan,0,",","."); ?></h1>
            </div>
        </div>

    </div>

    <div class="col-lg-6 col-md-6">

        <div class="card border-0 shadow">
            <div class="card-body">
                <h1 class="text-grey-300 text-center">Pembiayaan</h1>
                <h1 class="text-grey-300 text-center">
                    <?= $totalPembiayaan == '' ? "Rp 0" : 'Rp '.number_format($totalPembiayaan,0,",","."); ?></h1>
            </div>
        </div>

    </div>

    <div class="col-lg-12 mt-5">
        <div class="card border-0 shadow">
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