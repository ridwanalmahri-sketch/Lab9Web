
<?php
require_once __DIR__ . '/../../config/database.php';

if (!isset($_GET['id']) || !filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
    echo "ID barang tidak valid!";
    exit;
}

$id = (int) $_GET['id'];

$stmt = mysqli_prepare($conn, "SELECT * FROM data_barang WHERE id_barang = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    echo "Data barang tidak ditemukan!";
    exit;
}

if (isset($_POST['submit'])) {
    $kategori = $_POST['kategori'];
    $nama = $_POST['nama'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];
    $stok = $_POST['stok'];

    $stmt = mysqli_prepare($conn, "UPDATE data_barang SET
        kategori = ?,
        nama = ?,
        harga_beli = ?,
        harga_jual = ?,
        stok = ?
        WHERE id_barang = ?");

    mysqli_stmt_bind_param(
        $stmt,
        "ssddii",
        $kategori,
        $nama,
        $harga_beli,
        $harga_jual,
        $stok,
        $id
    );

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>
            alert('Data barang berhasil diubah!');
            window.location='index.php?page=user/list';
        </script>";
        exit;
    } else {
        echo "Gagal mengubah data!";
    }
}
?>

<section class="content">
    <h2>Edit Data Barang</h2>

    <form method="POST">

        <label>Kategori</label><br>
        <input type="text" name="kategori"
               value="<?php echo htmlspecialchars($data['kategori']); ?>"
               required>
        <br><br>

        <label>Nama Barang</label><br>
        <input type="text" name="nama"
               value="<?php echo htmlspecialchars($data['nama']); ?>"
               required>
        <br><br>

        <label>Harga Beli</label><br>
        <input type="number" name="harga_beli"
               value="<?php echo $data['harga_beli']; ?>"
               required>
        <br><br>

        <label>Harga Jual</label><br>
        <input type="number" name="harga_jual"
               value="<?php echo $data['harga_jual']; ?>"
               required>
        <br><br>

        <label>Stok</label><br>
        <input type="number" name="stok"
               value="<?php echo $data['stok']; ?>"
               required>
        <br><br>

        <button type="submit" name="submit">
            Simpan Perubahan
        </button>

        <a href="index.php?page=user/list">Kembali</a>

    </form>
</section>
