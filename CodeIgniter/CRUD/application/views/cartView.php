<!DOCTYPE html>
<html>
<head>
    <title> Pesanan - User</title>
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
          <a class="navbar-brand" href="<?php echo base_url('user'); ?>">Sistem Kantin Terpadu</a>
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
              <a href="#" class="list-group-item"><i class="fa fa-shopping-cart"></i> Pesanan</a>
              <a href="<?php echo base_url('login/logout') ?>" class="list-group-item"><i class="fa fa-sign-out"></i> Logout</a>
              <button class="list-group-item" type="submit" ><i class="fa fa-trash"></i><?php echo anchor('pesanan/reset/',' Reset Pesanan'); ?></button>
            </div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-shopping-cart"></i> Pesanan</h3>
              </div>

              <div class="panel-body">
                Selamat Datang User <b><?php echo $this->session->userdata("nama") ?></b> di halaman Sistem Kantin Terpadu
              </div>

              <div class="panel-body">
                Detail Pesanan :
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
                  <?php $no = 1; $total_bayar = 0; $total_item = 0; foreach ($dataModel as $data) {
                    $total = $data['total_harga'];
                    $total_bayar += $total;
                    $qty = $data['qty'];
                    $total_item += $qty;
                  ?>

                  <tbody>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $data['nama_menu']; ?></td>
                      <td>Rp. <?php echo number_format($data['total_harga'], 2, ',', '.'); ?></td>
                      <td><?php echo number_format($data['qty']); ?></td>
                      <td>
                          <a href="<?php echo base_url('user'); ?>" class="btn btn-sm btn-success btn-block"><i class="fa fa-cart-plus"></i> Tambah Menu Lain</a>
                          <i class="fa fa-trash"></i> <?php echo anchor('pesanan/hapus/'.$data['id_menu_pesanan'],'Hapus Pesanan');?>
                      </td>
                    </tr>
                  </tbody>
                  <?php
                  $no++;
                  } ?>

                </table>

                Total User <b><?php echo $this->session->userdata("nama") ?></b> perlu bayar :
                <?php
                echo form_open('pesanan/bayar');?>
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Nama Pemesan</th>
                      <th scope="col">Total Harga</th>
                      <th scope="col">Total Item</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    <tr>
                      <td>
                        <div class="col-md-4 text-uppercase">
                            <?php echo $this->session->userdata("nama") ?>
                            <input class="form-control" type="hidden" name="nama" value="<?php echo $this->session->userdata("nama") ?>" readonly>
                        </div>
                      </td>

                      <td>
                          <div class="col-md-8">
                                Rp. <?php echo number_format($total_bayar, 2, ',', '.') ?>
                              <input class="form-control" type="hidden" name="harga" value="<?php echo $total_bayar ?>" readonly></td>
                          </div>
                      </td>
                        <td>
                          <div class="col-md-1">
                            <?php echo $total_item ?>
                          </div>
                        </td>
                      <td class="col-md-4">

                        <input type="hidden" name="id" value="">
                        <input class="btn btn-sm btn-success btn-block" type="submit"  value="Bayar">

                      </td>
                    </tr>
                  </tbody>
                </table>
              <?php echo form_close();?>
              </div>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
