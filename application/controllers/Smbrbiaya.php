<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Smbrbiaya extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('smbrbiaya_model');
	
      }

	public function index()
	{
        $data['judul'] = 'Sumber Biaya';
        $data['kode'] = $this->smbrbiaya_model->buat_kode(); 
        $this->load->view('templates/header', $data);
        $this->load->view('smbrbiaya/index');
        $this->load->view('js/alljs');
        $this->load->view('js/smbrbiaya/smbrbiayajs');
        $this->load->view('js/smbrbiaya/getsmbrbiaya');
        $this->load->view('js/smbrbiaya/formsmbrbiaya');
        $this->load->view('templates/footer');
  }

  public function detail($id)
	{
        $data['judul'] = 'Sumber Biaya';
        $where = array('smbrbiaya_id' => $id);
        $data['data'] = $this->smbrbiaya_model->ambilId('tbl_smbrbiaya', $where)->result();

        $this->load->view('templates/header', $data);
        $this->load->view('smbrbiaya/detail_data');
        $this->load->view('js/alljs');
        $this->load->view('js/smbrbiaya/smbrbiayajs');
        $this->load->view('templates/footer');
  }

  public function proses_tambah()
  {
        $kode = $this->smbrbiaya_model->buat_kode(); 
        $namaK = $this->input->post('namaK');
        $ket = $this->input->post('ket');

        $data = array(
            'smbrbiaya_id' => $kode,
            'smbrbiaya_nama' => $namaK,
            'smbrbiaya_ket' => $ket
        );

        $this->smbrbiaya_model->tambah_data($data, 'tbl_smbrbiaya');
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
		    redirect('smbrbiaya');
  }

  public function proses_ubah()
  {
      $kode = $this->input->post('idsmbrbiaya');
      $namaK = $this->input->post('namaK');
      $ket = $this->input->post('ket');

      $where = array(
        'smbrbiaya_id' => $kode
      );

      $data = array(
          'smbrbiaya_nama' => $namaK,
          'smbrbiaya_ket' => $ket
      );

      $this->smbrbiaya_model->ubah_data($where, $data, 'tbl_smbrbiaya');
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
		redirect('smbrbiaya');
  }

  public function proses_hapus($id)
	{
		$where = array('smbrbiaya_id' => $id );
		$this->smbrbiaya_model->hapus_data($where, 'tbl_smbrbiaya');
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
		redirect('smbrbiaya');
    }
    
    public function hapus_all()
	{
        
		$this->smbrbiaya_model->delete_all('tbl_smbrbiaya');
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
		redirect('smbrbiaya');
    }
    
    public function mhapus(){
		$id = $_POST['chkbox']; 
        $this->smbrbiaya_model->mdelete($id); 
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
		redirect('smbrbiaya');
		
    }

    public function getData()
    {
        $id = $this->input->post('id');
        $where = array('smbrbiaya_id' => $id );
        $data = $this->smbrbiaya_model->detail_data($where, 'tbl_smbrbiaya')->result();
        echo json_encode($data);
    }
    
  function getDatasmbrbiaya()
    {
        $list = $this->smbrbiaya_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
			  $aksi = '	
						<a href="'.base_url().'smbrbiaya/detail/'.$field->smbrbiaya_id.'" class="btn rounded-circle btn-primary btn-sm shadow" data-toggle="tooltip" data-placement="top" title="Detail Data"> <i class="fas fa-eye"></i> </a>
                        <a href="#" data-target="#usmbrbiayaModal" onclick="getsmbrbiaya('."'".$field->smbrbiaya_id."'".')" data-toggle="modal" class="btn rounded-circle btn-success btn-sm shadow" data-toggle="tooltip" data-placement="top" title="Ubah Data"> <i class="fas fa-pen"></i> </a>
                    ';
			
            $checkBox = '<div class="custom-control custom-checkbox ml-2">
            <input type="checkbox" class="custom-control-input" id="cbx-'.$no.'" name="chkbox[]" value="'.$field->smbrbiaya_id.'" onclick="check()">
            <label class="custom-control-label" for="cbx-'.$no.'"></label>
            </div>';

            $no++;
            $row = array();
            $row[] = $checkBox;
            $row[] = $no.'.';
            $row[] = $field->smbrbiaya_id;
            $row[] = $field->smbrbiaya_nama;
            $row[] = $field->smbrbiaya_ket;
            $row[] = $aksi;

            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->smbrbiaya_model->count_all(),
            "recordsFiltered" => $this->smbrbiaya_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

}
