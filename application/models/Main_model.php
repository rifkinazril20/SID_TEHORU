<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Main_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		function clear($x = '')
		{
			$con = new mysqli("localhost", "root", "", "website_desa");
			$aman = mysqli_real_escape_string($con, $x);
			return $aman;
		}
	}


	public function galeri_page($offset, $limit)
	{
		$hsl = $this->db->query("select * from galeri limit $offset,$limit");
		return 	$hsl;
	}
	public function galeripublish_page($offset, $limit)
	{
		$hsl = $this->db->query("select * from galeri where status='Publish' limit $offset,$limit");
		return 	$hsl;
	}

	public function event_perpage($offset, $limit)
	{
		$hsl = $this->db->query("select * from event  limit  $offset,$limit");
		return 	$hsl;
	}
	public function pengumuman_perpage($offset, $limit)
	{
		$hsl = $this->db->query("select pengumuman.*,admin.nama from pengumuman inner join admin on admin.id = pengumuman.iduser  limit  $offset,$limit");
		return 	$hsl;
	}
	function pengumuman_by_kode($kode)
	{
		$hsl = $this->db->query("select pengumuman.*,admin.nama from pengumuman inner join admin on admin.id = pengumuman.iduser  where pengumuman.id='$kode'");
		return $hsl;
	}

	function cari_pengumuman($keyword)
	{
		$hsl = $this->db->query("select pengumuman.*,admin.nama from pengumuman inner join admin on admin.id = pengumuman.iduser where judul LIKE '%$keyword%' LIMIT 5");
		return $hsl;
	}
	function caripodukbumdes($keyword)
	{
		$hsl = $this->db->query("select produk_bumdes.* from produk_bumdes where produk LIKE '%$keyword%' LIMIT 5");
		return $hsl;
	}

	function cariProdukwarga($keyword)
	{
		$hsl = $this->db->query("select produk_warga.*,admin.nama from produk_warga inner join admin on admin.id = produk_warga.iduser  where produk_warga.produk LIKE '%$keyword%' LIMIT 5");
		return $hsl;
	}
	public function produk_perpage($offset, $limit)
	{
		$hsl = $this->db->query("select produk_warga.* from produk_warga   limit  $offset,$limit");
		return 	$hsl;
	}
	public function produkwarga_by_kode($kode)
	{
		$hsl = $this->db->query("select produk_warga.*from produk_warga  where produk_warga.id='$kode'");
		return 	$hsl;
	}
	public function produkbumdes_by_kode($kode)
	{
		$hsl = $this->db->query("select produk_bumdes.* from produk_bumdes where id='$kode'");
		return 	$hsl;
	}

	public function produkbumdes_perpage($offset, $limit)
	{
		$hsl = $this->db->query("select produk_bumdes.* from produk_bumdes limit  $offset,$limit");
		return 	$hsl;
	}


	public function berita_perpage($offset, $limit)
	{
		$hsl = $this->db->query("select berita.*,admin.nama,kategori.kat from berita inner join admin on admin.id = berita.iduser inner join kategori on kategori.id = berita.idkat limit  $offset,$limit");
		return 	$hsl;
	}

	public function berita__home_perpage($offset, $limit)
	{
		$hsl = $this->db->query("select berita.*,admin.nama,kategori.kat from berita inner join admin on admin.id = berita.iduser inner join kategori on kategori.id = berita.idkat limit  $offset,$limit");
		return 	$hsl;
	}


	function cari_beita($keyword)
	{
		$hsl = $this->db->query("select berita.*,admin.nama,kategori.kat from berita inner join admin on admin.id = berita.iduser inner join kategori on kategori.id = berita.idkat where judul LIKE '%$keyword%' LIMIT 5");
		return $hsl;
	}


	function show_komentar_by_berita_id($kode)
	{
		$hsl = $this->db->query("SELECT * FROM komentar_berita WHERE idberita='$kode'");
		return $hsl;
	}


	function berita_by_kode($kode)
	{
		$hsl = $this->db->query("select berita.*,admin.nama,kategori.kat from berita inner join admin on admin.id = berita.iduser inner join kategori on kategori.id = berita.idkat where berita.id='$kode'");
		return $hsl;
	}

	public function eventhome_perpage($offset, $limit)
	{
		$hsl = $this->db->query("select * from event  limit  $offset,$limit");
		return 	$hsl;
	}


	function cari_event($keyword)
	{
		$hsl = $this->db->query("select * from event where judul LIKE '%$keyword%' LIMIT 5");
		return $hsl;
	}


	function event_by_kode($kode)
	{
		$hsl = $this->db->query("select * from event  where id='$kode'");
		return $hsl;
	}

	public function produk_perpage_layanan($offset, $limit)
	{
		$id = $this->session->userdata("nama");
		$hsl = $this->db->query("select produk_warga.* from produk_warga where pemilik='$id'  limit  $offset,$limit");
		return 	$hsl;
	}

	public function count_visitor()
	{
		$user_ip = $_SERVER['REMOTE_ADDR'];
		if ($this->agent->is_browser()) {
			$agent = $this->agent->browser();
		} elseif ($this->agent->is_robot()) {
			$agent = $this->agent->robot();
		} elseif ($this->agent->is_mobile()) {
			$agent = $this->agent->mobile();
		} else {
			$agent = 'Other';
		}
		$cek_ip = $this->db->query("SELECT * FROM pengunjung WHERE pengunjung_ip='$user_ip' AND DATE(pengunjung_tanggal)=CURDATE()");
		if ($cek_ip->num_rows() <= 0) {
			$hsl = $this->db->query("INSERT INTO pengunjung VALUES('',now(),'$user_ip','$agent')");
			return $hsl;
		}
	}
}

/* End of file Main_model.php */
