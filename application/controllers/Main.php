<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('main_model');
        if (!$this->session->userdata('id')) {
            redirect('welcome');
        }
    }

    public function index()
    {
        $this->load->view('backend/atas');
        $this->load->view('backend/index');
        $this->load->view('backend/bawah');
    }

    public function apbd()
    {
        $this->load->view('backend/atas');
        $this->load->view('backend/apbd');
        $this->load->view('backend/bawah');
    }

    public function inputapbd()
    {
        $this->load->view('backend/atas');
        $this->load->view('backend/inputapbd');
        $this->load->view('backend/bawah');
    }

    public function saveapb()
    {
        $tahun = clear($_POST['tahun']);
        $jenis = clear($_POST['jenis']);
        $rincian = clear($_POST['rincian']);
        $anggaran = str_replace(",", "", $_POST['anggaran']);
        $nilai = str_replace(",", "", $_POST['nilai']);
        $this->db->query("insert into keuangan values('','$tahun','$jenis','$rincian','$anggaran','$nilai')");
        echo true;
    }

    public function delapb($id = '')
    {
        $this->db->query("delete from keuangan where id='$id'");
        echo true;
    }

    public function loadpendapatan()
    { ?>

        <table width='100%' class='table table-hover table-striped dttable'>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tahun</th>
                    <th>Jenis Anggaran</th>
                    <th>Rincian</th>
                    <th>Anggaran</th>
                    <th>Realisasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $q = $this->db->query("select * from keuangan where jenis_anggaran='Pendapatan'");
                foreach ($q->result() as $row) {
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row->tahun; ?></td>
                        <td><?php echo $row->jenis_anggaran; ?></td>
                        <td><?php echo $row->rincian; ?></td>
                        <td><?php echo number_format($row->nilai_anggaran, 0, ',', '.'); ?></td>
                        <td><?php echo number_format($row->nilai_realisasi, 0, ',', '.'); ?></td>
                        <td>
                            <a href="main/delapb/<?php echo $row->id ?>" class="btn btn-danger btn-sm hapus"><i class="fa fa-trash"></i></a>
                            <a href="main/editapb/<?php echo $row->id ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                        </td>
                    </tr>
                <?php $no++;
                } ?>
            </tbody>
        </table>
        <script>
            $(".hapus").click(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Hapus Data ?',
                    text: "Data yang sudah dihapus tidak bisa kembali !",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yaa, hapus data !'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: $(this).attr('href'),
                            type: 'post',
                            data: $(this).serialize(),
                            dataType: "html",
                            success: function(dt) {
                                Swal.fire(
                                    'Informasi',
                                    'Data berhasil dihapus !',
                                    'success'
                                );
                                $("#pendapatan").load("main/loadpendapatan");
                                $("#belanja").load("main/loadbelanja");
                                $("#biaya").load("main/loadbiaya");
                            },
                            error: function(dt) {
                                Swal.fire(
                                    "Informasi",
                                    "Ada kesalahan sistem!",
                                    "warning"
                                );
                            },
                        });
                    } else return false;
                })

            });
            $('.dttable').DataTable();
        </script>

    <?php   }
    public function loadbelanja()
    { ?>

        <table width='100%' class='table table-hover table-striped dttable'>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tahun</th>
                    <th>Jenis Anggaran</th>
                    <th>Rincian</th>
                    <th>Anggaran</th>
                    <th>Realisasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $q = $this->db->query("select * from keuangan where jenis_anggaran='Belanja'");
                foreach ($q->result() as $row) {
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row->tahun; ?></td>
                        <td><?php echo $row->jenis_anggaran; ?></td>
                        <td><?php echo $row->rincian; ?></td>
                        <td><?php echo number_format($row->nilai_anggaran, 0, ',', '.'); ?></td>
                        <td><?php echo number_format($row->nilai_realisasi, 0, ',', '.'); ?></td>
                        <td>
                            <a href="main/delapb/<?php echo $row->id ?>" class="btn btn-danger btn-sm hapus"><i class="fa fa-trash"></i></a>
                            <a href="main/editapb/<?php echo $row->id ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>

                        </td>
                    </tr>
                <?php $no++;
                } ?>
            </tbody>
        </table>
        <script>
            $(".hapus").click(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Hapus Data ?',
                    text: "Data yang sudah dihapus tidak bisa kembali !",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yaa, hapus data !'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: $(this).attr('href'),
                            type: 'post',
                            data: $(this).serialize(),
                            dataType: "html",
                            success: function(dt) {
                                Swal.fire(
                                    'Informasi',
                                    'Data berhasil dihapus !',
                                    'success'
                                );
                                $("#pendapatan").load("main/loadpendapatan");
                                $("#belanja").load("main/loadbelanja");
                                $("#biaya").load("main/loadbiaya");
                            },
                            error: function(dt) {
                                Swal.fire(
                                    "Informasi",
                                    "Ada kesalahan sistem!",
                                    "warning"
                                );
                            },
                        });
                    } else return false;
                })

            });
            $('.dttable').DataTable();
        </script>


    <?php   }
    public function loadbiaya()
    { ?>

        <table width='100%' class='table table-hover table-striped dttable'>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tahun</th>
                    <th>Jenis Anggaran</th>
                    <th>Rincian</th>
                    <th>Anggaran</th>
                    <th>Realisasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $q = $this->db->query("select * from keuangan where jenis_anggaran='Pembiayaan'");
                foreach ($q->result() as $row) {
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row->tahun; ?></td>
                        <td><?php echo $row->jenis_anggaran; ?></td>
                        <td><?php echo $row->rincian; ?></td>
                        <td><?php echo number_format($row->nilai_anggaran, 0, ',', '.'); ?></td>
                        <td><?php echo number_format($row->nilai_realisasi, 0, ',', '.'); ?></td>
                        <td>
                            <a href="main/delapb/<?php echo $row->id ?>" class="btn btn-danger btn-sm hapus"><i class="fa fa-trash"></i></a>
                            <a href="main/editapb/<?php echo $row->id ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>

                        </td>
                    </tr>
                <?php $no++;
                } ?>
            </tbody>
        </table>
        <script>
            $(".hapus").click(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Hapus Data ?',
                    text: "Data yang sudah dihapus tidak bisa kembali !",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yaa, hapus data !'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: $(this).attr('href'),
                            type: 'post',
                            data: $(this).serialize(),
                            dataType: "html",
                            success: function(dt) {
                                Swal.fire(
                                    'Informasi',
                                    'Data berhasil dihapus !',
                                    'success'
                                );
                                $("#pendapatan").load("main/loadpendapatan");
                                $("#belanja").load("main/loadbelanja");
                                $("#biaya").load("main/loadbiaya");
                            },
                            error: function(dt) {
                                Swal.fire(
                                    "Informasi",
                                    "Ada kesalahan sistem!",
                                    "warning"
                                );
                            },
                        });
                    } else return false;
                })

            });
            $('.dttable').DataTable();
        </script>


    <?php   }

    public function editapb($id = '')
    {
        $data['id'] = $id;
        $this->load->view('backend/atas');
        $this->load->view('backend/editapbd', $data);
        $this->load->view('backend/bawah');
    }

    public function updateapb($id = '')
    {
        $tahun = clear($_POST['tahun']);
        $jenis = clear($_POST['jenis']);
        $rincian = clear($_POST['rincian']);
        $anggaran = str_replace(",", "", $_POST['anggaran']);
        $nilai = str_replace(",", "", $_POST['nilai']);
        $this->db->query("update keuangan set tahun='$tahun',jenis_anggaran='$jenis',rincian='$rincian',nilai_anggaran='$anggaran',nilai_realisasi='$nilai' where id='$id'");
        echo true;
    }

    public function penduduk()
    {
        $this->load->view('backend/atas');
        $this->load->view('backend/penduduk');
        $this->load->view('backend/bawah');
    }

    public function loadpenduduk()
    { ?>

        <table width='100%' class='table table-hover table-striped dttable'>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nokk</th>
                    <th>Nik</th>
                    <th>Tempat, Tanggal Lahir</th>
                    <th>Umur</th>
                    <th>Status Kawin</th>
                    <th>Warga Negara</th>
                    <th>Agama</th>
                    <th>Pendidikan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $q = $this->db->query("select * from penduduk");
                foreach ($q->result() as $row) {
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row->nama; ?></td>
                        <td><?php echo $row->nokk; ?></td>
                        <td><?php echo $row->nik; ?></td>
                        <td><?php echo $row->tempatlahir, ', ' . $row->tgllahir; ?></td>
                        <td><?php echo $row->umur; ?></td>
                        <td><?php echo $row->status_kawin; ?></td>
                        <td><?php echo $row->warganegara; ?></td>
                        <td><?php echo $row->agama; ?></td>
                        <td><?php echo $row->pendidikan; ?></td>
                        <td>
                            <a href="main/hapuspenduduk/<?php echo $row->id ?>" class="btn btn-danger btn-sm hapus"><i class="fa fa-trash"></i></a>
                            <a href="main/editpenduduk/<?php echo $row->id ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                            <a href="main/detailpenduduk/<?php echo $row->id ?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                <?php $no++;
                } ?>
            </tbody>
        </table>
        <script>
            $(".hapus").click(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Hapus Data ?',
                    text: "Data yang sudah dihapus tidak bisa kembali !",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yaa, hapus data !'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: $(this).attr('href'),
                            type: 'post',
                            data: $(this).serialize(),
                            dataType: "html",
                            success: function(dt) {
                                Swal.fire(
                                    'Informasi',
                                    'Data berhasil dihapus !',
                                    'success'
                                );
                                $("#penduduk").load("main/loadpenduduk");

                            },
                            error: function(dt) {
                                Swal.fire(
                                    "Informasi",
                                    "Ada kesalahan sistem!",
                                    "warning"
                                );
                            },
                        });
                    } else return false;
                })

            });
            $('.dttable').DataTable();
        </script>

    <?php    }

    public function addpenduduk()
    {
        $this->load->view('backend/atas');
        $this->load->view('backend/addpenduduk');
        $this->load->view('backend/bawah');
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

    public function hapuspenduduk($id = '')
    {
        $this->db->query("delete from penduduk where id='$id'");
        echo true;
    }

    public function editpenduduk($id = '')
    {
        $data['id'] = $id;
        $this->load->view('backend/atas');
        $this->load->view('backend/editpenduduk', $data);
        $this->load->view('backend/bawah');
    }

    public function updatependuduk($id = '')
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

        $query = $this->db->query("update penduduk set nama='$nama',jk='$jk',tempatlahir='$tempatlahir',tgllahir='$tgllahir',umur='$umur',status_kawin='$statuskawin',
        warganegara='$warganegara',agama='$agama',pendidikan='$pendidikan',nik='$nik',rt='$rt',rw='$rw',dusun='$dusun',nokk='$nokk',alamat='$alamat' where id='$id'
        ");
        if ($query) {
            echo true;
        } else {
            echo false;
        }
    }

    public function detailpenduduk($id = '')
    {
        $data['id'] = $id;
        $this->load->view('backend/atas');
        $this->load->view('backend/detailpenduduk', $data);
        $this->load->view('backend/bawah');
    }

    public function pendudukaktif()
    {
        $this->load->view('backend/atas');
        $this->load->view('backend/pendudukaktif');
        $this->load->view('backend/bawah');
    }

    public function loadpendudukaktif()
    { ?>

        <table width='100%' class='table table-hover table-striped dttable'>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nokk</th>
                    <th>Nik</th>
                    <th>Tempat, Tanggal Lahir</th>
                    <th>Umur</th>
                    <th>Status Kawin</th>
                    <th>Warga Negara</th>
                    <th>Agama</th>
                    <th>Pendidikan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $q = $this->db->query("select * from penduduk where status='1'");
                foreach ($q->result() as $row) {
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row->nama; ?></td>
                        <td><?php echo $row->nokk; ?></td>
                        <td><?php echo $row->nik; ?></td>
                        <td><?php echo $row->tempatlahir, ', ' . $row->tgllahir; ?></td>
                        <td><?php echo $row->umur; ?></td>
                        <td><?php echo $row->status_kawin; ?></td>
                        <td><?php echo $row->warganegara; ?></td>
                        <td><?php echo $row->agama; ?></td>
                        <td><?php echo $row->pendidikan; ?></td>
                        <td>
                            <?php if ($row->status == '1') { ?>
                                <span class="badge badge-pill badge-info">Aktif</span>
                            <?php } ?>

                        </td>
                        <td>
                            <a href="main/hapuspenduduk/<?php echo $row->id ?>" class="btn btn-danger btn-sm hapus"><i class="fa fa-trash"></i></a>
                            <a href="main/detailpenduduk/<?php echo $row->id ?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                            <a href="main/nonaktif/<?php echo $row->id ?>" class="btn btn-warning non btn-sm"><i class="fa fa-power-off"></i></a>
                        </td>
                    </tr>
                <?php $no++;
                } ?>
            </tbody>
        </table>
        <script>
            $(".hapus").click(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Hapus Data ?',
                    text: "Data yang sudah dihapus tidak bisa kembali !",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yaa, hapus data !'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: $(this).attr('href'),
                            type: 'post',
                            data: $(this).serialize(),
                            dataType: "html",
                            success: function(dt) {
                                Swal.fire(
                                    'Informasi',
                                    'Data berhasil dihapus !',
                                    'success'
                                );
                                $("#penduduk").load("main/loadpendudukaktif");

                            },
                            error: function(dt) {
                                Swal.fire(
                                    "Informasi",
                                    "Ada kesalahan sistem!",
                                    "warning"
                                );
                            },
                        });
                    } else return false;
                })

            });
            $(".non").click(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Informasi',
                    text: "Nonaktifkan akun? akun yang nonaktif tidak bisa melakukan login!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yaa'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: $(this).attr('href'),
                            type: 'post',
                            data: $(this).serialize(),
                            dataType: "html",
                            success: function(dt) {
                                Swal.fire(
                                    'Informasi',
                                    'Data berhasil nonaktifkan akun!',
                                    'success'
                                );
                                $("#penduduk").load("main/loadpendudukaktif");

                            },
                            error: function(dt) {
                                Swal.fire(
                                    "Informasi",
                                    "Ada kesalahan sistem!",
                                    "warning"
                                );
                            },
                        });
                    } else return false;
                })

            });
            $('.dttable').DataTable();
        </script>

    <?php    }

    public function nonaktif($id = '')
    {
        $this->db->query("update penduduk set status='0' where id='$id'");
        echo true;
    }

    public function aktif($id = '')
    {
        $this->db->query("update penduduk set status='1' where id='$id'");
        echo true;
    }

    public function pendudukbelumaktif()
    {
        $this->load->view('backend/atas');
        $this->load->view('backend/penduduknonaktif');
        $this->load->view('backend/bawah');
    }

    public function loadpendudukaktifnon()
    { ?>

        <table width='100%' class='table table-hover table-striped dttable'>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nokk</th>
                    <th>Nik</th>
                    <th>Tempat, Tanggal Lahir</th>
                    <th>Umur</th>
                    <th>Status Kawin</th>
                    <th>Warga Negara</th>
                    <th>Agama</th>
                    <th>Pendidikan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $q = $this->db->query("select * from penduduk where status='0'");
                foreach ($q->result() as $row) {
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row->nama; ?></td>
                        <td><?php echo $row->nokk; ?></td>
                        <td><?php echo $row->nik; ?></td>
                        <td><?php echo $row->tempatlahir, ', ' . $row->tgllahir; ?></td>
                        <td><?php echo $row->umur; ?></td>
                        <td><?php echo $row->status_kawin; ?></td>
                        <td><?php echo $row->warganegara; ?></td>
                        <td><?php echo $row->agama; ?></td>
                        <td><?php echo $row->pendidikan; ?></td>
                        <td>
                            <?php if ($row->status == '0') { ?>
                                <span class="badge badge-pill badge-danger">Nonaktif</span>
                            <?php } ?>

                        </td>
                        <td>
                            <a href="main/hapuspenduduk/<?php echo $row->id ?>" class="btn btn-danger btn-sm hapus"><i class="fa fa-trash"></i></a>
                            <a href="main/detailpenduduk/<?php echo $row->id ?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                            <a href="main/aktif/<?php echo $row->id ?>" class="btn btn-warning non btn-sm"><i class="fa fa-sync-alt"></i></a>
                        </td>
                    </tr>
                <?php $no++;
                } ?>
            </tbody>
        </table>
        <script>
            $(".hapus").click(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Hapus Data ?',
                    text: "Data yang sudah dihapus tidak bisa kembali !",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yaa, hapus data !'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: $(this).attr('href'),
                            type: 'post',
                            data: $(this).serialize(),
                            dataType: "html",
                            success: function(dt) {
                                Swal.fire(
                                    'Informasi',
                                    'Data berhasil dihapus !',
                                    'success'
                                );
                                $("#penduduk").load("main/loadpendudukaktifnon");

                            },
                            error: function(dt) {
                                Swal.fire(
                                    "Informasi",
                                    "Ada kesalahan sistem!",
                                    "warning"
                                );
                            },
                        });
                    } else return false;
                })

            });
            $(".non").click(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Informasi',
                    text: "Aktifkan akun? akun yang aktif bisa melakukan login!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yaa'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: $(this).attr('href'),
                            type: 'post',
                            data: $(this).serialize(),
                            dataType: "html",
                            success: function(dt) {
                                Swal.fire(
                                    'Informasi',
                                    'Data berhasil nonaktifkan akun!',
                                    'success'
                                );
                                $("#penduduk").load("main/loadpendudukaktifnon");

                            },
                            error: function(dt) {
                                Swal.fire(
                                    "Informasi",
                                    "Ada kesalahan sistem!",
                                    "warning"
                                );
                            },
                        });
                    } else return false;
                })
            });
            $('.dttable').DataTable();
        </script>

    <?php   }

    public function sejarah()
    {
        $this->load->view('backend/atas');
        $this->load->view('backend/sejarah');
        $this->load->view('backend/bawah');
    }

    public function updatesejarah()
    {
        $sejarah = clear($_POST['sejarah']);
        $this->db->query("update sejarah set deskripsi='$sejarah'");
        echo true;
    }

    public function visimisi()
    {
        $this->load->view('backend/atas');
        $this->load->view('backend/visimisi');
        $this->load->view('backend/bawah');
    }


    public function updatevisimisi()
    {
        $sejarah = clear($_POST['sejarah']);
        $this->db->query("update visi_misi set deskripsi='$sejarah'");
        echo true;
    }


    public function struktur()
    {
        $this->load->view('backend/atas');
        $this->load->view('backend/struktur');
        $this->load->view('backend/bawah');
    }


    public function updatestruktur()
    {
        $config['upload_path'] = './image/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']  = '3000';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if (!empty($_FILES['gambar']['name'])) {
            if (!$this->upload->do_upload('gambar')) {
                echo false;
            } else {
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']    = 'gd2';
                $config['source_image']     = './image/' . $gbr['file_name'];
                $config['create_thumb']     = FALSE;
                $config['maintain_ratio']   = TRUE;
                $config['quality']          = '60%';
                $config['width']            = 710;
                $config['height']           = 460;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $judul = clear($_POST['judul']);
                $ket = clear($_POST['ket']);
                $gambar = $gbr['file_name'];
                $q  = $this->db->query("select * from struktur");
                $row = $q->row();
                unlink('./image/' . $row->gambar);
                $result = $this->db->query("update struktur set judul='$judul',ket='$ket',gambar='$gambar'");
                echo json_encode($result);
            }
        } else {
            $judul = clear($_POST['judul']);
            $ket = clear($_POST['ket']);
            $result = $this->db->query("update struktur set judul='$judul',ket='$ket'");
            echo json_encode($result);
        }
    }




    public function bpd()
    {
        $this->load->view('backend/atas');
        $this->load->view('backend/bpd');
        $this->load->view('backend/bawah');
    }


    public function updatebpd()
    {
        $config['upload_path'] = './image/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']  = '3000';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if (!empty($_FILES['gambar']['name'])) {
            if (!$this->upload->do_upload('gambar')) {
                echo false;
            } else {
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']    = 'gd2';
                $config['source_image']     = './image/' . $gbr['file_name'];
                $config['create_thumb']     = FALSE;
                $config['maintain_ratio']   = TRUE;
                $config['quality']          = '60%';
                $config['width']            = 710;
                $config['height']           = 460;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $judul = clear($_POST['judul']);
                $ket = clear($_POST['ket']);
                $gambar = $gbr['file_name'];
                $q  = $this->db->query("select * from bpd");
                $row = $q->row();
                unlink('./image/' . $row->gambar);
                $result = $this->db->query("update bpd set judul='$judul',ket='$ket',gambar='$gambar'");
                echo json_encode($result);
            }
        } else {
            $judul = clear($_POST['judul']);
            $ket = clear($_POST['ket']);
            $result = $this->db->query("update bpd set judul='$judul',ket='$ket'");
            echo json_encode($result);
        }
    }


    public function galeri()
    {
        $this->load->library('pagination');
        $jum = $this->db->query("select * from galeri");
        $page = $this->uri->segment(3);
        if (!$page) :
            $offset = 0;
        else :
            $offset = $page;
        endif;
        $limit = 6;
        $config['base_url'] = base_url() . 'main/galeri/';
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
        $data['page'] = $this->pagination->create_links();
        $data['q'] = $this->main_model->galeri_page($offset, $limit);

        $this->load->view('backend/atas');
        $this->load->view('backend/galeri', $data);
        $this->load->view('backend/bawah');
    }


    public function inputgaleri()
    {
        $this->load->view('backend/atas');
        $this->load->view('backend/inputgaleri');
        $this->load->view('backend/bawah');
    }

    public function savegaleri()
    {
        $config['upload_path'] = './image/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']  = '2000';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload("gambar")) { //upload file
            $gbr = $this->upload->data();

            $config['image_library']    = 'gd2';
            $config['source_image']     = './image/' . $gbr['file_name'];
            $config['create_thumb']     = false;
            $config['maintain_ratio']   = TRUE;
            $config['quality']          = '60%';
            $config['width']            = 710;
            $config['height']           = 460;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $judul = clear($_POST['judul']);
            $status = clear($_POST['status']);
            $gambar = $gbr['file_name'];
            $result =  $this->db->query("insert into galeri values('','$judul','$status','$gambar')");
            echo json_encode($result);
        } else {
            echo false;
        }
    }

    public function hapusgaleri($id = '')
    {
        $id = $this->secure->decrypt_url($id);
        $q = $this->db->query("select * from galeri where id='$id'");
        $row  = $q->row();
        unlink('./image/' . $row->gambar);
        $this->db->query("delete from galeri where id='$id'");
        echo true;
    }

    public function editgaleri($id = '')
    {
        $data['id'] = $this->secure->decrypt_url($id);
        $this->load->view('backend/atas');
        $this->load->view('backend/editgaleri', $data);
        $this->load->view('backend/bawah');
    }

    public function updategaleri($id = '')
    {
        $id = $this->secure->decrypt_url($id);
        $config['upload_path'] = './image/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']  = '3000';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if (!empty($_FILES['gambar']['name'])) {
            if (!$this->upload->do_upload('gambar')) {
                echo false;
            } else {
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']    = 'gd2';
                $config['source_image']     = './image/' . $gbr['file_name'];
                $config['create_thumb']     = FALSE;
                $config['maintain_ratio']   = TRUE;
                $config['quality']          = '60%';
                $config['width']            = 710;
                $config['height']           = 460;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $judul = clear($_POST['judul']);
                $status = clear($_POST['status']);
                $gambar = $gbr['file_name'];
                $q  = $this->db->query("select * from galeri where id='$id'");
                $row = $q->row();
                unlink('./image/' . $row->gambar);
                $result = $this->db->query("update galeri set judul='$judul',status='$status',gambar='$gambar' where id='$id'");
                echo json_encode($result);
            }
        } else {
            $judul = clear($_POST['judul']);
            $status = clear($_POST['status']);
            $result = $this->db->query("update galeri set judul='$judul',status='$status' where id='$id'");
            echo json_encode($result);
        }
    }


    //lahan
    public function irigasi()
    {
        $this->load->view('backend/atas');
        $this->load->view('backend/irigasi');
        $this->load->view('backend/bawah');
    }

    public function inputlahan()
    {
        $this->load->view('backend/atas');
        $this->load->view('backend/inputlahan');
        $this->load->view('backend/bawah');
    }


    public function hapusirigasi($id = '')
    {
        $q = $this->db->query("select * from irigasi where id='$id'");
        $row  = $q->row();
        unlink('./image/' . $row->gambar);
        $this->db->query("delete from irigasi where id='$id'");
        echo true;
    }
    public function hapuslahan($id = '')
    {
        $q = $this->db->query("select * from lahan where id='$id'");
        $row  = $q->row();
        unlink('./image/' . $row->gambar);
        $this->db->query("delete from lahan where id='$id'");
        echo true;
    }

    public function saveirigasi()
    {
        $config['upload_path'] = './image/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']  = '2000';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload("gambar")) { //upload file
            $gbr = $this->upload->data();

            $config['image_library']    = 'gd2';
            $config['source_image']     = './image/' . $gbr['file_name'];
            $config['create_thumb']     = false;
            $config['maintain_ratio']   = TRUE;
            $config['quality']          = '60%';
            $config['width']            = 710;
            $config['height']           = 460;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $nama_irigasi = clear($_POST['nama_irigasi']);
            $panjang_jalur = clear($_POST['panjang_jalur']);
            $lebar_jalur = clear($_POST['lebar_jalur']);
            $jalur_geojson = clear($_POST['jalur_geojson']);
            $warna = clear($_POST['warna']);
            $ketebalan = clear($_POST['ketebalan']);
            $gambar = $gbr['file_name'];
            $result = $this->db->query("insert into irigasi values('','$nama_irigasi','$panjang_jalur','$lebar_jalur','$jalur_geojson','$warna','$ketebalan','$gambar')");
            echo json_encode($result);
        } else {
            echo false;
        }
    }


    public function editirigasi($id = '')
    {
        $data['id'] = $id;
        $this->load->view('backend/atas');
        $this->load->view('backend/editirigasi', $data);
        $this->load->view('backend/bawah');
    }
    public function editlahan($id = '')
    {
        $data['id'] = $id;
        $this->load->view('backend/atas');
        $this->load->view('backend/editlahan', $data);
        $this->load->view('backend/bawah');
    }

    public function detailirigasi($id = '')
    {
        $data['id'] = $this->secure->decrypt_url($id);
        $this->load->view('backend/atas');
        $this->load->view('backend/detailirigasi', $data);
        $this->load->view('backend/bawah');
    }
    public function detaillahan($id = '')
    {
        $data['id'] = $this->secure->decrypt_url($id);
        $this->load->view('backend/atas');
        $this->load->view('backend/detaillahan', $data);
        $this->load->view('backend/bawah');
    }

    public function updateirigasi($id = '')
    {
        $config['upload_path'] = './image/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']  = '3000';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if (!empty($_FILES['gambar']['name'])) {
            if (!$this->upload->do_upload('gambar')) {
                echo false;
            } else {
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']    = 'gd2';
                $config['source_image']     = './image/' . $gbr['file_name'];
                $config['create_thumb']     = FALSE;
                $config['maintain_ratio']   = TRUE;
                $config['quality']          = '60%';
                $config['width']            = 710;
                $config['height']           = 460;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $nama_irigasi = clear($_POST['nama_irigasi']);
                $panjang_jalur = clear($_POST['panjang_jalur']);
                $lebar_jalur = clear($_POST['lebar_jalur']);
                $jalur_geojson = clear($_POST['jalur_geojson']);
                $warna = clear($_POST['warna']);
                $ketebalan = clear($_POST['ketebalan']);
                $gambar = $gbr['file_name'];
                $q  = $this->db->query("select * from irigasi where id='$id'");
                $row = $q->row();
                unlink('./image/' . $row->gambar);
                $result = $this->db->query("update irigasi set irigasi='$nama_irigasi',panjang_jalur='$panjang_jalur',lebar='$lebar_jalur',geojson='$jalur_geojson',warna='$warna',ketebalan='$ketebalan',gambar='$gambar' where id='$id'");
                echo json_encode($result);
            }
        } else {
            $nama_irigasi = clear($_POST['nama_irigasi']);
            $panjang_jalur = clear($_POST['panjang_jalur']);
            $lebar_jalur = clear($_POST['lebar_jalur']);
            $jalur_geojson = clear($_POST['jalur_geojson']);
            $warna = clear($_POST['warna']);
            $ketebalan = clear($_POST['ketebalan']);
            $result = $this->db->query("update irigasi set irigasi='$nama_irigasi',panjang_jalur='$panjang_jalur',lebar='$lebar_jalur',geojson='$jalur_geojson',warna='$warna',ketebalan='$ketebalan' where id='$id'");
            echo json_encode($result);
        }
    }


    public function updatelahan($id = '')
    {
        $config['upload_path'] = './image/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']  = '3000';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if (!empty($_FILES['gambar']['name'])) {
            if (!$this->upload->do_upload('gambar')) {
                echo false;
            } else {
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']    = 'gd2';
                $config['source_image']     = './image/' . $gbr['file_name'];
                $config['create_thumb']     = FALSE;
                $config['maintain_ratio']   = TRUE;
                $config['quality']          = '60%';
                $config['width']            = 710;
                $config['height']           = 460;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $nama_lahan = clear($_POST['nama_lahan']);
                $luas_lahan = clear($_POST['luas_lahan']);
                $isi_lahan = clear($_POST['isi_lahan']);
                $pemilik_lahan = clear($_POST['pemilik_lahan']);
                $alamat_lahan = clear($_POST['alamat_pemilik']);
                $denah_geojson = clear($_POST['denah_geojson']);
                $warna = clear($_POST['warna']);

                $gambar = $gbr['file_name'];
                $q  = $this->db->query("select * from lahan where id='$id'");
                $row = $q->row();
                unlink('./image/' . $row->gambar);
                $result = $this->db->query("UPDATE lahan SET lahan='$nama_lahan',luas='$luas_lahan',isi='$isi_lahan',pemilik_lahan='$pemilik_lahan',alamat_pemilik='$alamat_lahan',geojson='$denah_geojson',warna='$warna',gambar='$gambar' where id='$id'");
                echo json_encode($result);
            }
        } else {
            $nama_lahan = clear($_POST['nama_lahan']);
            $luas_lahan = clear($_POST['luas_lahan']);
            $isi_lahan = clear($_POST['isi_lahan']);
            $pemilik_lahan = clear($_POST['pemilik_lahan']);
            $alamat_lahan = clear($_POST['alamat_pemilik']);
            $denah_geojson = clear($_POST['denah_geojson']);
            $warna = clear($_POST['warna']);

            $result = $this->db->query("UPDATE lahan SET lahan='$nama_lahan',luas='$luas_lahan',isi='$isi_lahan',pemilik_lahan='$pemilik_lahan',alamat_pemilik='$alamat_lahan',geojson='$denah_geojson',warna='$warna' where id='$id'");
            echo json_encode($result);
        }
    }

    public function lahan()
    {
        $this->load->view('backend/atas');
        $this->load->view('backend/lahan');
        $this->load->view('backend/bawah');
    }
    public function inputlahan1()
    {
        $this->load->view('backend/atas');
        $this->load->view('backend/inputlahan1');
        $this->load->view('backend/bawah');
    }


    public function savelahan()
    {
        $config['upload_path'] = './image/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']  = '2000';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload("gambar")) { //upload file
            $gbr = $this->upload->data();

            $config['image_library']    = 'gd2';
            $config['source_image']     = './image/' . $gbr['file_name'];
            $config['create_thumb']     = false;
            $config['maintain_ratio']   = TRUE;
            $config['quality']          = '60%';
            $config['width']            = 710;
            $config['height']           = 460;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $nama_lahan = clear($_POST['nama_lahan']);
            $luas_lahan = clear($_POST['luas_lahan']);
            $isi_lahan = clear($_POST['isi_lahan']);
            $pemilik_lahan = clear($_POST['pemilik_lahan']);
            $alamat_lahan = clear($_POST['alamat_pemilik']);
            $denah_geojson = clear($_POST['denah_geojson']);
            $warna = clear($_POST['warna']);

            $gambar = $gbr['file_name'];
            $result = $this->db->query("insert into lahan values('','$nama_lahan','$luas_lahan','$isi_lahan','$pemilik_lahan','$alamat_lahan','$denah_geojson','$warna','$gambar')");
            echo json_encode($result);
        } else {
            echo false;
        }
    }


    public function settingtitiklokasi()
    {
        $this->load->view('backend/atas');
        $this->load->view('backend/settingtitiklokasi');
        $this->load->view('backend/bawah');
    }


    public function updatetitiklokasi()
    {
        $lat = clear($_POST['lat']);
        $lng = clear($_POST['lng']);

        $this->db->query("update setting set lat='$lat',lng='$lng'");
        echo true;
    }


    public function settingweb()
    {
        $this->load->view('backend/atas');
        $this->load->view('backend/setting');
        $this->load->view('backend/bawah');
    }

    public function setlogo()
    {
        $config['upload_path'] = './image/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']  = '2000';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if (!empty($_FILES['gambar']['name'])) {
            if (!$this->upload->do_upload('gambar')) {
                echo false;
            } else {
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']    = 'gd2';
                $config['source_image']     = './image/' . $gbr['file_name'];
                $config['create_thumb']     = false;
                $config['maintain_ratio']   = TRUE;
                $config['quality']          = '80%';
                $config['width']            = 1024;
                $config['height']           = 768;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $gambar = $gbr['file_name'];
                $q  = $this->db->query("select * from setting");
                $row = $q->row();
                unlink('./image/' . $row->logo);
                $result =  $this->db->query("update setting set logo='$gambar'");
                echo json_encode($result);
            }
        }
    }

    public function updatesetting()
    {
        $a = clear($_POST['a']);
        $b = clear($_POST['b']);
        $c = clear($_POST['c']);
        $d = clear($_POST['d']);
        $e = clear($_POST['e']);
        $f = clear($_POST['f']);
        $g = clear($_POST['g']);
        $h = clear($_POST['h']);
        $this->db->query("UPDATE setting SET web='$a',keyword='$b',telp='$c',email='$d',yt='$e',fb='$f',ig='$g',alamat='$h'");
        echo true;
    }


    public function mapirigasi()
    {
        // $this->load->view('backend/atas');
        $this->load->view('backend/mapsirigasi');
        // $this->load->view('backend/bawah');

    }

    public function jeniskegiatan()
    {
        $this->load->view('backend/jeniskegiatan');
    }

    public function loadformjeniskegiatan()
    { ?>
        <form action="main/savejeniskegiatan" id="save" enctype="multipart/form-data" method="post">
            <table class="table">
                <tr>
                    <td>Jenis Kegiatan</td>
                    <td>
                        <input type="text" class="form-control" name="jenis" placeholder="Jenis Kegiatan">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <center>
                            <img id="blah" class='img-fluid mb-3' width='280' src="assets/nofoto.jpg" alt="your image" />
                            <input type="file" name="gambar" class="form-control mb-3 bersih" onchange="readURL(this);" aria-describedby="inputGroupFileAddon01">
                            <span class="badge badge-warning"><strong>Informasi</strong> Input Gambar Maksimal 2mb !</span>
                        </center>

                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button type="reset" class="btn btn-danger"><i class="fa fa-sync-alt"></i> Batal</button>
                        <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Simpan</button>
                    </td>
                </tr>
            </table>
        </form>
        <script>
            $("#save").on("submit", function(e) {
                e.preventDefault();
                $.ajax({
                    type: "post",
                    url: $(this).attr('action'),
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: false,
                    success: function(response) {
                        Swal.fire(
                            "Informasi",
                            "Data jenis kegiatan berhasil disimpan!",
                            "success"
                        );
                        $("#formjeniskegiatan").load("main/loadformjeniskegiatan");
                        $("#jeniskegiatan").load("main/loadjeniskegiatan");

                    },
                    error: function(e) {
                        alert("Ada kesalahn sistem!");
                    }
                });
            });

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#blah').attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
    <?php   }

    public function savejeniskegiatan()
    {
        $config['upload_path'] = './image/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']  = '2000';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload("gambar")) { //upload file
            $gbr = $this->upload->data();

            $config['image_library']    = 'gd2';
            $config['source_image']     = './image/' . $gbr['file_name'];
            $config['create_thumb']     = false;
            $config['maintain_ratio']   = TRUE;
            $config['quality']          = '60%';
            $config['width']            = 710;
            $config['height']           = 460;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $jenis = clear($_POST['jenis']);

            $gambar = $gbr['file_name'];
            $result = $this->db->query("insert into jenis values('','$jenis','$gambar')");
            echo json_encode($result);
        } else {
            echo false;
        }
    }

    public function loadjeniskegiatan()
    { ?>

        <table width='100%' class='table table-hover table-striped dttable'>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jenis Kegiatan</th>
                    <th>Icon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $q = $this->db->query("select * from jenis order by id desc");
                foreach ($q->result() as $row) {
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row->jenis_kegiatan; ?></td>
                        <td>
                            <img src="image/<?php echo $row->icon ?>" class="img img-fluid img-thumbnail rounded-circle" width="70" alt="">
                        </td>
                        </td>
                        <td>
                            <a href="main/hapusjeniskegiatan/<?php echo $row->id ?>" class="btn btn-danger btn-sm hapus"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php $no++;
                } ?>
            </tbody>
        </table>
        <script>
            $(".hapus").click(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Hapus Data ?',
                    text: "Data yang sudah dihapus tidak bisa kembali !",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yaa, hapus data !'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: $(this).attr('href'),
                            type: 'post',
                            data: $(this).serialize(),
                            dataType: "html",
                            success: function(dt) {
                                Swal.fire(
                                    'Informasi',
                                    'Data berhasil dihapus !',
                                    'success'
                                );
                                $("#formjeniskegiatan").load("main/loadformjeniskegiatan");
                                $("#jeniskegiatan").load("main/loadjeniskegiatan");
                            },
                            error: function(dt) {
                                Swal.fire(
                                    "Informasi",
                                    "Ada kesalahan sistem!",
                                    "warning"
                                );
                            },
                        });
                    } else return false;
                })
            });

            $('.dttable').DataTable();
        </script>
    <?php  }

    public function hapusjeniskegiatan($id = '')
    {
        $q = $this->db->query("select * from jenis where id='$id'");
        $row  = $q->row();
        unlink('./image/' . $row->icon);
        $this->db->query("delete from jenis where id='$id'");
        echo true;
    }

    public function sumberdana()
    {
        $this->load->view('backend/sumberdana');
    }

    public function loadsumberdana()
    { ?>

        <table width='100%' class='table table-hover table-striped dttable'>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Sumber Dana</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $q = $this->db->query("select * from sumberdana order by id desc");
                foreach ($q->result() as $row) {
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row->sumberdana; ?></td>
                        </td>
                        <td>
                            <a href="main/hapussumberdana/<?php echo $row->id ?>" class="btn btn-danger btn-sm hapus"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php $no++;
                } ?>
            </tbody>
        </table>
        <script>
            $(".hapus").click(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Hapus Data ?',
                    text: "Data yang sudah dihapus tidak bisa kembali !",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yaa, hapus data !'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: $(this).attr('href'),
                            type: 'post',
                            data: $(this).serialize(),
                            dataType: "html",
                            success: function(dt) {
                                Swal.fire(
                                    'Informasi',
                                    'Data berhasil dihapus !',
                                    'success'
                                );
                                $("#formjeniskegiatan").load("main/loadformsumberdana");
                                $("#jeniskegiatan").load("main/loadsumberdana");
                            },
                            error: function(dt) {
                                Swal.fire(
                                    "Informasi",
                                    "Ada kesalahan sistem!",
                                    "warning"
                                );
                            },
                        });
                    } else return false;
                })
            });

            $('.dttable').DataTable();
        </script>
    <?php  }

    public function loadformsumberdana()
    { ?>
        <form action="main/savesumberdana" id="save" enctype="multipart/form-data" method="post">
            <table class="table">
                <tr>
                    <td>Sumber Dana</td>
                    <td>
                        <input type="text" class="form-control" required autocomplete="off" name="sumber" placeholder="Sumber Dana">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button type="reset" class="btn btn-danger"><i class="fa fa-sync-alt"></i> Batal</button>
                        <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Simpan</button>
                    </td>
                </tr>
            </table>
        </form>
        <script>
            $("#save").on("submit", function(e) {
                e.preventDefault();
                $.ajax({
                    type: "post",
                    url: $(this).attr('action'),
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: false,
                    success: function(response) {
                        Swal.fire(
                            "Informasi",
                            "Data Sumber Dana berhasil disimpan!",
                            "success"
                        );
                        $("#formjeniskegiatan").load("main/loadformsumberdana");
                        $("#jeniskegiatan").load("main/loadsumberdana");
                    },
                    error: function(e) {
                        alert("Ada kesalahn sistem!");
                    }
                });
            });
        </script>
    <?php   }

    public function savesumberdana()
    {
        $sumber = clear($_POST['sumber']);
        $this->db->query("insert into sumberdana values('','$sumber')");
        echo true;
    }

    public function hapussumberdana($id = '')
    {
        $this->db->query("delete from sumberdana where id='$id'");
        echo true;
    }

    public function inputkegiatanfisik()
    {
        $this->load->view('backend/atas');
        $this->load->view('backend/inputkegiatan');
        $this->load->view('backend/bawah');
    }

    public function savekegiatanfisik()
    {
        $kegiatan = clear($_POST['kegiatan']);
        $jenis = clear($_POST['jenis']);
        $lat = clear($_POST['lat']);
        $lng = clear($_POST['lng']);
        $alamat = clear($_POST['alamat']);
        $sumberdana = clear($_POST['sumberdana']);
        $anggaran = clear(str_replace(',', '', $_POST['anggaran']));
        $volume = clear($_POST['volume']);
        $pelaksana = clear($_POST['pelaksana']);
        $tahun = clear($_POST['tahun']);
        $desk = clear($_POST['desk']);
        $this->db->query("insert into kegiatan values('','$kegiatan','$jenis','$alamat','$sumberdana','$anggaran','$tahun','$volume','$pelaksana','$desk','$lat','$lng','')");
        echo true;
    }


    public function mapkegiatanfisik()
    {
        $this->load->view('backend/mapkegiatanfisik');
    }


    public function kegiatanfisik()
    {
        $this->load->view('backend/atas');
        $this->load->view('backend/kegiatanfisik');
        $this->load->view('backend/bawah');
    }

    public function ubahsampul($id = '')
    {
        $config['upload_path'] = './image/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']  = '3000';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if (!empty($_FILES['gambar']['name'])) {
            if (!$this->upload->do_upload('gambar')) {
                echo false;
            } else {
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']    = 'gd2';
                $config['source_image']     = './image/' . $gbr['file_name'];
                $config['create_thumb']     = FALSE;
                $config['maintain_ratio']   = TRUE;
                $config['quality']          = '60%';
                $config['width']            = 710;
                $config['height']           = 460;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $gambar = $gbr['file_name'];
                $q  = $this->db->query("select * from kegiatan where id='$id'");
                $row = $q->row();
                unlink('./image/' . $row->sampul);
                $result = $this->db->query("update kegiatan set sampul='$gambar'");
                echo json_encode($result);
            }
        }
    }

    public function tambahgaleri($id = '')
    {
        $data['id'] = $this->secure->decrypt_url($id);
        $this->load->view('backend/atas', $data, FALSE);
        $this->load->view('backend/tambahgalerikegiatan', $data, FALSE);
        $this->load->view('backend/bawah', $data, FALSE);
    }

    public function savegalerikegiatan()
    {
        $config['upload_path'] = './image/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']  = '2000';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload("gambar")) { //upload file
            $gbr = $this->upload->data();

            $config['image_library']    = 'gd2';
            $config['source_image']     = './image/' . $gbr['file_name'];
            $config['create_thumb']     = false;
            $config['maintain_ratio']   = TRUE;
            $config['quality']          = '60%';
            $config['width']            = 710;
            $config['height']           = 460;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $judul = clear($_POST['judul']);
            $id = clear($_POST['id']);
            $gambar = $gbr['file_name'];
            $result =  $this->db->query("insert into galeri_kegiatan values('','$id','$judul','$gambar')");
            echo json_encode($result);
        } else {
            echo false;
        }
    }

    public function hapusgalerikegiatan($id = '')
    {
        $q = $this->db->query("select * from galeri_kegiatan where id='$id'");
        $row  = $q->row();
        unlink('./image/' . $row->foto);
        $this->db->query("delete from galeri_kegiatan where id='$id'");
        echo true;
    }

    public function hapuskegiatanfisik($id = '')
    {
        $q = $this->db->query("select * from kegiatan where id='$id'");
        $row  = $q->row();
        if ($row->sampul != '') {
            unlink('./image/' . $row->sampul);
            $this->db->query("delete from kegiatan where id='$id'");
            echo true;
        } else {
            $this->db->query("delete from kegiatan where id='$id'");
            echo true;
        }
    }

    public function editkegiatanfisik($id = '')
    {
        $data['id'] = $this->secure->decrypt_url($id);
        $this->load->view('backend/atas', $data, FALSE);
        $this->load->view('backend/editkegiatanfisik', $data, FALSE);
        $this->load->view('backend/bawah', $data, FALSE);
    }

    public function ubahkegiatanfisik($id = '')
    {
        $kegiatan = clear($_POST['kegiatan']);
        $jenis = clear($_POST['jenis']);
        $lat = clear($_POST['lat']);
        $lng = clear($_POST['lng']);
        $alamat = clear($_POST['alamat']);
        $sumberdana = clear($_POST['sumberdana']);
        $anggaran = clear(str_replace(',', '', $_POST['anggaran']));
        $volume = clear($_POST['volume']);
        $pelaksana = clear($_POST['pelaksana']);
        $tahun = clear($_POST['tahun']);
        $desk = clear($_POST['desk']);
        $this->db->query("update kegiatan set kegiatan='$kegiatan',idjenis='$jenis',alamat='$alamat',idsumberdana='$sumberdana',anggaran='$anggaran',tahun='$tahun',volume='$volume',pelaksana='$pelaksana',desk='$desk',lat='$lat',lng='$lng' where id='$id'");
        echo true;
    }

    public function kategorikomplain()
    {
        $this->load->view('backend/atas');
        $this->load->view('backend/kategorikomplain');
        $this->load->view('backend/bawah');
    }

    public function loadkategorikomplain()
    { ?>

        <table width='100%' class='table table-hover table-striped dttable'>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kategori Komplain</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $q = $this->db->query("select * from kategori_komplain order by id desc");
                foreach ($q->result() as $row) {
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row->kat; ?></td>
                        </td>
                        <td>
                            <a href="main/hapuskategorikomplain/<?php echo $row->id ?>" class="btn btn-danger btn-sm hapus"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php $no++;
                } ?>
            </tbody>
        </table>
        <script>
            $(".hapus").click(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Hapus Data ?',
                    text: "Data yang sudah dihapus tidak bisa kembali !",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yaa, hapus data !'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: $(this).attr('href'),
                            type: 'post',
                            data: $(this).serialize(),
                            dataType: "html",
                            success: function(dt) {
                                Swal.fire(
                                    'Informasi',
                                    'Data berhasil dihapus !',
                                    'success'
                                );
                                $("#formjeniskegiatan").load("main/loadformkategorikomplain");
                                $("#jeniskegiatan").load("main/loadkategorikomplain");
                            },
                            error: function(dt) {
                                Swal.fire(
                                    "Informasi",
                                    "Ada kesalahan sistem!",
                                    "warning"
                                );
                            },
                        });
                    } else return false;
                })
            });

            $('.dttable').DataTable();
        </script>
    <?php  }

    public function loadformkategorikomplain()
    { ?>
        <form action="main/savekategorikomplain" id="save" enctype="multipart/form-data" method="post">
            <table class="table">
                <tr>
                    <td>Kategori Komplain</td>
                    <td>
                        <input type="text" class="form-control" required autocomplete="off" name="sumber" placeholder="Kategori Komplain">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button type="reset" class="btn btn-danger"><i class="fa fa-sync-alt"></i> Batal</button>
                        <button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Simpan</button>
                    </td>
                </tr>
            </table>
        </form>
        <script>
            $("#save").on("submit", function(e) {
                e.preventDefault();
                $.ajax({
                    type: "post",
                    url: $(this).attr('action'),
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: false,
                    success: function(response) {
                        Swal.fire(
                            "Informasi",
                            "Data berhasil disimpan!",
                            "success"
                        );
                        $("#formjeniskegiatan").load("main/loadformkategorikomplain");
                        $("#jeniskegiatan").load("main/loadkategorikomplain");
                    },
                    error: function(e) {
                        alert("Ada kesalahn sistem!");
                    }
                });
            });
        </script>
    <?php   }

    public function savekategorikomplain()
    {
        $sumber = clear($_POST['sumber']);
        $this->db->query("insert into kategori_komplain values('','$sumber')");
        echo true;
    }

    public function hapuskegiatankomplain($id = '')
    {
        $this->db->query("delete from kategori_komplain where id='$id'");
        echo true;
    }


    public function komplain()
    {
        $this->load->view('backend/atas');
        $this->load->view('backend/komplain');
        $this->load->view('backend/bawah');
    }



    public function event()
    {
        $this->load->library('pagination');
        $jum  = $this->db->get('event');
        $page = $this->uri->segment(3);
        if (!$page) :
            $offset = 0;
        else :
            $offset = $page;
        endif;
        $limit = 3;
        $config['base_url'] = base_url() . 'main/event/';
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
        $data['page'] = $this->pagination->create_links();
        $data['qe'] = $this->main_model->event_perpage($offset, $limit);
        $this->db->query("update event set status=1 where selesai <= now()");
        $this->load->view('backend/atas', $data);
        $this->load->view('backend/event', $data);
        $this->load->view('backend/bawah', $data);
    }

    public function test()
    {
        $date = date("Y-m-d H:i:s");
        $row = $this->db->query("select * from event where selesai >= NOW() ")->result();
        // if($date >= $row->selesai ){
        //     $this->db->query("update event set status='1' where selesai >= '$date'");
        // }
        echo json_encode($row);
    }

    public function inputevent()
    {
        $this->load->view('backend/inputevent');
    }

    public function saveevent()
    {
        $config['upload_path'] = './image/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']  = '2000';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload("gambar1")) { //upload file
            $gbr = $this->upload->data();
            $config['image_library']    = 'gd2';
            $config['source_image']     = './image/' . $gbr['file_name'];
            $config['create_thumb']     = false;
            $config['maintain_ratio']   = TRUE;
            $config['quality']          = '80%';
            $config['width']            = 1024;
            $config['height']           = 768;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $gambar1 = $gbr['file_name'];
        }
        if ($this->upload->do_upload("gambar2")) {
            $gbr2 = $this->upload->data();
            $config['image_library']    = 'gd2';
            $config['source_image']     = './image/' . $gbr2['file_name'];
            $config['create_thumb']     = false;
            $config['maintain_ratio']   = TRUE;
            $config['quality']          = '80%';
            $config['width']            = 1024;
            $config['height']           = 768;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $gambar2 = $gbr2['file_name'];
        }
        if ($this->upload->do_upload("gambar3")) {
            $gbr3 = $this->upload->data();
            $config['image_library']    = 'gd2';
            $config['source_image']     = './image/' . $gbr3['file_name'];
            $config['create_thumb']     = false;
            $config['maintain_ratio']   = TRUE;
            $config['quality']          = '80%';
            $config['width']            = 1024;
            $config['height']           = 768;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $gambar3 = $gbr3['file_name'];
        }

        $judul = clear($_POST['judul']);
        $mulai = clear($_POST['mulai']);
        $selesai = clear($_POST['selesai']);
        $ket = clear($_POST['ket']);
        $lokasi = clear($_POST['lokasi']);
        $lat = clear($_POST['lat']);
        $lng = clear($_POST['lng']);
        $string   = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $judul);
        $trim     = trim($string);
        $slug     = strtolower(str_replace(" ", "-", $trim));

        $result = $this->db->query("insert into event values('','$judul','$mulai','$selesai','$ket','$lokasi','$gambar1','$gambar2','$gambar3','$lat','$lng','$slug','0','0')");
        echo json_encode($result);
    }

    public function hapusevent($id = '')
    {
        $q = $this->db->query("select * from event where id='$id'");
        $row  = $q->row();
        unlink('./image/' . $row->gambar);
        unlink('./image/' . $row->gambar2);
        unlink('./image/' . $row->gambar3);
        $this->db->query("delete from event where id='$id'");
        echo true;
    }

    public function detailevent($id = '')
    {
        $data['id'] = $id;
        $this->load->view('backend/detailevent', $data, FALSE);
    }

    public function editevent($id = '')
    {
        $data['id'] = $id;
        $this->load->view('backend/editevent', $data, FALSE);
    }


    public function updateevent($id = '')
    {
        $config['upload_path'] = './image/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']  = '2000';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if (!empty($_FILES['gambar1']['name'])) {
            if (!$this->upload->do_upload('gambar1')) {
                echo false;
            } else {
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']    = 'gd2';
                $config['source_image']     = './image/' . $gbr['file_name'];
                $config['create_thumb']     = false;
                $config['maintain_ratio']   = TRUE;
                $config['quality']          = '80%';
                $config['width']            = 1024;
                $config['height']           = 768;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $judul = clear($_POST['judul']);
                $mulai = clear($_POST['mulai']);
                $selesai = clear($_POST['selesai']);
                $ket = clear($_POST['ket']);
                $lokasi = clear($_POST['lokasi']);
                $lat = clear($_POST['lat']);
                $lng = clear($_POST['lng']);
                $string   = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $judul);
                $trim     = trim($string);
                $slug     = strtolower(str_replace(" ", "-", $trim));
                $gambar = $gbr['file_name'];
                $q  = $this->db->query("select * from event where id='$id'");
                $row = $q->row();
                unlink('./image/' . $row->gambar);
                $result = $this->db->query("UPDATE event SET judul='$judul',mulai='$mulai',selesai='$selesai',ket='$ket',lokasi='$lokasi',gambar='$gambar',lat='$lat',lng='$lng',slug='$slug' where id='$id'");
                echo json_encode($result);
            }
        } elseif (!empty($_FILES['gambar2']['name'])) {
            if (!$this->upload->do_upload('gambar2')) {
                echo false;
            } else {
                $gbr2 = $this->upload->data();
                //Compress Image
                $config['image_library']    = 'gd2';
                $config['source_image']     = './image/' . $gbr2['file_name'];
                $config['create_thumb']     = false;
                $config['maintain_ratio']   = TRUE;
                $config['quality']          = '80%';
                $config['width']            = 1024;
                $config['height']           = 768;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $judul = clear($_POST['judul']);
                $mulai = clear($_POST['mulai']);
                $selesai = clear($_POST['selesai']);
                $ket = clear($_POST['ket']);
                $lokasi = clear($_POST['lokasi']);
                $lat = clear($_POST['lat']);
                $lng = clear($_POST['lng']);
                $string   = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $judul);
                $trim     = trim($string);
                $slug     = strtolower(str_replace(" ", "-", $trim));
                $gambar2 = $gbr2['file_name'];
                $q  = $this->db->query("select * from event where id='$id'");
                $row = $q->row();
                unlink('./image/' . $row->gambar2);
                $result = $this->db->query("UPDATE event SET judul='$judul',mulai='$mulai',selesai='$selesai',ket='$ket',lokasi='$lokasi',gambar2='$gambar2',lat='$lat',lng='$lng',slug='$slug' where id='$id'");
                echo json_encode($result);
            }
        } elseif (!empty($_FILES['gambar3']['name'])) {
            if (!$this->upload->do_upload('gambar3')) {
                echo false;
            } else {
                $gbr3 = $this->upload->data();
                //Compress Image
                $config['image_library']    = 'gd2';
                $config['source_image']     = './image/' . $gbr3['file_name'];
                $config['create_thumb']     = false;
                $config['maintain_ratio']   = TRUE;
                $config['quality']          = '80%';
                $config['width']            = 1024;
                $config['height']           = 768;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $judul = clear($_POST['judul']);
                $mulai = clear($_POST['mulai']);
                $selesai = clear($_POST['selesai']);
                $ket = clear($_POST['ket']);
                $lokasi = clear($_POST['lokasi']);
                $lat = clear($_POST['lat']);
                $lng = clear($_POST['lng']);
                $string   = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $judul);
                $trim     = trim($string);
                $slug     = strtolower(str_replace(" ", "-", $trim));
                $gambar3 = $gbr3['file_name'];
                $q  = $this->db->query("select * from event where id='$id'");
                $row = $q->row();
                unlink('./image/' . $row->gambar3);
                $result = $this->db->query("UPDATE event SET judul='$judul',mulai='$mulai',selesai='$selesai',ket='$ket',lokasi='$lokasi',gambar3='$gambar3',lat='$lat',lng='$lng',slug='$slug' where id='$id'");
                echo json_encode($result);
            }
        } else {
            $judul = clear($_POST['judul']);
            $mulai = clear($_POST['mulai']);
            $selesai = clear($_POST['selesai']);
            $ket = clear($_POST['ket']);
            $lokasi = clear($_POST['lokasi']);
            $lat = clear($_POST['lat']);
            $lng = clear($_POST['lng']);
            $string   = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $judul);
            $trim     = trim($string);
            $slug     = strtolower(str_replace(" ", "-", $trim));
            $result = $this->db->query("UPDATE event SET judul='$judul',mulai='$mulai',selesai='$selesai',ket='$ket',lokasi='$lokasi',lat='$lat',lng='$lng',slug='$slug' where id='$id'");
            echo json_encode($result);
        }
    }

    public function pengumuman()
    {
        $this->load->library('pagination');
        $jum  = $this->db->query("select pengumuman.*,admin.nama from pengumuman inner join admin on admin.id = pengumuman.iduser");
        $page = $this->uri->segment(3);
        if (!$page) :
            $offset = 0;
        else :
            $offset = $page;
        endif;
        $limit = 3;
        $config['base_url'] = base_url() . 'main/pengumuman/';
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
        $data['page'] = $this->pagination->create_links();
        $data['qe'] = $this->main_model->pengumuman_perpage($offset, $limit);
        $this->load->view('backend/atas');
        $this->load->view('backend/pengumuman', $data);
        $this->load->view('backend/bawah');
    }
    public function inputpengumuman()
    {
        $this->load->view('backend/atas');
        $this->load->view('backend/inputpengumuman');
        $this->load->view('backend/bawah');
    }

    public function savepengumuman()
    {
        $config['upload_path'] = './image/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']  = '2000';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload("gambar")) { //upload file
            $gbr = $this->upload->data();

            $config['image_library']    = 'gd2';
            $config['source_image']     = './image/' . $gbr['file_name'];
            $config['create_thumb']     = false;
            $config['maintain_ratio']   = TRUE;
            $config['quality']          = '60%';
            $config['width']            = 710;
            $config['height']           = 460;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $judul = clear($_POST['judul']);
            $string   = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $judul);
            $trim     = trim($string);
            $slug     = strtolower(str_replace(" ", "-", $trim));
            $date = clear($_POST['date']);
            $desk = clear($_POST['desk']);
            $gambar = $gbr['file_name'];
            $iduser = $this->session->userdata("id");
            $result = $this->db->query("insert into pengumuman values('','$judul','$desk','$gambar','$date','$iduser','0','$slug')");
            echo json_encode($result);
        } else {
            echo false;
        }
    }

    public function hapuspengumuman($id = '')
    {
        $q = $this->db->query("select * from pengumuman where id='$id'");
        $row  = $q->row();
        unlink('./image/' . $row->gambar);
        $this->db->query("delete from pengumuman where id='$id'");
        echo true;
    }
    public function hapusproduk($id = '')
    {
        $q = $this->db->query("select * from produk_warga where id='$id'");
        $row  = $q->row();
        unlink('./image/' . $row->gambar);
        $this->db->query("delete from produk_warga where id='$id'");
        echo true;
    }

    public function editpengumuman($id = '')
    {
        $data['id'] = $id;
        $this->load->view('backend/atas');
        $this->load->view('backend/editpengumuman', $data);
        $this->load->view('backend/bawah');
    }

    public function updatepengumuman($id = '')
    {
        $config['upload_path'] = './image/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']  = '3000';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if (!empty($_FILES['gambar']['name'])) {
            if (!$this->upload->do_upload('gambar')) {
                echo false;
            } else {
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']    = 'gd2';
                $config['source_image']     = './image/' . $gbr['file_name'];
                $config['create_thumb']     = FALSE;
                $config['maintain_ratio']   = TRUE;
                $config['quality']          = '60%';
                $config['width']            = 710;
                $config['height']           = 460;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $judul = clear($_POST['judul']);
                $string   = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $judul);
                $trim     = trim($string);
                $slug     = strtolower(str_replace(" ", "-", $trim));
                $date = clear($_POST['date']);
                $desk = clear($_POST['desk']);
                $gambar = $gbr['file_name'];
                $iduser = $this->session->userdata("id");
                $gambar = $gbr['file_name'];
                $q  = $this->db->query("select * from pengumuman where id='$id'");
                $row = $q->row();
                unlink('./image/' . $row->gambar);
                $result = $this->db->query("update pengumuman set judul='$judul',ket='$desk',gambar='$gambar',iduser='$iduser',slug='$slug' where id='$id'");
                echo json_encode($result);
            }
        } else {
            $judul = clear($_POST['judul']);
            $string   = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $judul);
            $trim     = trim($string);
            $slug     = strtolower(str_replace(" ", "-", $trim));
            $date = clear($_POST['date']);
            $desk = clear($_POST['desk']);
            $iduser = $this->session->userdata("id");
            $result = $this->db->query("update pengumuman set judul='$judul',ket='$desk',iduser='$iduser',slug='$slug' where id='$id'");
            echo json_encode($result);
        }
    }

    public function produkwarga()
    {
        $this->load->library('pagination');
        $jum  = $this->db->query("select produk_warga.*,admin.nama from produk_warga inner join admin on admin.id = produk_warga.iduser");
        $page = $this->uri->segment(3);
        if (!$page) :
            $offset = 0;
        else :
            $offset = $page;
        endif;
        $limit = 3;
        $config['base_url'] = base_url() . 'main/produkwarga/';
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
        $data['page'] = $this->pagination->create_links();
        $data['qe'] = $this->main_model->produk_perpage($offset, $limit);
        $this->load->view('backend/atas');
        $this->load->view('backend/produkwarga', $data);
        $this->load->view('backend/bawah');
    }

    public function inputprodukwarga()
    {
        $this->load->view('backend/atas');
        $this->load->view('backend/inputprodukwarga');
        $this->load->view('backend/bawah');
    }
    public function editprodukwarga($id = '')
    {
        $data['id'] = $id;
        $this->load->view('backend/atas');
        $this->load->view('backend/editprodukwarga', $data);
        $this->load->view('backend/bawah');
    }

    public function saveprodukwarga()
    {
        $config['upload_path'] = './image/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']  = '2000';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload("gambar")) { //upload file
            $gbr = $this->upload->data();

            $config['image_library']    = 'gd2';
            $config['source_image']     = './image/' . $gbr['file_name'];
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
            $harga = str_replace(',', '', clear($_POST['harga']));
            $lat = clear($_POST['lat']);
            $lng = clear($_POST['lng']);
            $pemilik = clear($_POST['pemilik']);
            $telp = clear($_POST['telp']);
            $ket = clear($_POST['ket']);
            $gambar = $gbr['file_name'];
            $iduser = $this->session->userdata("id");
            $nohp = str_replace(".", "", $telp);

            // cek apakah no hp mengandung karakter + dan 0-9
            if (!preg_match('/[^+0-9]/', trim($telp))) {
                // cek apakah no hp karakter 1-3 adalah +62
                if (substr(trim($telp), 0, 3) == '+62') {
                    $hp = trim($telp);
                }
                // cek apakah no hp karakter 1 adalah 0
                elseif (substr(trim($telp), 0, 1) == '0') {
                    $hp = '+62' . substr(trim($telp), 1);
                }
            }
            $result = $this->db->query("insert into produk_warga values('','$produk','$slug','$gambar','$harga','$ket','$lat','$lng','0','$pemilik','$hp','$iduser',now())");
            echo json_encode($result);
        } else {
            echo false;
        }
    }

    public function detailproduk($id = '')
    {
        $data['id'] = $id;
        $this->load->view('backend/detailproduk', $data, FALSE);
    }

    public function updateprodukwarga($id = '')
    {
        $config['upload_path'] = './image/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']  = '3000';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if (!empty($_FILES['gambar']['name'])) {
            if (!$this->upload->do_upload('gambar')) {
                echo false;
            } else {
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']    = 'gd2';
                $config['source_image']     = './image/' . $gbr['file_name'];
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
                $harga = str_replace(',', '', clear($_POST['harga']));
                $lat = clear($_POST['lat']);
                $lng = clear($_POST['lng']);
                $pemilik = clear($_POST['pemilik']);
                $telp = clear($_POST['telp']);
                $ket = clear($_POST['ket']);
                $gambar = $gbr['file_name'];
                $iduser = $this->session->userdata("id");
                $nohp = str_replace(".", "", $telp);

                // cek apakah no hp mengandung karakter + dan 0-9
                if (!preg_match('/[^+0-9]/', trim($telp))) {
                    // cek apakah no hp karakter 1-3 adalah +62
                    if (substr(trim($telp), 0, 3) == '+62') {
                        $hp = trim($telp);
                    }
                    // cek apakah no hp karakter 1 adalah 0
                    elseif (substr(trim($telp), 0, 1) == '0') {
                        $hp = '+62' . substr(trim($telp), 1);
                    }
                }
                $q  = $this->db->query("select * from produk_warga where id='$id'");
                $row = $q->row();
                unlink('./image/' . $row->gambar);
                $result = $this->db->query("update produk_warga set produk='$produk',slug='$slug',gambar='$gambar',harga='$harga',ket='$ket',lat='$lat',lng='$lng',pemilik='$pemilik',telppemilik='$hp',iduser='$iduser',date=now() where id='$id'");
                echo json_encode($result);
            }
        } else {
            $produk = clear($_POST['produk']);
            $string   = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $produk);
            $trim     = trim($string);
            $slug     = strtolower(str_replace(" ", "-", $trim));
            $harga = str_replace(',', '', clear($_POST['harga']));
            $lat = clear($_POST['lat']);
            $lng = clear($_POST['lng']);
            $pemilik = clear($_POST['pemilik']);
            $telp = clear($_POST['telp']);
            $ket = clear($_POST['ket']);
            $iduser = $this->session->userdata("id");
            $nohp = str_replace(".", "", $telp);

            // cek apakah no hp mengandung karakter + dan 0-9
            if (!preg_match('/[^+0-9]/', trim($telp))) {
                // cek apakah no hp karakter 1-3 adalah +62
                if (substr(trim($telp), 0, 3) == '+62') {
                    $hp = trim($telp);
                }
                // cek apakah no hp karakter 1 adalah 0
                elseif (substr(trim($telp), 0, 1) == '0') {
                    $hp = '+62' . substr(trim($telp), 1);
                }
            }
            $result = $this->db->query("update produk_warga set produk='$produk',slug='$slug',harga='$harga',ket='$ket',lat='$lat',lng='$lng',pemilik='$pemilik',telppemilik='$telp',iduser='$iduser',date=now() where id='$id'");
            echo json_encode($result);
        }
    }

    public function produkbumdes()
    {
        $this->load->library('pagination');
        $jum  = $this->db->query("select produk_bumdes.* from produk_bumdes");
        $page = $this->uri->segment(3);
        if (!$page) :
            $offset = 0;
        else :
            $offset = $page;
        endif;
        $limit = 3;
        $config['base_url'] = base_url() . 'main/produkbumdes/';
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
        $data['page'] = $this->pagination->create_links();
        $data['qe'] = $this->main_model->produkbumdes_perpage($offset, $limit);
        $this->load->view('backend/atas');
        $this->load->view('backend/produkbumdes', $data);
        $this->load->view('backend/bawah');
    }

    public function addbumdes()
    {
        $this->load->view('backend/atas');
        $this->load->view('backend/addbumdes');
        $this->load->view('backend/bawah');
    }
    public function editbumdes($id = '')
    {
        $data['id'] = $id;
        $this->load->view('backend/atas');
        $this->load->view('backend/editbumdes', $data);
        $this->load->view('backend/bawah');
    }

    public function updatebumdes($id = '')
    {
        $config['upload_path'] = './image/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']  = '3000';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if (!empty($_FILES['gambar']['name'])) {
            if (!$this->upload->do_upload('gambar')) {
                echo false;
            } else {
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']    = 'gd2';
                $config['source_image']     = './image/' . $gbr['file_name'];
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
                $harga = str_replace(',', '', clear($_POST['harga']));
                $kat = clear($_POST['kat']);
                $ket = clear($_POST['desk']);
                $telp = clear($_POST['telp']);
                $gambar = $gbr['file_name'];
                $nohp = str_replace(".", "", $telp);
                // cek apakah no hp mengandung karakter + dan 0-9
                if (!preg_match('/[^+0-9]/', trim($nohp))) {
                    // cek apakah no hp karakter 1-3 adalah +62
                    if (substr(trim($nohp), 0, 3) == '+62') {
                        $hp = trim($nohp);
                    }
                    // cek apakah no hp karakter 1 adalah 0
                    elseif (substr(trim($nohp), 0, 1) == '0') {
                        $hp = '+62' . substr(trim($nohp), 1);
                    }
                }
                $q  = $this->db->query("select * from produk_warga where id='$id'");
                $row = $q->row();
                unlink('./image/' . $row->gambar);
                $result = $this->db->query("update produk_bumdes set produk='$produk',slug='$slug',kategori='$kat',telp='$hp',harga='$harga',gambar='$gambar',desk='$ket',date=now() where id='$id'");
                echo json_encode($result);
            }
        } else {
            $produk = clear($_POST['produk']);
            $string   = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $produk);
            $trim     = trim($string);
            $slug     = strtolower(str_replace(" ", "-", $trim));
            $harga = str_replace(',', '', clear($_POST['harga']));
            $kat = clear($_POST['kat']);
            $ket = clear($_POST['desk']);
            $telp = clear($_POST['telp']);
            $nohp = str_replace(".", "", $telp);
            // cek apakah no hp mengandung karakter + dan 0-9
            if (!preg_match('/[^+0-9]/', trim($telp))) {
                // cek apakah no hp karakter 1-3 adalah +62
                if (substr(trim($telp), 0, 3) == '+62') {
                    $hp = trim($telp);
                }
                // cek apakah no hp karakter 1 adalah 0
                elseif (substr(trim($telp), 0, 1) == '0') {
                    $hp = '+62' . substr(trim($telp), 1);
                }
            }
            $result = $this->db->query("update produk_bumdes set produk='$produk',slug='$slug',kategori='$kat',telp='$hp',harga='$harga',desk='$ket',date=now() where id='$id'");

            echo json_encode($result);
        }
    }

    public function savebumdes()
    {
        $config['upload_path'] = './image/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']  = '2000';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload("gambar")) { //upload file
            $gbr = $this->upload->data();

            $config['image_library']    = 'gd2';
            $config['source_image']     = './image/' . $gbr['file_name'];
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
            $harga = str_replace(',', '', clear($_POST['harga']));
            $lat = clear($_POST['lat']);
            $kat = clear($_POST['kat']);
            $ket = clear($_POST['desk']);
            $telp = clear($_POST['telp']);
            $gambar = $gbr['file_name'];
            $nohp = str_replace(".", "", $telp);
            // cek apakah no hp mengandung karakter + dan 0-9
            if (!preg_match('/[^+0-9]/', trim($telp))) {
                // cek apakah no hp karakter 1-3 adalah +62
                if (substr(trim($telp), 0, 3) == '+62') {
                    $hp = trim($telp);
                }
                // cek apakah no hp karakter 1 adalah 0
                elseif (substr(trim($telp), 0, 1) == '0') {
                    $hp = '+62' . substr(trim($telp), 1);
                }
            }
            $result = $this->db->query("insert into produk_bumdes values('','$produk','$slug','$kat','$hp','$harga','$gambar','$ket',now(),'0')");
            echo json_encode($result);
        } else {
            echo false;
        }
    }

    public function hapusbumdes($id = '')
    {
        $q = $this->db->query("select * from produk_bumdes where id='$id'");
        $row  = $q->row();
        unlink('./image/' . $row->gambar);
        $this->db->query("delete from produk_bumdes where id='$id'");
        echo true;
    }

    public function detailbumdes($id = '')
    {
        $data['id'] = $id;
        $this->load->view('backend/atas', $data, FALSE);
        $this->load->view('backend/detailbumdes', $data, FALSE);
        $this->load->view('backend/bawah', $data, FALSE);
    }

    public function settingslider()
    {
        $this->load->view('backend/atas');
        $this->load->view('backend/settingslider');
        $this->load->view('backend/bawah');
    }



    public function updateslider()
    {
        $config['upload_path'] = './image/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']  = '2000';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if (!empty($_FILES['gambar1']['name'])) {
            if (!$this->upload->do_upload('gambar1')) {
                echo false;
            } else {
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']    = 'gd2';
                $config['source_image']     = './image/' . $gbr['file_name'];
                $config['create_thumb']     = false;
                $config['maintain_ratio']   = TRUE;
                $config['quality']          = '90%';
                $config['width']            = 1920;
                $config['height']           = 1088;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $judul1 = clear($_POST['judul1']);
                $judul2 = clear($_POST['judul2']);
                $judul3 = clear($_POST['judul3']);
                $gambar = $gbr['file_name'];
                $q  = $this->db->query("select * from slider ");
                $row = $q->row();
                unlink('./image/' . $row->gambar1);
                $result  = $this->db->query("update slider set gambar1='$gambar',judul1='$judul1',judul2='$judul2',judul3='$judul3'");
                echo json_encode($result);
            }
        } elseif (!empty($_FILES['gambar2']['name'])) {
            if (!$this->upload->do_upload('gambar2')) {
                echo false;
            } else {
                $gbr2 = $this->upload->data();
                //Compress Image
                $config['image_library']    = 'gd2';
                $config['source_image']     = './image/' . $gbr2['file_name'];
                $config['create_thumb']     = false;
                $config['maintain_ratio']   = TRUE;
                $config['quality']          = '90%';
                $config['width']            = 1920;
                $config['height']           = 1088;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $judul1 = clear($_POST['judul1']);
                $judul2 = clear($_POST['judul2']);
                $judul3 = clear($_POST['judul3']);
                $gambar2 = $gbr2['file_name'];
                $q  = $this->db->query("select * from slider ");
                $row = $q->row();
                unlink('./image/' . $row->gambar2);
                $result  = $this->db->query("update slider set gambar2='$gambar2',judul1='$judul1',judul2='$judul2',judul3='$judul3'");
                echo json_encode($result);
            }
        } elseif (!empty($_FILES['gambar3']['name'])) {
            if (!$this->upload->do_upload('gambar3')) {
                echo false;
            } else {
                $gbr3 = $this->upload->data();
                //Compress Image
                $config['image_library']    = 'gd2';
                $config['source_image']     = './image/' . $gbr3['file_name'];
                $config['create_thumb']     = false;
                $config['maintain_ratio']   = TRUE;
                $config['quality']          = '90%';
                $config['width']            = 1920;
                $config['height']           = 1088;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $judul1 = clear($_POST['judul1']);
                $judul2 = clear($_POST['judul2']);
                $judul3 = clear($_POST['judul3']);
                $gambar3 = $gbr3['file_name'];
                $q  = $this->db->query("select * from slider ");
                $row = $q->row();
                unlink('./image/' . $row->gambar3);
                $result  = $this->db->query("update slider set gambar3='$gambar3',judul1='$judul1',judul2='$judul2',judul3='$judul3'");
                echo json_encode($result);
            }
        } else {
            $judul1 = clear($_POST['judul1']);
            $judul2 = clear($_POST['judul2']);
            $judul3 = clear($_POST['judul3']);
            $result  = $this->db->query("update slider set judul1='$judul1',judul2='$judul2',judul3='$judul3'");
            echo json_encode($result);
        }
    }


    public function kategori()
    {
        $this->load->view('backend/kategori');
    }


    public function loadkategori()
    { ?>
        <table width='100%' class='table table-sm table-hover table-bordered dttable'>
            <thead align="center">
                <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody align="center">
                <?php
                $no = 1;
                $q = $this->db->query("select * from kategori ");
                foreach ($q->result() as $row) {
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row->kat; ?></td>
                        <td>
                            <a href="main/hapuskategori/<?php echo $row->id ?>" class="btn btn-danger btn-sm hapus"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php $no++;
                } ?>
            </tbody>
        </table>
        <script>
            $(".hapus").click(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Hapus Data ?',
                    text: "Data yang sudah dihapus tidak bisa kembali !",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yaa, hapus data !'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: $(this).attr('href'),
                            type: 'post',
                            data: $(this).serialize(),
                            dataType: "html",
                            success: function(dt) {
                                Swal.fire(
                                    'Informasi',
                                    'Data berhasil dihapus !',
                                    'success'
                                );
                                $("#get").load("main/loadkategori");
                                $("#entri").load("main/entrikategori");
                            },
                            error: function(dt) {
                                alert("Ada Kesalahan Sistem")
                            },
                        });
                    } else return false;
                })

            });
            $('.dttable').DataTable();
        </script>
    <?php    }

    public function entrikategori()
    { ?>
        <form method="post" action="main/savekategori" id="save">

            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Kat</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" required name="a" autocomplete='off' placeholder="Nama Kategori" type="text">
                </div>
            </div>
            <div class="form-group row">
                <button class="btn btn-primary w-100" type="submit" id="simpan">Simpan</button>
            </div>
        </form>
        <script>
            $("#save").on("submit", function(e) {
                e.preventDefault();
                $.ajax({
                    type: "post",
                    url: $(this).attr('action'),
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: false,
                    success: function(response) {
                        $("#simpan").html("<i class='fas fa-spinner'></i> Berhasil Simpan");
                        Swal.fire(
                            "Informasi",
                            "Data kategori berhasil disimpan!",
                            "info"
                        );
                        $("#get").load("main/loadkategori");
                        $("#entri").load("main/entrikategori");
                    },
                    error: function(e) {
                        alert("Ada kesalahan sistem")
                    }
                });
            });
        </script>
    <?php }

    public function savekategori()
    {
        $a = clear($_POST['a']);
        $this->db->query("insert into kategori values('','$a')");
        echo true;
    }

    public function hapuskategori($id = '')
    {
        $this->db->query("delete from kategori where id='$id'");
        echo true;
    }

    public function berita()
    {
        $this->load->library('pagination');
        $jum = $this->db->query("select berita.*,admin.nama,kategori.kat from berita inner join admin on admin.id = berita.iduser inner join kategori on kategori.id = berita.idkat");
        $page = $this->uri->segment(3);
        if (!$page) :
            $offset = 0;
        else :
            $offset = $page;
        endif;
        $limit = 3;
        $config['base_url'] = base_url() . 'main/berita/';
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
        $data['page'] = $this->pagination->create_links();
        $data['q'] = $this->main_model->berita_perpage($offset, $limit);

        $this->load->view('backend/berita', $data);
    }


    public function saveberita()
    {
        $config['upload_path'] = './image/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']  = '2000';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload("gambar")) { //upload file
            $gbr = $this->upload->data();

            $config['image_library']    = 'gd2';
            $config['source_image']     = './image/' . $gbr['file_name'];
            $config['create_thumb']     = FALSE;
            $config['maintain_ratio']   = TRUE;
            $config['quality']          = '80%';
            $config['width']            = 1024;
            $config['height']           = 768;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $judul = clear($_POST['judul']);
            $string   = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $judul);
            $trim     = trim($string);
            $slug     = strtolower(str_replace(" ", "-", $trim));
            $ket = clear($_POST['desc']);
            $kat = clear($_POST['kat']);
            $gambar = $gbr['file_name'];
            $iduser = $this->session->userdata('id');
            $result =  $this->db->query("insert into berita values('','$slug','$judul','$iduser','$kat','$ket',now(),'0','$gambar')");
            echo json_encode($result);
        } else {
            echo false;
        }
    }

    public function inputberita()
    {
        $this->load->view('backend/inputberita');
    }
    public function editberita($id = '')
    {
        $data['id'] = $id;
        $this->load->view('backend/editberita', $data);
    }

    public function hapusberita($id = '')
    {
        $q = $this->db->query("select * from berita where id='$id'");
        $row  = $q->row();
        unlink('./image/' . $row->gambar);
        $this->db->query("delete from berita where id='$id'");
        echo true;
    }


    public function updateberita($id = '')
    {
        $config['upload_path'] = './image/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']  = '3000';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if (!empty($_FILES['gambar']['name'])) {
            if (!$this->upload->do_upload('gambar')) {
                echo false;
            } else {
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']    = 'gd2';
                $config['source_image']     = './image/' . $gbr['file_name'];
                $config['new_image']        = './getfile/thumb/' . $gbr['file_name'];
                $config['create_thumb']     = TRUE;
                $config['maintain_ratio']   = TRUE;
                $config['quality']          = '50%';
                $config['width']            = 256;
                $config['height']           = 256;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $judul = clear($_POST['judul']);
                $string   = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $judul);
                $trim     = trim($string);
                $slug     = strtolower(str_replace(" ", "-", $trim));
                $ket = clear($_POST['desc']);
                $kat = clear($_POST['kat']);
                $gambar = $gbr['file_name'];
                $iduser = $this->session->userdata('id');
                $gambar = $gbr['file_name'];
                $q  = $this->db->query("select * from berita where id='$id'");
                $row = $q->row();
                unlink('./image/' . $row->gambar);
                $result = $this->db->query("update berita set slug='$slug',judul='$judul',iduser='$iduser',idkat='$kat',ket='$ket',gambar='$gambar' where id='$id'");
                // $this->db->query("UPDATE informasi SET  WHERE slug='$slug'");
                echo json_encode($result);
            }
        } else {
            $iduser = $this->session->userdata('id');
            $judul = clear($_POST['judul']);
            $string   = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $judul);
            $trim     = trim($string);
            $slug     = strtolower(str_replace(" ", "-", $trim));
            $ket = clear($_POST['desc']);
            $kat = clear($_POST['kat']);
            $result =    $this->db->query("UPDATE berita SET slug='$slug',judul='$judul',iduser='$iduser',idkat='$kat',ket='$ket' WHERE id='$id'");
            echo json_encode($result);
        }
    }

    public function komentarberita()
    {
        $this->load->view('backend/komentarberita');
    }

    public function hapuspesanberita($id = '')
    {
        $this->db->query("delete from komentar_berita where id='$id'");
        echo true;
    }

    public function wilayah()
    {
        $this->load->view('backend/atas');
        $this->load->view('backend/wilayah');
        $this->load->view('backend/bawah');
    }

    public function updatewilayah()
    {
        $geo = clear($_POST['geo']);
        $this->db->query("update setting set wilayah='$geo'");
        echo true;
    }


    public function viewpengaduan($id = '')
    {
        $data['id'] = $id;
        $this->load->view('backend/atas');
        $this->load->view('backend/viewpengaduan', $data);
        $this->load->view('backend/bawah');
    }

    public function verifikasi($id = '')
    {
        $this->db->query("update pengaduan set status='Proses' where id='$id'");
        echo true;
    }

    public function respon()
    {
        $this->load->view('backend/atas');
        $this->load->view('backend/respon');
        $this->load->view('backend/bawah');
    }
    public function balaspelapor($id = '')
    {
        $data['id'] = $id;
        $this->load->view('backend/atas');
        $this->load->view('backend/balaspelapor', $data);
        $this->load->view('backend/bawah');
    }

    public function balaspelaporgan()
    {
        $lapor = clear($_POST['lapor']);
        $id = clear($_POST['idpengaduan']);
        $idadmin = $this->session->userdata("id");
        $this->db->query("insert into tanggapan values('','$id',now(),'$lapor','$idadmin')");
        $this->db->query("update pengaduan set status='Selesai' where id='$id'");
        echo true;
    }


    public function hapuspengaduan($id = '')
    {
        $q = $this->db->query("select * from pengaduan where id='$id'");
        $row  = $q->row();
        unlink('./image/' . $row->lampiran);
        $this->db->query("delete from pengaduan where id='$id'");
        echo true;
    }

    public function selesai()
    {
        $this->load->view('backend/atas');
        $this->load->view('backend/selesai');
        $this->load->view('backend/bawah');
    }

    public function laporanpengaduan()
    {
        $this->load->view('backend/atas');
        $this->load->view('backend/laporanselesai');
        $this->load->view('backend/bawah');
    }



    public function pengguna()
    {
        $this->load->view('backend/pengguna');
    }

    public function inputpengguna()
    {
        $this->load->view('backend/inputpengguna');
    }

    public function editpengguna($id = '')
    {
        $data['id']  = $id;
        $this->load->view('backend/editpengguna', $data);
    }

    public function savepengguna()
    {
        $nama = clear($_POST['nama']);
        $email = clear($_POST['email']);
        $telp = clear($_POST['telp']);
        $username = clear($_POST['username']);
        $password = clear($_POST['password']);
        $level = clear($_POST['level']);
        $this->db->query("insert into admin values('','$nama','$username',md5(md5(md5('$password'))),'$telp','$email','$level','1',now())");
        echo true;
    }

    public function updatepengguna($id = '')
    {
        $nama = clear($_POST['nama']);
        $email = clear($_POST['email']);
        $telp = clear($_POST['telp']);
        $username = clear($_POST['username']);
        $password = clear($_POST['password']);
        $level = clear($_POST['level']);

        if ($password == '') {
            $this->db->query("update admin set nama='$nama',username='$username',telp='$telp',email='$email',level='$level' where id='$id'");
            echo true;
        } else {
            $this->db->query("update admin set nama='$nama',username='$username',password=md5(md5(md5('$password'))),telp='$telp',email='$email',level='$level' where id='$id'");
            echo true;
        }
    }


    public function hapuspengguna($id = '')
    {
        $this->db->query("delete from admin where id='$id'");
        echo true;
    }

    public function loadpengguna()
    { ?>
        <table class="table table-striped" id="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama Pengguna</th>
                    <th>Username</th>
                    <th>No HP</th>
                    <th>Email</th>
                    <th>Level</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $q = $this->db->query("select * from admin");
                foreach ($q->result() as $row) {
                ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td>
                            <img src="plugin/pria.png" width="80" alt="" class="img img-fluid rounded-circle">
                        </td>
                        <td><?php echo $row->nama ?></td>
                        <td><?php echo $row->username ?></td>
                        <td><?php echo $row->telp ?></td>
                        <td><?php echo $row->email ?></td>
                        <td>
                            <?php if ($row->level == '1') { ?>
                                <span class="badge badge-success">Administrator</span>
                            <?php } else { ?>
                                <span class="badge badge-warning">Operator</span>

                            <?php } ?>
                        </td>
                        <td>
                            <?php if ($row->status == '1') { ?>
                                <span class="badge badge-info">Aktif</span>
                            <?php } else { ?>
                                <span class="badge badge-danger">Noaktif</span>

                            <?php } ?>
                        </td>
                        <td>
                            <a href="main/hapuspengguna/<?php echo $row->id ?>" class="hapus btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            <?php if ($row->status == '1') { ?>
                                <a href="main/nonpengguna/<?php echo $row->id ?>" class=" non btn btn-warning btn-sm"><i class="fa fa-sync-alt"></i></a>
                            <?php } else { ?>
                                <a href="main/aktifpengguna/<?php echo $row->id ?>" class=" aktif btn btn-success btn-sm"><i class="fa fa-lock"></i></a>

                            <?php } ?>
                            <!-- <a href="main/editpengguna/<?php echo $row->id ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a> -->
                        </td>
                    </tr>
                <?php $no++;
                } ?>
            </tbody>
        </table>
        <script>
            $("#table").DataTable();
            $(".hapus").click(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Hapus Data ?',
                    text: "Data yang sudah dihapus tidak bisa kembali !",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yaa, hapus data !'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: $(this).attr('href'),
                            type: 'post',
                            data: $(this).serialize(),
                            dataType: "html",
                            success: function(dt) {
                                Swal.fire(
                                    "Informasi",
                                    "Data Pengguna Berhasil Dihapus!",
                                    "success"
                                );
                                $("#load").load("main/loadpengguna");

                            },
                            error: function(dt) {
                                alert("Ada Kesalahan Sistem");
                            },
                        });
                    } else return false;
                })

            });
            $(".non").click(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Informasi',
                    text: "Ingin mengnonaktifkan data pengguna? jika dinonaktifkan maka pengguna tersebut tidak bisa melakukan login!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yaa'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: $(this).attr('href'),
                            type: 'post',
                            data: $(this).serialize(),
                            dataType: "html",
                            success: function(dt) {
                                Swal.fire(
                                    "Informasi",
                                    "Data Pengguna Berhasil Dinonaktifkan!",
                                    "success"
                                );
                                $("#load").load("main/loadpengguna");

                            },
                            error: function(dt) {
                                alert("Ada Kesalahan Sistem");
                            },
                        });
                    } else return false;
                })

            });
            $(".aktif").click(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Informasi',
                    text: "Ingin mengaktifkan data pengguna? jika diaktifkan maka pengguna tersebut bisa melakukan login!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yaa'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: $(this).attr('href'),
                            type: 'post',
                            data: $(this).serialize(),
                            dataType: "html",
                            success: function(dt) {
                                Swal.fire(
                                    "Informasi",
                                    "Data Pengguna Berhasil Diaktifkan!",
                                    "success"
                                );
                                $("#load").load("main/loadpengguna");

                            },
                            error: function(dt) {
                                alert("Ada Kesalahan Sistem");
                            },
                        });
                    } else return false;
                })

            });
        </script>
<?php  }

    public function nonpengguna($id = '')
    {
        $this->db->query("update admin set status='0' where id='$id'");
        echo true;
    }
    public function aktifpengguna($id = '')
    {
        $this->db->query("update admin set status='1' where id='$id'");
        echo true;
    }
}
