
<?php
require_once __DIR__ . '/../../config/database.php';

if (isset($_POST['submit'])) {
    $kategori = $_POST['kategori'];
    $nama = $_POST['nama'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];
    $stok = $_POST['stok'];

    $query = "INSERT INTO data_barang
              (kategori, nama, harga_beli, harga_jual, stok)
              VALUES
              ('$kategori', '$nama', '$harga_beli', '$harga_jual', '$stok')";

    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>
            alert('Data barang berhasil ditambahkan!');
            window.location='index.php?page=user/list';
        </script>";
    } else {
        echo "Gagal menambahkan data: " . mysqli_error($conn);
    }
}
?>

<section class="content">
    <h2>Tambah Barang</h2>

    <form method="POST">

        <label>Kategori</label><br>
        <input type="text" name="kategori" required>
        <br><br>

        <label>Nama Barang</label><br>
        <input type="text" name="nama" required>
        <br><br>

        <label>Harga Beli</label><br>
        <input type="number" name="harga_beli" required>
        <br><br>

        <label>Harga Jual</label><br>
        <input type="number" name="harga_jual" required>
        <br><br>

        <label>Stok</label><br>
        <input type="number" name="stok" required>
        <br><br>

        <button type="submit" name="submit" class="btn">
            Simpan
        </button>

        <a href="index.php?page=user/list">Kembali</a>

    </form>
</section>
