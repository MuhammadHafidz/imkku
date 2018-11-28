<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php'); 
  include ('session.php');

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['id'])) {
          //query SQL
          $id = $_GET['id'];
          $query = "SELECT * FROM matkul WHERE id = '$id'"; 

          //eksekusi query
          $result = mysqli_query(connection(),$query);
      }  
  }

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $matkul = $_POST['matkul'];
      $dosen = $_POST['dosen'];
      $jurusan = $_POST['jurusan'];
      $hari = $_POST['hari'];
      //query SQL
      $sql = "UPDATE matkul SET nama_matkul='$matkul', dosen='$dosen', jurusan='$jurusan', hari='$hari' WHERE id='$id'";

      //eksekusi query
      $result = mysqli_query(connection(),$sql);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }

      //redirect ke halaman lain
      header('Location: matkul.php?status='.$status);
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
          

          <h2 style="margin: 30px 0 30px 0;">Update Data Mata Kuliah</h2>
          <form action="update_matkul.php" method="POST">
            <?php while($data = mysqli_fetch_array($result)): ?>
            <div class="form-group">
              <label>Id</label>
              <input type="text" class="form-control" placeholder="Id" name="id" value="<?php echo $data['id'];  ?>" required="required" readonly>
            </div>
            <div class="form-group">
              <label>Nama</label>
              <input type="text" class="form-control" placeholder="Nama Matkul" name="matkul" value="<?php echo $data['nama_matkul'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>Nama Dosen</label>
              <input type="text" class="form-control" placeholder="Dosen" name="dosen" value="<?php echo $data['dosen'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>Jurusan</label>
              <input type="text" class="form-control" placeholder="Jurusan" name="jurusan" value="<?php echo $data['jurusan'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>Hari</label>
              <select class="custom-select" name="hari" required="required">
                <option value="">Pilih Salah Satu</option>
                <option value="Senin" <?php echo $data['hari']=='Senin' ? "selected" : "" ?>>Senin</option>
                <option value="Selasa" <?php echo $data['hari']=='Selasa' ? "selected" : "" ?>>Selasa</option>
                <option value="Rabu" <?php echo $data['hari']=='Rabu' ? "selected" : "" ?>>Rabu</option>
                <option value="Kamis" <?php echo $data['hari']=='Kamis' ? "selected" : "" ?>>Kamis</option>
                <option value="Jumat" <?php echo $data['hari']=='Jumat' ? "selected" : "" ?>>Jumat</option>
              </select>
            </div>
            <?php endwhile; ?>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </main>
      </div>
    </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </body>
</html>