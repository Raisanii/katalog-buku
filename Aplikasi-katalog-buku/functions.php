<?php 
//connect to database

$conn = mysqli_connect("localhost", "root", "", "katalog_buku");

function query($query) {

    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;

    }
    return $rows;
}

function tambah($data){

    global $conn;
    $kode_buku   = htmlspecialchars($data["kode_buku"]);
    $judul_buku  = htmlspecialchars($data["judul_buku"]);
    $pengarang   = htmlspecialchars($data["pengarang"]);
    $harga       = htmlspecialchars($data["harga"]);
    
    //sampul
    $gambar = upload();
    if(!$gambar){
        return false;
    }

     //insert data
     $query = "INSERT INTO katalog
                VALUES
               ('$kode_buku', '$judul_buku', '$pengarang', $harga,'$gambar')
            ";
    //jalankan query
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
   
}

function upload(){
   
    $namaFile = $_FILES['gambar']['name'];
    $size = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    //cek upload
    if ($error === 4) {
        echo "<script>
                alert('Pilih sampul terlebih dahulu');
              </script>";
        return false;
    }

    //cek jenis upload
    $ekstensi = ['jpg', 'jpeg','png'];
    $ekstensi_sampul = explode('.', $namaFile);
    $ekstensi_sampul = strtolower(end($ekstensi_sampul));
    if ( !in_array($ekstensi_sampul, $ekstensi)) {
        echo "<script>
                alert('Silahkan masukan gambar yang benar');
              </script>";
        return false;
    }
    //cek size
    if ($size > 1000000) {
        echo "<script>
                alert('Ukuran gambar terlalu besar');
              </script>";
        return false;
    }

    //move file
    move_uploaded_file($tmpName, 'img/'.$namaFile);
    return $namaFile; 

}

?>