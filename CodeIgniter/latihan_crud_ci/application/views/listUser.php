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
                <h3 class="panel-title"><i class="fa fa-user"></i> List Pemesan</h3>
              </div>
              <div class="panel-body">
                <b> List Pemesan </b> di halaman Sistem Admin Kantin Terpadu
              </div>

              <div class="panel-body">

                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama Pemesan</th>
                      <th scope="col">Total Harga</th>
                    </tr>
                  </thead>
                  <?php $no = 1; foreach ($dataModel as $data) {
                  ?>

                  <tbody>
                    <?php if ($data['total_harga'] > 0): ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $data['nama_pembeli']; ?></td>
                        <td>Rp. <?php echo number_format($data['total_harga'], 2, ',', '.'); ?></td>
                      <?php endif; ?>
                      <td>

                      </td>
                    </tr>
                  </tbody>
                  <?php
                  $no++;
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
