<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('pelanggan_model');
	
      }

	public function index()
	{
        $data['judul'] = 'Pelanggan';
        $this->load->view('templates/header', $data);
        $this->load->view('pelanggan/index');
        $this->load->view('js/alljs');
        $this->load->view('js/pelanggan/pelangganjs');
        $this->load->view('js/pelanggan/getpelanggan');
        $this->load->view('templates/footer');
  }

  public function tambah()
	{
        $data['judul'] = 'Pelanggan';

        $this->load->view('templates/header', $data);
        $this->load->view('pelanggan/tambah_data');
        $this->load->view('js/alljs');
        $this->load->view('js/pelanggan/pelangganjs');
        $this->load->view('js/pelanggan/formpelanggan');
        $this->load->view('templates/footer');
  }

  public function ubah($id)
	{
        $data['judul'] = 'Pelanggan';
        $where = array('pelanggan_id' => $id);
        $data['data'] = $this->pelanggan_model->detail_data($where, 'tbl_pelanggan')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('pelanggan/ubah_data');
        $this->load->view('js/alljs');
        $this->load->view('js/pelanggan/pelangganjs');
        $this->load->view('js/pelanggan/formpelanggan');
        $this->load->view('templates/footer');
  }

  public function detail($id)
	{
        $data['judul'] = 'Pelanggan';
        $data['data'] = $this->pelanggan_model->detailJoin($id)->result();

        $this->load->view('templates/header', $data);
        $this->load->view('pelanggan/detail_data');
        $this->load->view('js/alljs');
        $this->load->view('js/pelanggan/pelangganjs');
        $this->load->view('templates/footer');
  }

  public function proses_tambah()
  {

        $your_path = './assets/upload/pelanggan/'; 
        $encoded_data = $this->input->post('mydata');
        $binary_data = base64_decode( $encoded_data );

        $datetime = date('YmdHis').'.png';

        if($encoded_data == null){
            $config['upload_path']   = './assets/upload/pelanggan/';
            $config['allowed_types'] = 'png|PNG|jpg|JPG|jpeg|JPEG';
            $config['encrypt_name'] = TRUE;
          
            $namaFile = $_FILES['photo']['name'];
            $error = $_FILES['photo']['error'];

            $this->load->library('upload', $config);

            if ($namaFile == '') {
              $datetime = 'default.jpg';
            }else{
              if (! $this->upload->do_upload('photo')) {
                $error = $this->upload->display_errors();
                redirect('pelanggan/tambah');
              }
              else{
                $data = array('photo' => $this->upload->data());
                $nama_file= $data['photo']['file_name'];
                $datetime = str_replace(" ", "_", $nama_file);
              }
            }
        }else{
            // save to server (beware of permissions)
            $result = file_put_contents( $your_path . $datetime, $binary_data );
            if (!$result) die("Could not save image!  Check file permissions.");
        }

        $kode = $this->pelanggan_model->buat_kode(); 
        $noktp = $this->input->post('noktp');
        $namaL = $this->input->post('namaL');
        $kelamin = $this->input->post('kelamin');
        $alamat = $this->input->post('alamat');
        $notelp = $this->input->post('notelp');
        $pekerjaan = $this->input->post('pekerjaan');
        $usrinput = $this->session->userdata('login_session')['id_user'];
        $tglnow = date("Y-m-d");

        $data = array(
            'pelanggan_id' => $kode,
            'pelanggan_noktp' => $noktp,
            'pelanggan_nama' => $namaL,
            'pelanggan_kelamin' => $kelamin,
            'pelanggan_alamat' => $alamat,
            'pelanggan_notelp' => $notelp,
            'pelanggan_foto' => $datetime,
            'pelanggan_pekerjaan' => $pekerjaan,
            'pelanggan_tgl_input' => $tglnow,
            'user_id' => $usrinput
        );

        $this->pelanggan_model->tambah_data($data, 'tbl_pelanggan');
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
		redirect('pelanggan');
  }

  public function proses_ubah()
  {
    
      $your_path = './assets/upload/pelanggan/'; 
      $encoded_data = $this->input->post('mydata');
      $encoded_data_lama = $this->input->post('mydatalama');
      if($encoded_data == null){
            $config['upload_path']   = './assets/upload/pelanggan/';
            $config['allowed_types'] = 'png|PNG|jpg|JPG|jpeg|JPEG';
            $config['encrypt_name'] = TRUE;
          
            $namaFile = $_FILES['photo']['name'];
            $error = $_FILES['photo']['error'];

            $this->load->library('upload', $config);

            if ($namaFile == '') {
                $datetime = $encoded_data_lama;
            }else{
              if (! $this->upload->do_upload('photo')) {
                $error = $this->upload->display_errors();
                redirect('pelanggan/tambah');
              }
              else{
                $data = array('photo' => $this->upload->data());
                $nama_file= $data['photo']['file_name'];
                unlink('./assets/upload/pelanggan/'.$encoded_data_lama.'');
                $datetime = str_replace(" ", "_", $nama_file);
              }
            }
      }else{
        $binary_data = base64_decode( $encoded_data );
        $datetime = date('YmdHis').'.png';
        unlink('./assets/upload/pelanggan/'.$encoded_data_lama.'');

        // save to server (beware of permissions)
        $result = file_put_contents( $your_path . $datetime, $binary_data );
        if (!$result) die("Could not save image!  Check file permissions.");
      }
      

      $kode = $this->input->post('idP');
      $noktp = $this->input->post('noktp');
      $namaL = $this->input->post('namaL');
      $kelamin = $this->input->post('kelamin');
      $alamat = $this->input->post('alamat');
      $notelp = $this->input->post('notelp');
      $pekerjaan = $this->input->post('pekerjaan');
      

      $where = array(
        'pelanggan_id' => $kode
      );

      $data = array(
            'pelanggan_noktp' => $noktp,
            'pelanggan_nama' => $namaL,
            'pelanggan_kelamin' => $kelamin,
            'pelanggan_alamat' => $alamat,
            'pelanggan_notelp' => $notelp,
            'pelanggan_pekerjaan' => $pekerjaan,
            'pelanggan_foto' => $datetime,
      );

      $this->pelanggan_model->ubah_data($where, $data, 'tbl_pelanggan');
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
		redirect('pelanggan');
  }

  public function proses_hapus($id)
	{
		$where = array('pelanggan_id' => $id );
		$this->pelanggan_model->hapus_data($where, 'tbl_pelanggan');
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
		redirect('pelanggan');
    }
    
    public function hapus_all()
	{

    $files = glob('./assets/upload/pelanggan/*'); 
			foreach($files as $file){ 
			if(is_file($file)) {
				unlink($file); 
        $this->pelanggan_model->delete_all('tbl_pelanggan');
			}
		}
        
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
		redirect('pelanggan');
    }
    
    public function mhapus(){
    $id = $_POST['chkbox']; 
    
    foreach($id as $d){
			$where = array('pelanggan_id' => $d );
			$foto = $this->pelanggan_model->ambilFoto($where);
			if($foto){
				unlink('./assets/upload/pelanggan/'.$foto.'');
			}
    }

    $this->pelanggan_model->mdelete($id); 
    
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
		redirect('pelanggan');
		
    }

    public function getData()
    {
        $id = $this->input->post('id');
        $where = array('pelanggan_id' => $id );
        $data = $this->pelanggan_model->detail_data($where, 'tbl_pelanggan')->result();
        echo json_encode($data);
    }
    
  function getDataPelanggan()
    {
        $list = $this->pelanggan_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
			  $aksi = '	
						<a href="'.base_url().'pelanggan/detail/'.$field->pelanggan_id.'" class="btn rounded-circle btn-primary btn-sm shadow" data-toggle="tooltip" data-placement="top" title="Detail Data"> <i class="fas fa-eye"></i> </a>
                        <a href="'.base_url().'pelanggan/ubah/'.$field->pelanggan_id.'" class="btn rounded-circle btn-success btn-sm shadow" data-toggle="tooltip" data-placement="top" title="Ubah Data"> <i class="fas fa-pen"></i> </a>
                    ';
			
            $checkBox = '<div class="custom-control custom-checkbox ml-2">
            <input type="checkbox" class="custom-control-input" id="cbx-'.$no.'" name="chkbox[]" value="'.$field->pelanggan_id.'" onclick="check()">
            <label class="custom-control-label" for="cbx-'.$no.'"></label>
            </div>';

            $img = '<a href="javascript:void(0);" data-target="#mGambar" data-toggle="modal" onclick="gambar('."'".$field->pelanggan_foto."'".')"><img class="rounded" width="100"
            src="'.base_url().'assets/upload/pelanggan/'.$field->pelanggan_foto.'" alt="avatar"></a>';

            if($field->pelanggan_kelamin == '1'){
                $kelamin = '<span class="badge badge-primary rounded-pill">Laki-laki</span>';
            }elseif($field->pelanggan_kelamin == '2'){
                $kelamin = '<span class="badge badge-success rounded-pill">Perempuan</span>';
            }


            $no++;
            $row = array();
            $row[] = $checkBox;
            $row[] = $no.'.';
            $row[] = $img;
            $row[] = $field->pelanggan_noktp;
            $row[] = $field->pelanggan_nama;
            $row[] = $kelamin;
            $row[] = $field->pelanggan_alamat;
            $row[] = $field->pelanggan_notelp;
            $row[] = $field->pelanggan_pekerjaan;
            $row[] = $aksi;

            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->pelanggan_model->count_all(),
            "recordsFiltered" => $this->pelanggan_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

}