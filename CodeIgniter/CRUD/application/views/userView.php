<!DOCTYPE html>
<html>
<head>
    <title> Dashboard - User</title>
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
                USER
              </a>
              <a href="<?php echo base_url('user') ?>" class="list-group-item"><i class="fa fa-dashboard"></i> Dashboard</a>
              <a href="<?php echo base_url('pesanan'); ?>" class="list-group-item"><i class="fa fa-shopping-cart"></i> Pesanan</a>
              <a href="<?php echo base_url('login/logout') ?>" class="list-group-item"><i class="fa fa-sign-out"></i> Logout</a>
            </div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-dashboard"></i> Dashboard</h3>
              </div>

              <div class="panel-body">
                Selamat Datang User <b><?php echo $this->session->userdata("nama") ?></b> di halaman Sistem Kantin Terpadu
              </div>

              <div class="panel-body">
                Pilih Menu :
                <br><br><b>Makanan</b>
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama Menu</th>
                      <th scope="col">Harga</th>
                      <th scope="col">Qty</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <?php $no = 1; foreach ($dataModel as $dataMakan) {
                    echo form_open('pesanan/tambah');
                    if ($dataMakan['id_kategori'] == 1) { ?>

                  <tbody>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td class="col-md-4"><?php echo $dataMakan['nama_menu']; ?></td>
                      <td class="col-md-4">Rp. <?php echo number_format($dataMakan['harga'], 2, ',', '.'); ?></td>
                      <span class="add">
                        <td class="col-md-1">
                            <input type="number" name="quantity" min="1" max="50" value="1" class="quantity form-control" id="<?php echo $dataMakan['nama_menu']; ?>" >
                        </td>
                        <td class="col-md-3">
                            <input type="hidden" name="nama" value="<?php echo $dataMakan['nama_menu']; ?>">
                            <input type="hidden" name="harga" value="<?php echo $dataMakan['harga']; ?>">
                            <input type="hidden" name="kode" value="">
                            <input class="btn btn-sm btn-success btn-block" type="submit" value="Pesan">
                        </td>
                    </span>
                    </tr>
                  </tbody>
                  <?php
                  echo form_close();
                  $no++;
                    }
                  } ?>
                </table>

                <b>Minuman</b>
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama Menu</th>
                      <th scope="col">Harga</th>
                      <th scope="col">Qty</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <?php $no = 1; foreach ($dataModel as $dataMinum) {
                    echo form_open('pesanan/tambah');
                    if ($dataMinum['id_kategori'] == 2) { ?>

                  <tbody>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td class="col-md-4"><?php echo $dataMinum['nama_menu']; ?></td>
                      <td class="col-md-4">Rp. <?php echo number_format($dataMinum['harga'], 2, ',', '.'); ?></td>
                      <span class="add">
                      <td class="col-md-1">
                        <input type="number" name="quantity" min="0" max="50" value="1" class="quantity form-control" id="<?php echo $dataMinum['nama_menu']; ?>" >
                      </td>
                      <td class="col-md-3">
                          <input type="hidden" name="nama" value="<?php echo $dataMinum['nama_menu']; ?>">
                          <input type="hidden" name="harga" value="<?php echo $dataMinum['harga']; ?>">
                          <input type="hidden" name="kode"  value="">
                          <input class="btn btn-sm btn-success btn-block" type="submit" value="Tambah">

                      </td>
                    </span>
                    </tr>
                  </tbody>
                  <?php
                  echo form_close();
                  $no++;
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
