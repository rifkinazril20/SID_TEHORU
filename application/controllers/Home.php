<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('main_model');
        $this->main_model->count_visitor();
        
    }
    
    public function index()
    {
        $this->load->view('home/atas');
        $this->load->view('home/index');
        $this->load->view('home/bawah');
        
    }

    
  public function berita()
  {
    $this->load->library('pagination');
    $jum = $this->db->query("select berita.*,admin.nama,kategori.kat from berita inner join admin on admin.id = berita.iduser inner join kategori on kategori.id = berita.idkat");

    $page=$this->uri->segment(3);
    if(!$page):
        $offset = 0;
    else:
        $offset = $page;
    endif;
    $limit=3;
    $config['base_url'] = base_url() . 'home/berita/';
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
    $config['cur_tag_close']    = '<span class="sr-only"></span></span></li>';
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
    $data['q']=$this->main_model->berita__home_perpage($offset,$limit);
    $data['populer']=$this->db->query("select * from berita order by views desc limit 5")->result();
    $data['kategori']=$this->db->query("select berita.*,count(berita.idkat) as jml,kategori.* from berita left join kategori on kategori.id = berita.idkat group by kategori.id")->result();
    $this->load->view('home/atas');
    $this->load->view('home/berita',$data);
    $this->load->view('home/bawah');
  }      

    function searchBerita(){
      $keyword=str_replace("'", "", htmlspecialchars($this->input->get('keyword',TRUE),ENT_QUOTES));
      $query=$this->main_model->cari_beita($keyword);
      if($query->num_rows() > 0){
        $x['q']=$query;
        $x['kategori']=$this->db->query("select berita.*,count(berita.idkat) as jml,kategori.* from berita left join kategori on kategori.id = berita.idkat group by kategori.id")->result();

                  $x['populer']=$this->db->query("select * from berita order by views desc limit 5")->result();
                  $this->load->view('home/atas');
                  $this->load->view('home/berita',$x);
                  $this->load->view('home/bawah');
      }else{
      echo $this->session->set_flashdata('msg','<div class="alert alert-danger">Tidak dapat menemukan artikel / berita dengan kata kunci <b>'.$keyword.'</b></div>');
      redirect('home/berita');
    }
  }
	function kategori(){
        $kategori=str_replace("-"," ",$this->uri->segment(3));
        $query = $this->db->query("SELECT berita.*,kategori.kat,admin.nama FROM berita inner join admin on admin.id = berita.iduser inner join kategori on kategori.id = berita.idkat WHERE kategori.kat LIKE '%$kategori%' ORDER BY berita.views DESC LIMIT 5");
        if($query->num_rows() > 0){
            $x['q']=$query;
            $x['kategori']=$this->db->query("select berita.*,count(berita.idkat) as jml,kategori.* from berita left join kategori on kategori.id = berita.idkat group by kategori.id")->result();

            $x['populer']=$this->db->query("select * from berita order by views desc limit 5")->result();
            $this->load->view('home/atas');
            $this->load->view('home/berita',$x);
            $this->load->view('home/bawah');
        }else{
            echo $this->session->set_flashdata('msg','<div class="alert alert-danger">Tidak Ada artikel untuk kategori <b>'.$kategori.'</b></div>');
            redirect('artikel');
        }
   }


  public function detailberita($slugs)
  {
    $slug=htmlspecialchars($slugs,ENT_QUOTES);
    $query = $this->db->query("select berita.*,admin.nama,kategori.kat from berita inner join admin on admin.id = berita.iduser inner join kategori on kategori.id = berita.idkat  where slug='$slug'");
    if($query->num_rows() > 0){
        $b=$query->row_array();
        $kode=$b['id'];
        $this->db->query("UPDATE berita SET views=views+1 WHERE id='$kode'");
        $data=$this->main_model->berita_by_kode($kode);
        $row=$data->row_array();
        $x['id']=$row['id'];
        $x['judul']=$row['judul'];
        $x['date']=$row['date'];
        $x['nama']=$row['nama'];
        $x['kat']=$row['kat'];
        $x['ket']=$row['ket'];
        $x['image1']=$row['gambar'];
        $x['view'] =$row['views'];
        $x['slug']=$row['slug'];
        $x['kategori']=$this->db->query("select berita.*,count(berita.idkat) as jml,kategori.* from berita left join kategori on kategori.id = berita.idkat group by kategori.id")->result();

        $x['populer']=$this->db->query("select * from berita order by views desc limit 5")->result();
        $x['totalkoment'] = $this->db->query("select * from komentar_berita where idberita='$kode'")->num_rows();
        $this->load->view('home/atas');
        $this->load->view('home/detailberita',$x);
        $this->load->view('home/bawah');
    }else{
        redirect('home/berita','refresh');
    }
  }

  
  
  public function loadkomentberita($id='')
    { 
    $setting = $this->db->get('setting')->row();

    $totalkoment = $this->db->query("select * from komentar_berita where idberita='$id'")->num_rows();

        $show_komentar = $this->main_model->show_komentar_by_berita_id($id);
        ?>
  <h4 class="comments-count"><?php echo $totalkoment ?> Comments</h4>

<?php 
  if($show_komentar->num_rows() < 0){

?>
<div class="alert alert-primary" role="alert">
  <strong>Informasi</strong> Belum ada komentar untuk akomodasi saat ini!
</div>
<?php }else{ ?>
 <?php foreach($show_komentar->result() as $row){ ?>
    <div id="comment-1" class="comment">
    <div class="d-flex">
      <div class="comment-img"><img src="image/<?php  echo $setting->logo ?>" alt=""></div>
      <div>
        <h5><a href=""><?php echo $row->nama ?></a> <a href="#" class="reply"></a></h5>
        <time datetime="2020-01-01"><?php echo date("d F Y",strtotime($row->date)) ?></time>
        <p>
         <?php echo $row->komen ?>
        </p>
      </div>
    </div>
  </div><!-- End comment #1 -->

    <?php  } ?>
  <?php }  ?>

    <?php 
    
    $vals = [
        // 'word' -> nantinya akan digunakan sebagai random teks yang akan keluar di captchanya
        'word'          => substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 5),
        'img_path'      => './captcha/',
        'img_url'       => base_url('captcha/'),
        'font_path'     => FCPATH.'texb.ttf',
        'img_width'     => 300,
        'img_height'    => 80,
        'expiration'    => 7200,
        'word_length'   => 5,
        'font_size'     => 40,
        'img_id'        => 'Imageid',
        'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
        'colors'        => [
                'background'=> [255, 255, 255],
                'border'    => [255, 255, 255],
                'text'      => [0, 0, 0],
                'grid'      => [255, 40, 40]
        ]
    ];
    
    $captcha = create_captcha($vals);

    $this->session->set_userdata('captcha', $captcha['word']);
    
    ?>
   <div class="reply-form">
            <h4>Leave a Reply</h4>
            <p>Your email address will not be published. Required fields are marked * </p>
            <form action="home/savekomentberita" id="masuk" method="POST">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input name="nama" type="text" class="form-control" placeholder="Your Name*">
                  <input name="idakomodasi" type="hidden" value="<?php echo $id ?>" class="form-control" placeholder="Your Name*">
                </div>
                <div class="col-md-6 form-group">
                  <input name="email" type="text" class="form-control" placeholder="Your Email*">
                </div>
              </div>
              
              <div class="row">
                <div class="col form-group">
                  <textarea name="isi" class="form-control" placeholder="Your Comment*"></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col form-group">
                <?=
                $captcha['image'];
                ?><br/>
                <br>
                <input type="text" class="form-control" name="captcha" placeholder="Silahkan Isi Capthca">
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Post Comment</button>

            </form>
			<script type="text/javascript">
	$(document).ready(function()
	{
		$("#masuk").on('submit',function(e){
			e.preventDefault();
			$.ajax({
			  url:$(this).attr('action'),
			  type: 'post',
			  data: $(this).serialize(),
			  dataType: "html",
			  success: function(dt){
				if(dt==0){
					Swal.fire(
					  'Informasi',
					  'Maaf Captcha Yang Anda Ketikkan Salah!',
					  'warning'
					)
				}else{
                    Swal.fire(
                        "Informasi",
                        "Terimasi kasih,komentar anda berhasil terkirim!",
                        "success"
                    );
                    $("#loadkoment").load("home/loadkomentberita/<?php echo $id; ?>")



				}
			  }
			});
		});
		});
	</script>
          </div>
  <?php  }

public function savekomentberita($id='')
{
    $post_code  = $this->input->post('captcha');
    $captcha    = $this->session->userdata('captcha');
    if ($post_code && ($post_code == $captcha)){
        $nama = clear($_POST['nama']); 
        $email = clear($_POST['email']); 
        $isi = clear($_POST['isi']); 
        $idakomodasi = clear($_POST['idakomodasi']); 
        $this->db->query("insert into komentar_berita values('','$idakomodasi','$nama','$email','$isi',now())");
        echo true;
    }else{
        echo false;
    }
}
    
public function event()
{
  $this->load->library('pagination');
  $jum  = $this->db->get('event');
  $page=$this->uri->segment(3);
  if(!$page):
      $offset = 0;
  else:
      $offset = $page;
  endif;
  $limit=3;
  $config['base_url'] = base_url() . 'home/event/';
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
  $config['cur_tag_close']    = '<span class="sr-only"></span></span></li>';
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
  $data['q']=$this->main_model->eventhome_perpage($offset,$limit);
  $data['populer']=$this->db->query("select * from event where status='0'")->result();
  $this->load->view('home/atas');
  $this->load->view('home/event',$data);
  $this->load->view('home/bawah');      

}


function searchEvent(){
  $keyword=str_replace("'", "", htmlspecialchars($this->input->get('keyword',TRUE),ENT_QUOTES));
  $query=$this->main_model->cari_event($keyword);
  if($query->num_rows() > 0){
    $x['q']=$query;
              $x['populer']=$this->db->query("select * from event where status='0'")->result();
              $this->load->view('home/atas');
              $this->load->view('home/event',$x);
              $this->load->view('home/bawah');
  }else{
   echo $this->session->set_flashdata('msg','<div class="alert alert-danger">Tidak dapat menemukan event dengan kata kunci <b>'.$keyword.'</b></div>');
   redirect('home/event');
 }
}

    public function eventpage($slugs)
    {
    $slug=htmlspecialchars($slugs,ENT_QUOTES);
    $query = $this->db->query("select * from event  where slug='$slug'");
    if($query->num_rows() > 0){
        $b=$query->row_array();
        $kode=$b['id'];
        $this->db->query("UPDATE event SET view=view+1 WHERE id='$kode'");
        $data=$this->main_model->event_by_kode($kode);
        $row=$data->row_array();
        $x['id']=$row['id'];
        $x['judul']=$row['judul'];
        $x['mulai']=$row['mulai'];
        $x['selesai']=$row['selesai'];
        $x['ket']=$row['ket'];
        $x['lokasi']=$row['lokasi'];
        $x['image1']=$row['gambar'];
        $x['image2']=$row['gambar2'];
        $x['image3']=$row['gambar3'];
        $x['view'] =$row['view'];
        $x['slug']=$row['slug'];
        $x['lat']=$row['lat'];
        $x['lng']=$row['lng'];
        $x['populer']=$this->db->query("select * from event where status='0'")->result();
        $this->load->view('home/atas');
        $this->load->view('home/eventpage',$x);
        $this->load->view('home/bawah');
    }else{
        redirect('home/akomodasi','refresh');
    }
  }

  public function pengumuman()
  {
    $this->load->library('pagination');
    $jum  = $this->db->query("select pengumuman.*,admin.nama from pengumuman inner join admin on admin.id = pengumuman.iduser");
    $page=$this->uri->segment(3);
    if(!$page):
        $offset = 0;
    else:
        $offset = $page;
    endif;
    $limit=3;
    $config['base_url'] = base_url() . 'home/pengumuman/';
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
    $data['q']=$this->main_model->pengumuman_perpage($offset,$limit);
    $data['populer']=$this->db->query("select * from pengumuman order by views")->result();
    $this->load->view('home/atas');
    $this->load->view('home/pengumuman',$data);
    $this->load->view('home/bawah');
  }

    

  function searchPengumuman(){
    $keyword=str_replace("'", "", htmlspecialchars($this->input->get('keyword',TRUE),ENT_QUOTES));
    $query=$this->main_model->cari_pengumuman($keyword);
    if($query->num_rows() > 0){
      $x['q']=$query;
                $x['populer']=$this->db->query("select * from pengumuman order by views")->result();
                $this->load->view('home/atas');
                $this->load->view('home/pengumuman',$x);
                $this->load->view('home/bawah');
    }else{
    echo $this->session->set_flashdata('msg','<div class="alert alert-danger">Tidak dapat menemukan pengumuman dengan kata kunci <b>'.$keyword.'</b></div>');
    redirect('home/pengumuman');
  }
  }

  public function pengumumanpage($slugs)
  {
  $slug=htmlspecialchars($slugs,ENT_QUOTES);
  $query = $this->db->query("select * from pengumuman  where slug='$slug'");
  if($query->num_rows() > 0){
      $b=$query->row_array();
      $kode=$b['id'];
      $this->db->query("UPDATE pengumuman SET views=views+1 WHERE id='$kode'");
      $data=$this->main_model->pengumuman_by_kode($kode);
      $row=$data->row_array();
      $x['id']=$row['id'];
      $x['judul']=$row['judul'];
      $x['nama']=$row['nama'];
      $x['ket']=$row['ket'];
      $x['image']=$row['gambar'];
      $x['view'] =$row['views'];
      $x['slug']=$row['slug'];
      $x['date']=$row['date'];
      $x['populer']=$this->db->query("select * from pengumuman order by views")->result();
      $this->load->view('home/atas');
      $this->load->view('home/pengumumanpage',$x);
      $this->load->view('home/bawah');
  }else{
      redirect('home/pengumuman','refresh');
  }
  }

  public function produkwarga()
  {
    $this->load->library('pagination');
    $jum  = $this->db->query("select produk_warga.* from produk_warga");
    $page=$this->uri->segment(3);
    if(!$page):
        $offset = 0;
    else:
        $offset = $page;
    endif;
    $limit=6;
    $config['base_url'] = base_url() . 'home/produkwarga/';
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
    $data['qe']=$this->main_model->produk_perpage($offset,$limit);
    $this->load->view('home/atas');
    $this->load->view('home/produkwarga',$data);
    $this->load->view('home/bawah');
  }

    public function produkdetail($slugs)
    {
    $slug=htmlspecialchars($slugs,ENT_QUOTES);
    $query = $this->db->query("select * from produk_warga  where slug='$slug'");
    if($query->num_rows() > 0){
        $b=$query->row_array();
        $kode=$b['id'];
        $this->db->query("UPDATE produk_warga SET view=view+1 WHERE id='$kode'");
        $data=$this->main_model->produkwarga_by_kode($kode);
        $row=$data->row_array();
        $x['id']=$row['id'];
        $x['produk']=$row['produk'];
        $x['harga']=$row['harga'];
        $x['telppemilik']=$row['telppemilik'];
        $x['ket']=$row['ket'];
        $x['date']=$row['date'];
        $x['pemilik']=$row['pemilik'];
        $x['image']=$row['gambar'];
        $x['view'] =$row['view'];
        $x['slug']=$row['slug'];
        $x['lat']=$row['lat'];
        $x['lng']=$row['lng'];
        $x['populer']=$this->db->query("select * from produk_warga order by view desc")->result();
        $this->load->view('home/atas');
        $this->load->view('home/produkdetail',$x);
        $this->load->view('home/bawah');
    }else{
        redirect('home/produkwarga','refresh');
    }
  }

  function cariProdukwarga(){
    $keyword=str_replace("'", "", htmlspecialchars($this->input->get('keyword',TRUE),ENT_QUOTES));
    $query=$this->main_model->cariProdukwarga($keyword);
    if($query->num_rows() > 0){
      $x['qe']=$query;
                $this->load->view('home/atas');
                $this->load->view('home/produkwarga',$x);
                $this->load->view('home/bawah');
    }else{
    echo $this->session->set_flashdata('msg','<div class="alert alert-danger">Tidak dapat menemukan produk warga dengan kata kunci <b>'.$keyword.'</b></div>');
    redirect('home/produkwarga');
  }
  }

  public function produkbumdes()
  {
    $this->load->library('pagination');
    $jum  = $this->db->query("select produk_bumdes.* from produk_bumdes");
    $page=$this->uri->segment(3);
    if(!$page):
        $offset = 0;
    else:
        $offset = $page;
    endif;
    $limit=3;
    $config['base_url'] = base_url() . 'home/produkbumdes/';
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
    $data['qe']=$this->main_model->produkbumdes_perpage($offset,$limit);
    $this->load->view('home/atas');
    $this->load->view('home/produkbumdes',$data);
    $this->load->view('home/bawah');
    
  }
  
  function cariProdukbumdes(){
    $keyword=str_replace("'", "", htmlspecialchars($this->input->get('keyword',TRUE),ENT_QUOTES));
    $query=$this->main_model->caripodukbumdes($keyword);
    if($query->num_rows() > 0){
      $x['qe']=$query;
                $this->load->view('home/atas');
                $this->load->view('home/produkbumdes',$x);
                $this->load->view('home/bawah');
    }else{
    echo $this->session->set_flashdata('msg','<div class="alert alert-danger">Tidak dapat menemukan produk BUMDES dengan kata kunci <b>'.$keyword.'</b></div>');
    redirect('home/produkbumdes');
  }
  }

  public function detailbumdes($slugs)
  {
  $slug=htmlspecialchars($slugs,ENT_QUOTES);
  $query = $this->db->query("select * from produk_bumdes  where slug='$slug'");
  if($query->num_rows() > 0){
      $b=$query->row_array();
      $kode=$b['id'];
      $this->db->query("UPDATE produk_bumdes SET view=view+1 WHERE id='$kode'");
      $data=$this->main_model->produkbumdes_by_kode($kode);
      $row=$data->row_array();
      $x['id']=$row['id'];
      $x['produk']=$row['produk'];
      $x['harga']=$row['harga'];
      $x['kategori']=$row['kategori'];
      $x['desk']=$row['desk'];
      $x['date']=$row['date'];
      $x['image']=$row['gambar'];
      $x['view'] =$row['view'];
      $x['slug']=$row['slug'];
      $x['telp']=$row['telp'];
      $x['populer']=$this->db->query("select * from produk_bumdes order by view desc")->result();
      $this->load->view('home/atas');
      $this->load->view('home/produkbumdesdetail',$x);
      $this->load->view('home/bawah');
  }else{
      redirect('home/produkbumdes','refresh');
  }
  }

  public function galeri()
  {
    $this->load->library('pagination');
        $jum = $this->db->query("select * from galeri where status='Publish'");
        $page=$this->uri->segment(3);
        if(!$page):
            $offset = 0;
        else:
            $offset = $page;
        endif;
        $limit=6;
        $config['base_url'] = base_url() . 'home/galeri/';
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
        $data['qe']=$this->main_model->galeripublish_page($offset,$limit);

        $this->load->view('home/atas');
        $this->load->view('home/galeri',$data);
        $this->load->view('home/bawah');      
  }

  public function wilayah()
  {
    $this->load->view('home/atas');
    $this->load->view('home/wilayah');
    $this->load->view('home/bawah');   
  }
  public function sejarah()
  {
    $this->load->view('home/atas');
    $this->load->view('home/sejarah');
    $this->load->view('home/bawah');   
  }
  public function visimisi()
  {
    $this->load->view('home/atas');
    $this->load->view('home/visimisi');
    $this->load->view('home/bawah');   
  }
  public function struktur()
  {
    $this->load->view('home/atas');
    $this->load->view('home/struktur');
    $this->load->view('home/bawah');   
  }
  public function bpd()
  {
    $this->load->view('home/atas');
    $this->load->view('home/bpd');
    $this->load->view('home/bawah');   
  }
  public function pengaduan()
  {
    $this->load->view('home/atas');
    $this->load->view('home/pengaduan');
    $this->load->view('home/bawah');   
  }
  public function daftar()
  {
    $this->load->view('home/atas');
    $this->load->view('home/daftar');
    $this->load->view('home/bawah');   
  }

  public function savependuduk()
  {
      $nama = clear($_POST['nama']);
      $nokk = clear($_POST['nokk']);
      $nik = clear($_POST['nik']);
      $jk = clear($_POST['jk']);
      $tempatlahir = clear($_POST['tempatlahir']);
      $tgllahir = clear($_POST['tgllahir']);
      $umur = clear($_POST['umur']);
      $statuskawin = clear($_POST['statuskawin']);
      $warganegara = clear($_POST['warganegara']);
      $agama = clear($_POST['agama']);
      $pendidikan = clear($_POST['pendidikan']);
      $rt = clear($_POST['rt']);
      $rw = clear($_POST['rw']);
      $dusun = clear($_POST['dusun']);
      $alamat = clear($_POST['alamat']);

      $this->db->query("insert into penduduk values('','$nama','$jk','$tempatlahir','$tgllahir','$umur','$statuskawin','$warganegara',
      '$agama','$pendidikan','$nik','$rt','$rw','$dusun','$nokk',now(),'$alamat','0'
      )");
      echo true;
  }

  public function login()
  {
    $nik = clear($_POST['nik']);
    $q = $this->db->query("select * from penduduk where nik='$nik' and status='1'");
    if($q->num_rows() > 0){
      $row = $q->row();
      $data = [
        "id"  => $row->id,
        "nama"  => $row->nama,
      ];
      
      $this->session->set_userdata($data);
      echo "layanan/index";
    }else{
      echo false;
    }
  }
}

/* End of file Home.php */
