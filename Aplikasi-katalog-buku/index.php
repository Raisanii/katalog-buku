<?php 
//koneksi database
require "functions.php";

//query
$buku = query("SELECT * FROM katalog");

if (isset($_POST["kirim"])) {

    
    if(tambah($_POST) > 0){
        echo "
            <script>   
                alert('data berhasil ditambahkan :)');
                document.location.href = 'index.php';
            </script>
        ";
    } else{
        echo "data gagal ditambahkan :(";
    }

}


// for ($i=1; $i<1000 ; $i++) { 
//     if ($i < 10 ) {
//         echo "B00" .$i ."<br>";
//     } elseif ($i < 100) {
//         echo "B0" .$i ."<br>";
//     } elseif ($i > 99 ) {
//         echo "B" .$i ."<br>";
//     }
// }

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>Katalog Buku</title>
    <style>
        .col{
            border-radius: 0.75rem;
            border: 1px grey;
            margin: 1rem;
            padding: 0.5rem;
            box-shadow: 0 0 4px 4px #f5f5f0;
        }
        .subjudul{
            margin-top: 1rem;
        }
        .col2{
            padding: 0;
            text-align: center;
        }
        .col3{
            padding-top: 1rem;
        }
        .col4{
            margin-top: -0.5rem;
        }
        .col5{
            padding-top:0.5rem;
        }
        .poster{
            padding:0;
        }
        .display-6{
            font-size: 1.5rem;
            font-weight: bold;
        }
    </style>
  </head>
  <body>

    <!-- container -->
    <div class="container">
        <!-- Navbar -->
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                <img src="img/logo.png" alt="" width="35" height="29" class="d-inline-block align-text-top">
                   <b>Books Store</b> 
                </a>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Tambah Buku</button>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Form tambah buku</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <!-- form -->
                        <form action="" method="POST" enctype="multipart/form-data">
                                <div class="mb-2">
                                    <label for="kode_buku" class="form-label">Kode Buku</label>
                                    <input type="text" class="form-control" id="kode_buku" name="kode_buku" placeholder="Masukan kode buku">
                                </div>
                                <div class="mb-2">
                                    <label for="judul_buku" class="form-label">Judul Buku</label>
                                    <input type="text" class="form-control" id="judul_buku" name="judul_buku" placeholder="Masukan Judul Buku">
                                </div>
                                <div class="mb-2">
                                    <label for="pengarang" class="form-label">Pengarang</label>
                                    <input type="text" class="form-control" id="pengarang" name="pengarang" placeholder="Masukan Nama Pengarang">
                                </div>
                                <div class="mb-2">
                                    <label for="harga" class="form-label">Harga Buku</label>
                                    <input type="text" class="form-control" id="harga" name="harga" placeholder="Masukan Harga Buku">
                                </div>
                                <div class="mb-2">
                                    <label for="Sampul_buku" class="form-label">Sampul Buku</label>
                                    <input type="file" class="form-control" name="gambar" id="Sampul buku">
                                </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="kirim">Selesai</button>
                        </div>
                        </form>
                            <!-- end form -->
                        </div>
                    </div>
                </div>
                <!-- end modal -->

            </div>
        </nav>
        <!-- end navbar -->

        <h3 class="subjudul">Katalog Buku</h3>  
        <!-- row-katalog -->   
        <div class="row">
            <!-- looping column -->
            <?php foreach( $buku as $row ) : ?>
                <div class="col">
                    <div class="col2">
                        <img class="poster" src="img/<?= $row["gambar"];?>" alt="" width="150rem">
                    </div>
                    <div class="col3">
                        <h6><?= $row["judul_buku"];?></h6>
                    </div>
                    <div class="col4">
                        <small class="text-muted"><?= $row["pengarang"];?></small>
                    </div>
                    <div class="col5">
                        <h5>Rp.<?= $row["harga"];?></h5>
                    </div>
                </div>
                <?php endforeach; ?> 
            <!-- end looping column -->   
        </div>
        <!-- end row katalog -->
    </div>
    <!-- end container -->



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
  </body>
</html>