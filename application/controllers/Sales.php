<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('sales_model');
	
      }

	public function index()
	{
        $data['judul'] = 'Sales';
        $this->load->view('templates/header', $data);
        $this->load->view('sales/index');
        $this->load->view('js/alljs');
        $this->load->view('js/sales/salesjs');
        $this->load->view('js/sales/getsales');
        $this->load->view('js/sales/formsales');
        $this->load->view('templates/footer');
  }

  public function detail($id)
	{
        $data['judul'] = 'Sales';
        $data['data'] = $this->sales_model->detailJoin($id)->result();

        $this->load->view('templates/header', $data);
        $this->load->view('sales/detail_data');
        $this->load->view('js/alljs');
        $this->load->view('js/sales/salesjs');
        $this->load->view('templates/footer');
  }

  public function proses_tambah()
  {
        $kode = $this->sales_model->buat_kode(); 
        $namaS = $this->input->post('namaS');
        $notelp = $this->input->post('notelp');
        $tglbayar = $this->input->post('tglbayar');
        $biayaS = $this->input->post('biayaS');
        $ket = $this->input->post('ket');
        $usrinput = $this->session->userdata('login_session')['id_user'];
        $tglnow = date("Y-m-d");

        $date1 = strtotime($tglbayar);
        $formatTglB = date('Y-m-d',$date1);

        $data = array(
            'sales_id' => $kode,
            'sales_nama' => $namaS,
            'sales_notelp' => $notelp,
            'sales_tgl_bayar' => $formatTglB,
            'sales_biaya' => $biayaS,
            'sales_ket' => $ket,
            'sales_tgl_input' => $tglnow,
            'user_id' => $usrinput
        );

      $this->sales_model->tambah_data($data, 'tbl_sales');
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
		  redirect('sales');
  }

  public function proses_ubah()
  {
      $kode = $this->input->post('idsales');
      $namaS = $this->input->post('namaS');
      $notelp = $this->input->post('notelp');
      $tglbayar = $this->input->post('tglbayar');
      $biayaS = $this->input->post('biayaS');
      $ket = $this->input->post('ket');

      $date1 = strtotime($tglbayar);
      $formatTglB = date('Y-m-d',$date1);

      $where = array(
        'sales_id' => $kode
      );

      $data = array(
        'sales_nama' => $namaS,
        'sales_notelp' => $notelp,
        'sales_tgl_bayar' => $formatTglB,
        'sales_biaya' => $biayaS,
        'sales_ket' => $ket,
      );

      $this->sales_model->ubah_data($where, $data, 'tbl_sales');
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
		redirect('sales');
  }

  public function proses_hapus($id)
	{
		$where = array('sales_id' => $id );
		$this->sales_model->hapus_data($where, 'tbl_sales');
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
		redirect('sales');
    }
    
    public function hapus_all()
	{
        
		$this->sales_model->delete_all('tbl_sales');
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
		redirect('sales');
    }
    
    public function mhapus(){
		$id = $_POST['chkbox']; 
        $this->sales_model->mdelete($id); 
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
		redirect('sales');
		
    }

    public function getData()
    {
        $id = $this->input->post('id');
        $where = array('sales_id' => $id );
        $data = $this->sales_model->detail_data($where, 'tbl_sales')->result();
        echo json_encode($data);
    }
    
  function getDataSales()
    {
        $list = $this->sales_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
			  $aksi = '	
						<a href="'.base_url().'sales/detail/'.$field->sales_id.'" class="btn rounded-circle btn-primary btn-sm shadow" data-toggle="tooltip" data-placement="top" title="Detail Data"> <i class="fas fa-eye"></i> </a>
                        <a href="#" data-target="#usalesModal" onclick="getSales('."'".$field->sales_id."'".')" data-toggle="modal" class="btn rounded-circle btn-success btn-sm shadow" data-toggle="tooltip" data-placement="top" title="Ubah Data"> <i class="fas fa-pen"></i> </a>
                    ';
			
            $checkBox = '<div class="custom-control custom-checkbox ml-2">
            <input type="checkbox" class="custom-control-input" id="cbx-'.$no.'" name="chkbox[]" value="'.$field->sales_id.'" onclick="check()">
            <label class="custom-control-label" for="cbx-'.$no.'"></label>
            </div>';

            $bulan = array (1 =>   'Jan',
            'Feb',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agus',
            'Sep',
            'Okt',
            'Nov',
            'Des'
          );

          $tglbayar = explode('-', $field->sales_tgl_bayar);


            $no++;
            $row = array();
            $row[] = $checkBox;
            $row[] = $no.'.';
            $row[] = $field->sales_nama;
            $row[] = $field->sales_notelp;
            $row[] = $tglbayar[2] . ' ' . $bulan[ (int)$tglbayar[1] ] . ' ' . $tglbayar[0];
            $row[] = '<span class="badge badge-primary rounded-pill">'.$field->sales_biaya.'%</span>';
            $row[] = $field->sales_ket;
            $row[] = $aksi;

            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->sales_model->count_all(),
            "recordsFiltered" => $this->sales_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

}
