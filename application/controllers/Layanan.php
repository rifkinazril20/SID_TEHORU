<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata("id")){
            redirect('home/pengaduan');
        }
        $this->load->model('main_model');
    }
    
    public function index()
    {
        $this->load->view('layanan/atas');
        $this->load->view('layanan/index');
        $this->load->view('layanan/bawah');
        
    }
    public function pengaduan()
    {
        $this->load->view('layanan/atas');
        $this->load->view('layanan/pengaduan');
        $this->load->view('layanan/bawah');
        
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('home/pengaduan');
    }

    public function savepengaduan()
    {
        $config['upload_path'] = './image/';
         $config['allowed_types'] = 'jpg|jpeg|png|pdf';
         $config['max_size']  = '2000';
         $config['encrypt_name'] = TRUE;
         $this->load->library('upload', $config);
         if($this->upload->do_upload("gambar")){ //upload file
             $gbr = $this->upload->data();
 
             $config['image_library']    ='gd2';
             $config['source_image']     ='./image/'.$gbr['file_name'];
             $config['create_thumb']     = FALSE;
             $config['maintain_ratio']   = TRUE;
             $config['quality']          = '80%';
             $config['width']            = 1024;
             $config['height']           = 768;
             $this->load->library('image_lib', $config);
             $this->image_lib->resize();
             $no = clear($_POST['no']);
             $kat = clear($_POST['kat']);
             $lat = clear($_POST['lat']);
             $lng = clear($_POST['lng']);
             $desk = clear($_POST['desk']);
             $gambar = $gbr['file_name'];
             $iduser = $this->session->userdata('id');
             $result = $this->db->query("insert into pengaduan values('','$no','$iduser','$kat','$desk','$gambar','Pending','$lat','$lng',now())");
             echo json_encode($result);
         }else{
             echo false;
         }
    }

    public function hapuspengaduan($id='')
    {
        $q = $this->db->query("select * from pengaduan where id='$id'");
        $row  =$q->row();
        unlink('./image/'.$row->lampiran);
        $this->db->query("delete from pengaduan where id='$id'");
        echo true;
    }
    
    public function produk()
    {
        $this->load->library('pagination');
        $user = $this->session->userdata("nama");
        $jum  = $this->db->query("select produk_warga.* from produk_warga where pemilik='$user'");
        $page=$this->uri->segment(3);
        if(!$page):
            $offset = 0;
        else:
            $offset = $page;
        endif;
        $limit=6;
        $config['base_url'] = base_url() . 'layanan/produkwarga/';
        $config['total_rows'] = $jum->num_rows();
        $config['per_page'] = $limit;
        $config['uri_segment'] = 3;
        //style
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        $this->pagination->initialize($config);
        //end style
        $data['page'] =$this->pagination->create_links();
        $data['qe']=$this->main_model->produk_perpage_layanan($offset,$limit);
        $this->load->view('layanan/atas');
        $this->load->view('layanan/produk',$data);
        $this->load->view('layanan/bawah');
    }
    
    public function addproduk()
    {

        $this->load->view('layanan/atas');
        $this->load->view('layanan/addproduk');
        $this->load->view('layanan/bawah');
    }

    
    public function saveprodukwarga()
    {
        $config['upload_path'] = './image/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']  = '2000';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if($this->upload->do_upload("gambar")){ //upload file
            $gbr = $this->upload->data();

            $config['image_library']    ='gd2';
            $config['source_image']     ='./image/'.$gbr['file_name'];
            $config['create_thumb']     = false;
            $config['maintain_ratio']   = TRUE;
            $config['quality']          = '60%';
            $config['width']            = 710;
            $config['height']           = 460;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $produk = clear($_POST['produk']);
            $string   = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $produk);
            $trim     = trim($string);
            $slug     = strtolower(str_replace(" ", "-", $trim));
            $harga = str_replace(',','',clear($_POST['harga']));
            $lat = clear($_POST['lat']);
            $lng = clear($_POST['lng']);
            $pemilik = clear($_POST['pemilik']);
            $telp = clear($_POST['telp']);
            $ket = clear($_POST['ket']);
            $gambar = $gbr['file_name'];
            $iduser = $this->session->userdata("id");
            $nohp = str_replace(".","",$telp);
 
            // cek apakah no hp mengandung karakter + dan 0-9
            if(!preg_match('/[^+0-9]/',trim($telp))){
                // cek apakah no hp karakter 1-3 adalah +62
                if(substr(trim($telp), 0, 3)=='+62'){
                    $hp = trim($telp);
                }
                // cek apakah no hp karakter 1 adalah 0
                elseif(substr(trim($telp), 0, 1)=='0'){
                    $hp = '+62'.substr(trim($telp), 1);
                }
            }
            $result = $this->db->query("insert into produk_warga values('','$produk','$slug','$gambar','$harga','$ket','$lat','$lng','0','$pemilik','$hp','$iduser',now())");
            echo json_encode($result);
        }else{
            echo false;
        }
    }

    public function hapusproduk($id='')
    {
        $q = $this->db->query("select * from produk_warga where id='$id'");
        $row  =$q->row();
        unlink('./image/'.$row->gambar);
        $this->db->query("delete from produk_warga where id='$id'");
        echo true;        
    }

    public function editproduk($id=''){
        $data['id'] = $id;
        $this->load->view('layanan/atas', $data, FALSE);
        $this->load->view('layanan/editproduk', $data, FALSE);
        $this->load->view('layanan/bawah', $data, FALSE);
        
    }

    public function updateprodukwarga($id='')
    {
        $config['upload_path'] = './image/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']  = '3000';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if(!empty($_FILES['gambar']['name'])){
        if ( ! $this->upload->do_upload('gambar')){
               echo false;
            } else {
            $gbr = $this->upload->data();
            //Compress Image
            $config['image_library']    ='gd2';
            $config['source_image']     ='./image/'.$gbr['file_name'];
            $config['create_thumb']     = FALSE;
            $config['maintain_ratio']   = TRUE;
            $config['quality']          = '60%';
            $config['width']            = 710;
            $config['height']           = 460;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $produk = clear($_POST['produk']);
            $string   = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $produk);
            $trim     = trim($string);
            $slug     = strtolower(str_replace(" ", "-", $trim));
            $harga = str_replace(',','',clear($_POST['harga']));
            $lat = clear($_POST['lat']);
            $lng = clear($_POST['lng']);
            $pemilik = clear($_POST['pemilik']);
            $telp = clear($_POST['telp']);
            $ket = clear($_POST['ket']);
            $gambar = $gbr['file_name'];
            $iduser = $this->session->userdata("id");
            $nohp = str_replace(".","",$telp);
 
            // cek apakah no hp mengandung karakter + dan 0-9
            if(!preg_match('/[^+0-9]/',trim($telp))){
                // cek apakah no hp karakter 1-3 adalah +62
                if(substr(trim($telp), 0, 3)=='+62'){
                    $hp = trim($telp);
                }
                // cek apakah no hp karakter 1 adalah 0
                elseif(substr(trim($telp), 0, 1)=='0'){
                    $hp = '+62'.substr(trim($telp), 1);
                }
            }
            $q  = $this->db->query("select * from produk_warga where id='$id'");
            $row = $q->row();
            unlink('./image/'.$row->gambar);
            $result = $this->db->query("update produk_warga set produk='$produk',slug='$slug',gambar='$gambar',harga='$harga',ket='$ket',lat='$lat',lng='$lng',pemilik='$pemilik',telppemilik='$hp',iduser='$iduser',date=now() where id='$id'");
            echo json_encode($result);
        }} else {
            $produk = clear($_POST['produk']);
            $string   = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $produk);
            $trim     = trim($string);
            $slug     = strtolower(str_replace(" ", "-", $trim));
            $harga = str_replace(',','',clear($_POST['harga']));
            $lat = clear($_POST['lat']);
            $lng = clear($_POST['lng']);
            $pemilik = clear($_POST['pemilik']);
            $telp = clear($_POST['telp']);
            $ket = clear($_POST['ket']);
            $iduser = $this->session->userdata("id");
            $nohp = str_replace(".","",$telp);
 
            // cek apakah no hp mengandung karakter + dan 0-9
            if(!preg_match('/[^+0-9]/',trim($telp))){
                // cek apakah no hp karakter 1-3 adalah +62
                if(substr(trim($telp), 0, 3)=='+62'){
                    $hp = trim($telp);
                }
                // cek apakah no hp karakter 1 adalah 0
                elseif(substr(trim($telp), 0, 1)=='0'){
                    $hp = '+62'.substr(trim($telp), 1);
                }
            }
            $result = $this->db->query("update produk_warga set produk='$produk',slug='$slug',harga='$harga',ket='$ket',lat='$lat',lng='$lng',pemilik='$pemilik',telppemilik='$telp',iduser='$iduser',date=now() where id='$id'");
            echo json_encode($result);
        }
    }
}

/* End of file Layanan.php */
