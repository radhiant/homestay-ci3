<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LapTransaksi extends CI_Controller {

        public function __construct() {
                parent::__construct();
                date_default_timezone_set('Asia/Jakarta');
                $this->load->model('pendapatan_model');
                $this->load->model('sales_model');
                $this->load->model('user_model');
                
              }

	public function index($bulan = 'Semua', $tahun = null, $pmbyrn = 'semua_pembayaran')
	{
        $data['judul'] = 'Laporan Transaksi';

        $data['yearnow']=date('Y', strtotime('+0 year'));
	$data['previousyear']=date('Y', strtotime('-1 year'));
        $data['twoyearago']=date('Y', strtotime('-2 year'));
        
        $bln = $bulan;
	$thn = $tahun == null ? date('Y', strtotime('+0 year')) : $tahun;
        $pembayaran = $pmbyrn;

	if($bln == 'Semua'){
		$last = null;
		$first = null;
	}else {
	        $last = date('Y-m-t', strtotime($thn.'-'.$bln.'-01'));
		$first = date('Y-m-01', strtotime($thn.'-'.$bln.'-01'));
        };
        
        $data['tglAwal'] = $first;
	$data['tglAkhir'] = $last;
	$data['tahun'] = $thn;
	$data['bulan'] = $bln;
        $data['pmbyrn'] = $pembayaran;

        $data['transaksi'] = $this->pendapatan_model->dataJoinbyDate($first, $last, $thn, $pembayaran)->result();
        $data['jTransaksi'] = $this->pendapatan_model->dataJoinbyDate($first, $last, $thn, $pembayaran)->num_rows();

        $this->load->view('templates/header', $data);
        $this->load->view('lapTransaksi/index');
        $this->load->view('js/alljs');
        $this->load->view('js/pendapatan/lapTransaksijs');
        $this->load->view('templates/footer');
    }

    public function print($bulan = 'Semua', $tahun = null, $pmbyrn = 'semua_pembayaran')
	{
        $data['judul'] = 'Print Laporan Transaksi';

        $data['yearnow']=date('Y', strtotime('+0 year'));
	$data['previousyear']=date('Y', strtotime('-1 year'));
        $data['twoyearago']=date('Y', strtotime('-2 year'));
        
        $bln = $bulan;
	$thn = $tahun == null ? date('Y', strtotime('+0 year')) : $tahun;
        $pembayaran = $pmbyrn;

	if($bln == 'Semua'){
		$last = null;
		$first = null;
	}else {
	        $last = date('Y-m-t', strtotime($thn.'-'.$bln.'-01'));
		$first = date('Y-m-01', strtotime($thn.'-'.$bln.'-01'));
        };
        
        $data['tglAwal'] = $first;
	$data['tglAkhir'] = $last;
	$data['tahun'] = $thn;
	$data['bulan'] = $bln;
        $data['pmbyrn'] = $pembayaran;

        $data['transaksi'] = $this->pendapatan_model->dataJoinbyDate($first, $last, $thn, $pembayaran)->result();
        $data['jTransaksi'] = $this->pendapatan_model->dataJoinbyDate($first, $last, $thn, $pembayaran)->num_rows();

        $this->load->view('templates/no_header', $data);
        $this->load->view('lapTransaksi/print');
        $this->load->view('templates/no_footer');
    }
    
}