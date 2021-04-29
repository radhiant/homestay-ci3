<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Katbiaya extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('katbiaya_model');
	
      }

	public function index()
	{
        $data['judul'] = 'Kategori Biaya';
        $data['kode'] = $this->katbiaya_model->buat_kode(); 
        $this->load->view('templates/header', $data);
        $this->load->view('katbiaya/index');
        $this->load->view('js/alljs');
        $this->load->view('js/katbiaya/katbiayajs');
        $this->load->view('js/katbiaya/getkatbiaya');
        $this->load->view('js/katbiaya/formkatbiaya');
        $this->load->view('templates/footer');
  }

  public function detail($id)
	{
        $data['judul'] = 'Kategori Biaya';
        $where = array('katbiaya_id' => $id);
        $data['data'] = $this->katbiaya_model->ambilId('tbl_katbiaya', $where)->result();

        $this->load->view('templates/header', $data);
        $this->load->view('katbiaya/detail_data');
        $this->load->view('js/alljs');
        $this->load->view('js/katbiaya/katbiayajs');
        $this->load->view('templates/footer');
  }

  public function proses_tambah()
  {
        $kode = $this->katbiaya_model->buat_kode(); 
        $namaK = $this->input->post('namaK');
        $ket = $this->input->post('ket');

        $data = array(
            'katbiaya_id' => $kode,
            'katbiaya_nama' => $namaK,
            'katbiaya_ket' => $ket
        );

        $this->katbiaya_model->tambah_data($data, 'tbl_katbiaya');
        $this->session->set_flashdata('Pesan','
          <script>
          $(document).ready(function() {
          swal.fire({
            title: "Berhasil ditambah!",
            icon: "success",
            confirmButtonColor: "#4e73df",
          });
          });
          </script>
          ');
		    redirect('katbiaya');
  }

  public function proses_ubah()
  {
      $kode = $this->input->post('idkatbiaya');
      $namaK = $this->input->post('namaK');
      $ket = $this->input->post('ket');

      $where = array(
        'katbiaya_id' => $kode
      );

      $data = array(
          'katbiaya_nama' => $namaK,
          'katbiaya_ket' => $ket
      );

      $this->katbiaya_model->ubah_data($where, $data, 'tbl_katbiaya');
		  $this->session->set_flashdata('Pesan','
			<script>
			$(document).ready(function() {
			swal.fire({
				title: "Berhasil diubah!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
			});
			</script>
			');
		redirect('katbiaya');
  }

  public function proses_hapus($id)
	{
		$where = array('katbiaya_id' => $id );
		$this->katbiaya_model->hapus_data($where, 'tbl_katbiaya');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil dihapus!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
		redirect('katbiaya');
    }
    
    public function hapus_all()
	{
        
		$this->katbiaya_model->delete_all('tbl_katbiaya');
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil dihapus!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
		redirect('katbiaya');
    }
    
    public function mhapus(){
		$id = $_POST['chkbox']; 
        $this->katbiaya_model->mdelete($id); 
		$this->session->set_flashdata('Pesan','
		<script>
		$(document).ready(function() {
			swal.fire({
				title: "Berhasil dihapus!",
				icon: "success",
				confirmButtonColor: "#4e73df",
			});
		});
		</script>
		');
		redirect('katbiaya');
		
    }

    public function getData()
    {
        $id = $this->input->post('id');
        $where = array('katbiaya_id' => $id );
        $data = $this->katbiaya_model->detail_data($where, 'tbl_katbiaya')->result();
        echo json_encode($data);
    }
    
  function getDataKatbiaya()
    {
        $list = $this->katbiaya_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
			  $aksi = '	
						<a href="'.base_url().'katbiaya/detail/'.$field->katbiaya_id.'" class="btn rounded-circle btn-primary btn-sm shadow" data-toggle="tooltip" data-placement="top" title="Detail Data"> <i class="fas fa-eye"></i> </a>
                        <a href="#" data-target="#ukatbiayaModal" onclick="getKatbiaya('."'".$field->katbiaya_id."'".')" data-toggle="modal" class="btn rounded-circle btn-success btn-sm shadow" data-toggle="tooltip" data-placement="top" title="Ubah Data"> <i class="fas fa-pen"></i> </a>
                    ';
			
            $checkBox = '<div class="custom-control custom-checkbox ml-2">
            <input type="checkbox" class="custom-control-input" id="cbx-'.$no.'" name="chkbox[]" value="'.$field->katbiaya_id.'" onclick="check()">
            <label class="custom-control-label" for="cbx-'.$no.'"></label>
            </div>';

            $no++;
            $row = array();
            $row[] = $checkBox;
            $row[] = $no.'.';
            $row[] = $field->katbiaya_id;
            $row[] = $field->katbiaya_nama;
            $row[] = $field->katbiaya_ket;
            $row[] = $aksi;

            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->katbiaya_model->count_all(),
            "recordsFiltered" => $this->katbiaya_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

}
