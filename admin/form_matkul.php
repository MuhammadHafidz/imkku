<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php'); 
  include ('session.php');

  $status = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $matkul = $_POST['matkul'];
      $dosen = $_POST['dosen'];
      $jurusan = $_POST['jurusan'];
      $hari = $_POST['hari'];
      //query SQL
      $query = "INSERT INTO matkul (nama_matkul, dosen, jurusan, hari) VALUES('$matkul','$dosen','$jurusan','$hari')"; 

      //eksekusi query
      $result = mysqli_query(connection(),$query);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err'; 
      }
  }

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
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Pemrograman Web</a>
    </nav>

    <div class="container-fluid">
      <div class="row">
      <?php 
       include('menu.php');
       ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          
          <?php 
              if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Data Mata Kuliah berhasil disimpan</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Data Mata Kuliah gagal disimpan</div>';
              }
           ?>

          <h2 style="margin: 30px 0 30px 0;">Form Mata Kuliah</h2>
          <form action="form_matkul.php" method="POST">
            
            <div class="form-group">
              <label>Nama Matkul</label>
              <input type="text" class="form-control" placeholder="Mata Kuliah" name="matkul" required="required">
            </div>
            <div class="form-group">
              <label>Nama Dosen</label>
              <input type="text" class="form-control" placeholder="Dosen" name="dosen" required="required">
            </div>
            <div class="form-group">
              <label>Jurusan</label>
              <input type="text" class="form-control" placeholder="Jurusan" name="jurusan" required="required">
            </div>

            <div class="form-group">
              <label>Hari</label>
              <select class="custom-select" name="hari" required="required">
                <option value="">Pilih Salah Satu</option>
                <option value="Senin">Senin</option>
                <option value="Selasa">Selasa</option>
                <option value="Rabu">Rabu</option>
                <option value="Kamis">Kamis</option>
                <option value="Jumat">Jumat</option>
              </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </main>
      </div>
    </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </body>
</html>