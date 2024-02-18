<?php

session_start();

//Bikin Koneksi
$c = mysqli_connect('localhost','root','','kasirbaru');



if(isset($_POST['tambahbarang'])){
    $namaproduk = $_POST['namaproduk'];
    $deskripsi = $_POST['deskripsi'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];

   $insert = mysqli_query($c,"insert into produk (namaproduk,deskripsi,harga,stok) values('$namaproduk','$deskripsi',
   '$harga','$stok')");

    if($insert){
        header('location:stock.php');
    } else {
        echo '
        <script>alert("Gagal Menambah Barang Baru");
        window.locatio.href="stock.php"
        </script>
        ';
    }
}

if(isset($_POST['tambahpelanggan'])){
    $namapelanggan = $_POST['namapelanggan'];
    $notelp = $_POST['notelp'];
    $alamat = $_POST['alamat'];

   $insert = mysqli_query($c,"insert into pelanggan (namapelanggan,notelp,alamat) values('$namapelanggan','$notelp',
   '$alamat')");

    if($insert){
        header('location:pelanggan.php');
    } else {
        echo '
        <script>alert("Gagal Menambah Pelanggan Baru");
        window.locatio.href="pelanggan.php"
        </script>
        ';
    }
}


//edit barang
if(isset($_POST['editbarang'])){
    $np = $_POST['namaproduk'];
    $desc = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $idp = $_POST['idp']; //idproduk

    $query = mysqli_query($c,"update produk set namaproduk='$np', deskripsi='$desc', harga='$harga' where idproduk='$idp' ");

    if($query){
        header('location:stock.php');
    } else {
        echo '
        <script>alert("Gagal");
        window.location.href="stock.php"
        </script>
        ';
    }
}
    //hapus 
    if(isset($_POST['hapusbarang'])){
        $idp = $_POST['idp'];

        $query = mysqli_query($c,"delete from produk where idproduk='$idp'");
        if($query){
            header('location:stock.php');
        } else {
            echo '
            <script>alert("Gagal");
            window.location.href="stock.php"
            </script>
            ';
        }     
    }


?>