
<?php
require_once __DIR__ . '/../../config/database.php';

$query = "SELECT * FROM data_barang ORDER BY id_barang DESC";
$result = mysqli_query($conn, $query);
?>

<section class="content">
    <h2>Data Barang</h2>

    <a href="index.php?page=user/add" class="btn">
        Tambah Barang
    </a>

    <br><br>

    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Gambar</th>
            <th>Nama Barang</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

                // Menentukan gambar berdasarkan nama barang
                        if (stripos($row['nama'], 'OPPO') !== false) {
            $gambar = 'oppo_A3x_4_128_garansi_resmi.jpg';
        } elseif (stripos($row['nama'], 'Xiaomi') !== false) {
            $gambar = 'Xiaomi_Mi_12T_5G_Ram_8_Rom_256GB_Putih.jpg';
        } elseif (stripos($row['nama'], 'Samsung') !== false) {
            $gambar = 'Hp_Samsung_S25_Ram_12GB_Internal_256GB_Garansi_Resmi_Silver_Shadow.jpg';
        } else {
            $gambar = '';
        }
        ?>

        <tr>
            <td><?php echo $no++; ?></td>

            <td><?php echo htmlspecialchars($row['kategori']); ?></td>
            <td>
    <?php if ($gambar != '') { ?>
        <img src="<?= BASE_URL ?>assets/gambar/<?php echo $gambar; ?>"
     width="100" height="100"
     style="object-fit: contain;"
     alt="Gambar HP">
    <?php } else { ?>
        Tidak ada gambar
    <?php } ?>
</td>

            <td><?php echo htmlspecialchars($row['nama']); ?></td>

            <td><?php echo number_format($row['harga_beli']); ?></td>

            <td><?php echo number_format($row['harga_jual']); ?></td>

            <td><?php echo $row['stok']; ?></td>

            <td>
                <a href="index.php?page=user/edit&id=<?php echo $row['id_barang']; ?>"
                   class="btn-edit">Edit</a>

                <form method="POST"
                      action="index.php?page=user/delete"
                      onsubmit="return confirm('Yakin ingin menghapus data ini?');"
                      style="display:inline;">

                    <input type="hidden" name="id_barang"
                           value="<?php echo $row['id_barang']; ?>">

                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>

        <?php
            }
        } else {
        ?>

        <tr>
            <td colspan="8">Belum ada data barang.</td>
        </tr>

        <?php } ?>

    </table>
</section>
