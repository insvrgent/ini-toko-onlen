    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pinjam Buku</title>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    </head>
    <body>
        <?php
            include "navbar.php";
            include "koneksi.php";
            $query_detail_buku = mysqli_query($koneksi, "SELECT * FROM buku where id_buku = '".$_GET['id_buku']."'");
            $data_buku = mysqli_fetch_array($query_detail_buku);
        ?>
        
        <main class="container">
        <section class="py-5 text-center container">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light"><?=$data_buku['nama_buku']?></h1>
            </div>
        </section>
        <script>
            window.onload = function() {
                let dollarUSLocale = Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(<?=$data_buku['harga']?>);
                document.getElementById("harga").innerHTML  = dollarUSLocale;
                document.getElementById("total").innerHTML  = dollarUSLocale;
            }
        </script>
        <div class="card mb-3" style="max-width: 100%;">
            <div class="row g-0">
                <div class="col-md-4">
                <img src="../petugas/foto/<?=$data_buku['foto']?>" class="img-fluid rounded-start" alt="...">
                
                
                </div>
                <div class="col-md-8">
                <div class="card-body">
                <form action="insert_cart.php?" method="POST">
                    <input type="hidden" name="id_buku" value="<?=$data_buku['id_buku']?>">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <td>Merek</td>
                                <td><?=$data_buku['pengarang']?></td>
                            </tr>
                            <tr>
                                <td>Deskripsi</td>
                                <td><?=$data_buku['deskripsi']?></td>
                            </tr>
                            <tr>
                                <td>Harga</td>
                                <td><label class="form-label" id="harga"></label><label class="form-label" >&nbsp;&nbsp;x&nbsp;&nbsp;</label><input type="number" name="jumlah_pinjam" min = "1" value="1" id="number" onChange="getInputValue(<?=$data_buku['harga']?>);"></td></tr>
                            <tr>
                                <script>
                                    function getInputValue(nilai){
                                        // Selecting the input element and get its value 
                                        var inputVal = document.getElementById("number").value;
                                        var output = inputVal * nilai;

                                        document.getElementById("total").innerHTML  = Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(output);
                                        
                                    }
                                </script>
                            </tr>
                                
                            <tr>
                                <td>Total</td>
                                <td><label class="form-label" id="total"></label></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="submit" class="btn btn-success" value="Beli"></td>
                            </tr>
                            <tr>
                                
                                <?php 
                                    $buku = mysqli_query($koneksi, "select * from petugas where id_petugas = '".$data_buku['id_petugas']."'");
                                    $data = mysqli_fetch_array($buku);
                                ?>
                                <td><?= $data['nama_petugas']?></td>
                                
                            </tr>
                        </thead>
                    </table>
                </form>
                </div>
                </div>
            </div>
        </div>

        </main>
        <?php
            include "footer.php";
        ?>
    </body>
    </html>