<!DOCTYPE html>
<html>
<head>
    <title> Dashboard - Admin</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Sistem Kantin Terpadu</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <div class="navbar-form navbar-right">
                <a href="<?php echo base_url('login/logout') ?>" type="submit" class="btn btn-success"><i class="fa fa-sign-out"></i> Logout</a>
            </div>
      </div>
    </nav>
<div class="container" style="margin-top: 80px">
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
              <a href="#" class="list-group-item active" style="text-align: center;background-color: black;border-color: black">
                ADMINISTRATOR
              </a>
              <a href="<?php echo base_url('admin') ?>" class="list-group-item"><i class="fa fa-dashboard"></i> Dashboard</a>
              <a href="<?php echo base_url('fungsi/alluser') ?>" class="list-group-item"><i class="fa fa-users"></i> List Pemesan</a>
              <a href="<?php echo base_url('fungsi/user'); ?>" class="list-group-item"><i class="fa fa-user"></i> Tambah User</a>
              <a href="<?php echo base_url('login/logout') ?>" class="list-group-item"><i class="fa fa-sign-out"></i> Logout</a>
            </div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-dashboard"></i> Dashboard</h3>
              </div>
              <div class="panel-body">
                Selamat Datang <b><?php echo $this->session->userdata("nama") ?></b> di halaman Sistem Admin Kantin Terpadu
              </div>

              <div class="panel-body pull-right">
                <a type="submit" class="btn btn-success" data-toggle="modal" data-target="#modal_add_menu"><i class="fa fa-plus-square-o"></i> Tambah Menu</a>

                <!-- ============ MODAL ADD BARANG =============== -->
                        <div class="modal fade" id="modal_add_menu" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                <h3 class="modal-title" id="myModalLabel">Add Menu</h3>
                            </div>
                            <?php
                            foreach ($dataModel as $modal) {
                              $kode_menu = $modal['id_menu'] + "1";
                            }
                            ?>
                            <?php echo form_open('fungsi/addMenu')?>
                                <div class="modal-body form-horizontal">
                                    <div class="form-group">
                                        <label class="control-label col-xs-3" >Kode Menu</label>
                                        <div class="col-xs-8">
                                            <input name="id_menu" class="form-control" type="text" value="<?php echo $kode_menu; ?>" readonly>
                                        </div>
                                  </div>

                                    <div class="form-group">
                                        <label class="control-label col-xs-3" >Nama Menu</label>
                                        <div class="col-xs-8">
                                            <input name="nama_menu" class="form-control" type="text" placeholder="Nama Menu" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-xs-3" >Jenis Menu</label>
                                        <div class="col-xs-8">
                                             <select name="id_kategori" class="form-control" required>
                                                <option value="">-PILIH-</option>
                                                <option value="<?php echo "1"; ?>">Makanan</option>
                                                <option value="<?php echo "2"; ?>">Minuman</option>
                                             </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-xs-3" >Harga Menu</label>
                                        <div class="col-xs-8">
                                            <input name="harga" class="form-control" type="text" placeholder="Harga Menu" required>
                                        </div>
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                                    <input class="btn btn-info" type="submit" value="Simpan">
                                </div>
                            <?php echo form_close(); ?>
                            </div>
                            </div>
                        </div>
                        <!--END MODAL ADD BARANG-->
              </div>

              <div class="panel-body">
                List Menu yang tersedia :
                <br><br><b>Makanan</b>
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama Menu</th>
                      <th scope="col">Harga</th>
                    </tr>
                  </thead>
                  <?php $no = 1; foreach ($dataModel as $dataMakan) {
                  if ($dataMakan['id_kategori'] == 1) { ?>

                  <tbody>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $dataMakan['nama_menu']; ?></td>
                      <td>Rp. <?php echo number_format($dataMakan['harga'], 2, ',', '.'); ?></td>
                      <td>

                      </td>
                    </tr>
                  </tbody>
                  <?php
                      $no++;
                      }
                  } ?>
                  </table>

                  <br><b>Minuman</b>
                  <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Menu</th>
                        <th scope="col">Harga</th>
                      </tr>
                    </thead>

                <?php $nom = 1; foreach ($dataModel as $dataMinum) {
                if ($dataMinum['id_kategori'] == 2) { ?>

                  <tbody>
                    <tr>
                      <td><?php echo $nom; ?></td>
                      <td><?php echo $dataMinum['nama_menu']; ?></td>
                      <td>Rp. <?php echo number_format($dataMinum['harga'], 2, ',', '.'); ?></td>
                      <td>

                      </td>
                    </tr>
                  </tbody>
                <?php
                      $nom++;
                      }
                  } ?>

                </table>

              </div>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
