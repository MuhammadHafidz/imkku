<?php 

  include ('conn.php'); 
  include ('session.php');

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['id'])) {
          //query SQL
          $id = $_GET['id'];
          $query = "DELETE FROM matkul WHERE id = '$id'"; 

          //eksekusi query
          $result = mysqli_query(connection(),$query);

          if ($result) {
            $status = 'ok';
          }
          else{
            $status = 'err';
          }

          //redirect ke halaman lain
          header('Location: matkul.php?status='.$status);
      }  
  }