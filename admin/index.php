<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('session.php');
  include ('conn.php'); 
  
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Example</title>
    <!-- load css boostrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Admin-Classic</a>
    </nav>

    <div class="container-fluid">
      <div class="row">
       <?php 
       include('menu.php');
       ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <?php 
            //mengecek apakah proses update dan delete sukses/gagal
            if (@$_GET['status']!==NULL) {
              $status = $_GET['status'];
              if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Data Mahasiswa berhasil di-update</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Data Mahasiswa gagal di-update</div>';
              }

            }
           ?>
          <h2 style="margin: 30px 0 30px 0;">Data Destinasi</h2>
          <a class="btn btn-outline-success btn-sm" href="form.php" style="margin-bottom : 20px;">Tambah Data</a>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Deskripsi</th>
                  <th>Harga</th>
                  <th>Lokasi</th>
                  <th>Alamat</th>
                  <th>Gambar</th>
                  <th>Tanggal</th>
                  <th>Rate</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  //proses menampilkan data dari database:
                  //siapkan query SQL
                  $query = "SELECT * FROM destinasi";
                  $result = mysqli_query(connection(),$query);
                 ?>

                 <?php while($data = mysqli_fetch_array($result)): ?>
                  <tr>
                    <td><?php echo $data['ID_DESTINASI'];  ?></td>
                    <td><?php echo $data['NAMA'];  ?></td>
                    <td><?php echo $data['DESKRIPSI'];  ?></td>
                    <td><?php echo $data['HARGA'];  ?></td>
                    <td><?php echo $data['LOKASI'];  ?></td>
                    <td><?php echo $data['ALAMAT'].", ". $data['KOTA'].", ". $data['PROVINSI'];  ?></td>
                    <td><?php echo $data['GAMBAR'];  ?></td>
                    <td><?php echo $data['TANGGAL'];  ?></td>
                    <td><?php echo $data['RATE'];  ?></td>
                    <td>
                      <a href="<?php echo "update.php?nrp=".$data['nrp']; ?>" class="btn btn-outline-warning btn-sm"> Update</a>
                      &nbsp;&nbsp;
                      <a href="<?php echo "delete.php?nrp=".$data['nrp']; ?>" class="btn btn-outline-danger btn-sm"> Delete</a>
                    </td>
                  </tr>
                 <?php endwhile ?>
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </body>
</html>