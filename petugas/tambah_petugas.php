<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Siswa</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
<nav class="navbar navbar-dark bg-dark shadow-sm navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">ini toko onlen</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
      data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
      aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </nav>
    <br></br>
    <div class="container">
        <div class="row content">
            <div class="col-md-6">
               <h3 class="mb-2 text-center">Tambah Siswa</h3>
                <form action="proses_tambah_petugas.php" method="POST">
                    <div class="row g-3 mb-2"> 
                        <!-- nama -->
                        <div class="col-md">
                            <label class="form-label">Nama Petugas :</label>
                            <input type="text" name="nama_petugas" value="" placeholder="Masukkan Nama" class="form-control form" required>
                        </div>
                    </div>
                    <div class="row g-3 mb-2">
                        <div class="col-md">
                            <label class="form-label">Saldo :</label>
                            <input type="text" name="saldo" value="" placeholder="Masukkan saldo" class="form-control form" required>
                        </div>
                    </div>
                    <div class="row g-3 mb-4">
                        <!-- username -->
                        <div class="col-md">
                            <label class="form-label"> Username :</label>
                            <input type = "text" name = "username" value = "" placeholder="Masukkan Username" class = "form-control form" required>
                        </div>
                        <!-- password -->
                        <div class="col-md">
                            <label class="form-label">Password :</label>
                            <input type = "password" name ="password" value ="" placeholder="Masukkan Password" class = "form-control form" required>
                        </div>
                    </div>
                    <input type = "submit" name ="simpan" value ="Tambah Petugas" class = "btn">
                </form> 
            </div>
            
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>