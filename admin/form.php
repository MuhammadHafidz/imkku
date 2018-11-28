<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php'); 
  include ('session.php');

  $status = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $nama = $_POST['nama'];
      $deskripsi = $_POST['deskripsi'];
      $harga = $_POST['harga'];
      $lokasi = $_POST['lokasi'];
      $alamat = $_POST['alamat'];
      $kota = $_POST['kota'];
      $provinsi = $_POST['provinsi'];
      $rate = $_POST['rate'];

      //ambil gambar
      
        $ekstensi_diperbolehkan	= array('png','jpg');
        $gambar = $_FILES['file']['name'];
        $x = explode('.', $nama);
        $ekstensi = strtolower(end($x));
        $ukuran	= $_FILES['file']['size'];
        $file_tmp = $_FILES['file']['tmp_name'];	
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
          move_uploaded_file($file_tmp, '../img/upload/'.$gambar);
          
          //query SQL
          $query = "INSERT INTO destinasi (NAMA, DESKRIPSI, HARGA, LOKASI, ALAMAT, KOTA, PROVINSI, GAMBAR, RATE) VALUES('$nama','$deskripsi','$harga','$lokasi','$alamat','$kota','$provinsi','$gambar','$rate')"; 

          //eksekusi query
          $result = mysqli_query(connection(),$query);
          if ($result) {
            $status = 'ok';
          }
          else{
            $status = 'err';
          }
        }else {
          $status = 'err';
        }
      
      //query SQL
      $query = "INSERT INTO mhs (NAMA, DESKRIPSI, HARGA, LOKASI, ALAMAT, KOTA, PROVINSI, GAMBAR, RATE) VALUES('$nama','$deskripsi','$harga','$lokasi','$alamat','$kota','$provinsi','$gambar','$rate')"; 

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
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Admin Klasik</a>
    </nav>

    <div class="container-fluid">
      <div class="row">
      <?php 
       include('menu.php');
       ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          
          <?php 
              if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Data berhasil disimpan</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Data gagal disimpan</div>';
              }
           ?>

          <h2 style="margin: 30px 0 30px 0;">New Destinasi</h2>
          <form action="form.php" method="POST">
            
            <div class="form-group">
              <label>NAMA</label>
              <input type="text" class="form-control" placeholder="Nama Tempat" name="nama" required="required">
            </div>
            <div class="form-group">
              <label>DESKRIPSI</label>
              <textarea name="deskripsi" class="form-control" id="deskripsi" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
              <label>HARGA</label>
              <input type="number" class="form-control" placeholder="HTM" name="harga" required="required" min=0 step=1000 value=0>
            </div>
            <div class="form-group">
              <label>LOKASI</label>
              <select class="form-control" id="lokasi" name="lokasi">
                <option value="Hutan">Hutan</option>
                <option value="Gunung">Gunung</option>
                <option value="Pantai">Pantai</option>
                <option value="Bumi Perkemahan">Bumi Perkemahan</option>
              </select>
            </div>
            <div class="form-group">
              <label>ALAMAT</label>
              <input type="text" class="form-control" placeholder="Alamat" name="alamat" required="required">
            </div>
            <div class="form-group">
              <label>KOTA</label>
              <input type="text" class="form-control" placeholder="Kota" name="kota" required="required">
            </div>
            <div class="form-group">
              <label>PROVINSI</label>
              <select class="form-control" id="provinsi" name="provinsi">
                <option value="Jawa Timur">JATIM</option>
                <option value="Jawa Tengah">JATENG</option>
                <option value="Jawa Barat">JABAR</option>
                <option value="Yogyakarta">DIY</option>
              </select>
            </div>
            <div class="form-group">
              <label>GAMBAR</label>
              <input type="file" class="form-control" placeholder="" name="file" required="required">
            </div>
            <div class="form-group">
              <label>RATE</label>
              <input type="number" class="form-control" placeholder="Rate" name="rate" required="required" max=5 min=0 step=0.1 value=0>
            </div>
            
            
            
            <button type="submit" class="btn btn-primary" style="margin-bottom : 20px;">Simpan</button>
          </form>
        </main>
      </div>
    </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </body>
</html>