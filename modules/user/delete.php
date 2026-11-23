
<?php
require_once __DIR__ . '/../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id_barang = $_POST['id_barang'] ?? '';

    if (!filter_var($id_barang, FILTER_VALIDATE_INT) || $id_barang <= 0) {
        echo "<p>ID barang tidak valid.</p>";
    } else {

        $id_barang = (int) $id_barang;

        $query = "DELETE FROM data_barang WHERE id_barang = ?";
        $stmt = mysqli_prepare($conn, $query);

        mysqli_stmt_bind_param($stmt, "i", $id_barang);

        if (mysqli_stmt_execute($stmt)) {

            if (mysqli_stmt_affected_rows($stmt) > 0) {
                echo "<p>Data barang berhasil dihapus.</p>";
            } else {
                echo "<p>Data barang tidak ditemukan.</p>";
            }

        } else {
            echo "<p>Gagal menghapus data barang.</p>";
        }

        mysqli_stmt_close($stmt);
    }

} else {
    echo "<p>Permintaan tidak valid.</p>";
}
?>

<br>
<a href="index.php?page=user/list">Kembali ke Data Barang</a>
