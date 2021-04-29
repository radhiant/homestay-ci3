<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

        public function __construct() {
                parent::__construct();
                date_default_timezone_set('Asia/Jakarta');
                $this->load->model('pendapatan_model');
                $this->load->model('kamar_model');
                $this->load->model('sales_model');
                $this->load->model('pelanggan_model');
                $this->load->model('katbiaya_model');
                $this->load->model('deposit_model');
                $this->load->model('katbiaya_model');
                $this->load->model('jnsbiaya_model');
                $this->load->model('smbrbiaya_model');
                $this->load->model('vendor_model');
                $this->load->model('pembiayaan_model');
                $this->load->model('user_model');
                
              }

	public function index()
	{
                $data['judul'] = 'Home';
                $data['kamar'] = $this->kamar_model->data()->num_rows();
                $data['sales'] = $this->sales_model->data()->num_rows();
                $data['pelanggan'] = $this->pelanggan_model->data()->num_rows();
                $data['katbiaya'] = $this->katbiaya_model->data()->num_rows();
                $data['pendapatan'] = $this->pendapatan_model->data()->num_rows();
                $data['user'] = $this->user_model->data()->num_rows();
                $data['deposit'] = $this->deposit_model->data()->num_rows();
                $data['katbiaya'] = $this->katbiaya_model->data()->num_rows();
                $data['jnsbiaya'] = $this->jnsbiaya_model->data()->num_rows();
                $data['smbrbiaya'] = $this->smbrbiaya_model->data()->num_rows();
                $data['vendor'] = $this->vendor_model->data()->num_rows();
                $data['pembiayaan'] = $this->pembiayaan_model->data()->num_rows();

                $this->load->view('templates/header', $data);
                $this->load->view('home/index');
                $this->load->view('js/alljs');
                $this->load->view('js/home/homejs');
                $this->load->view('templates/footer');
	}
}
