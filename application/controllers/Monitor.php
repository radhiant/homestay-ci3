<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitor extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('pendapatan_model');
        $this->load->model('kamar_model');
        $this->load->model('sales_model');
        $this->load->model('pelanggan_model');
        $this->load->model('user_model');
                
    }

	public function index()
	{
        $data['judul'] = 'Monitor';

        $data['data'] = $this->kamar_model->data()->result();
        $data['jmlData'] = $this->kamar_model->data()->num_rows();

        $data['now'] = date('Y-m-d H:i:s');
        $data['nowtime'] = date('Y-m-d H:i:s');

        $this->load->view('templates/monitor_header', $data);
        $this->load->view('monitor/index');
        $this->load->view('js/monitor/monitorjs');
        $this->load->view('templates/footer');
	}
}
