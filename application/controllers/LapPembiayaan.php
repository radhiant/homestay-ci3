<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LapPembiayaan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('pembiayaan_model');
        $this->load->model('pendapatan_model');
        $this->load->model('user_model');
                
    }

	public function index($bulan = 'Semua', $tahun = null)
	{
        $data['judul'] = 'Laporan Pembiayaan';

        $data['yearnow']=date('Y', strtotime('+0 year'));
	    $data['previousyear']=date('Y', strtotime('-1 year'));
        $data['twoyearago']=date('Y', strtotime('-2 year'));
        
        $bln = $bulan;
	    $thn = $tahun == null ? date('Y', strtotime('+0 year')) : $tahun;

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

        $data['totalPembiayaan'] = $this->pembiayaan_model->sumData($first, $last, $thn);
        $data['totalPendapatan'] = $this->pendapatan_model->sumData($first, $last, $thn);

        $this->load->view('templates/header', $data);
        $this->load->view('lapPembiayaan/index');
        $this->load->view('js/alljs');
        $this->load->view('js/pembiayaan/lapPembiayaanjs');
        $this->load->view('templates/footer');
    }

    public function print($bulan = 'Semua', $tahun = null)
	{
        $data['judul'] = 'Print Laporan Pembiayaan';

        $data['yearnow']=date('Y', strtotime('+0 year'));
	    $data['previousyear']=date('Y', strtotime('-1 year'));
        $data['twoyearago']=date('Y', strtotime('-2 year'));
        
        $bln = $bulan;
	    $thn = $tahun == null ? date('Y', strtotime('+0 year')) : $tahun;

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

        $data['totalPembiayaan'] = $this->pembiayaan_model->sumData($first, $last, $thn);
        $data['totalPendapatan'] = $this->pendapatan_model->sumData($first, $last, $thn);
        
        $this->load->view('templates/no_header', $data);
        $this->load->view('lapPembiayaan/print');
        $this->load->view('templates/no_footer');
    }
    
}
