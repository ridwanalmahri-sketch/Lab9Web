<?php
// Alamat dasar aplikasi. Sesuaikan dengan nama folder project Anda.
const BASE_URL = '/Lab9Web/';

// ---------- Fungsi wajib Latihan 2 ----------
function formatRupiah(float $angka): string {
    return 'Rp ' . number_format($angka, 0, ',', '.');
}

function hitungDiskon(float $harga, float $persen = 10): float {
    return $harga * ($persen / 100);
}

function validasiEmail(string $email): bool {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function ringkasTeks(string $teks, int $batas = 50): string {
    if (mb_strlen($teks) <= $batas) {
        return $teks;
    }
    return mb_substr($teks, 0, $batas) . '...';
}

// ---------- Fungsi pendukung ----------
function e(?string $nilai): string {
    return htmlspecialchars((string) $nilai, ENT_QUOTES, 'UTF-8');
}

function url(string $page = '', array $params = []): string {
    $q = $page === '' ? [] : ['page' => $page];
    $q = array_merge($q, $params);
    return BASE_URL . 'index.php' . ($q ? '?' . http_build_query($q) : '');
}

function redirect(string $tujuan): void {
    header('Location: ' . $tujuan);
    exit;
}

// ---------- CSRF ----------
function csrf_token(): string {
    if (empty($_SESSION['csrf'])) {
        $_SESSION['csrf'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf'];
}

function csrf_check($token): bool {
    return isset($_SESSION['csrf'])
        && is_string($token)
        && hash_equals($_SESSION['csrf'], $token);
}

// ---------- Pesan sukses/gagal (tantangan mandiri) ----------
function set_flash(string $tipe, string $pesan): void {
    $_SESSION['flash'] = ['tipe' => $tipe, 'pesan' => $pesan];
}

function show_flash(): void {
    if (!empty($_SESSION['flash'])) {
        $f = $_SESSION['flash'];
        unset($_SESSION['flash']);
        echo '<div class="alert ' . e($f['tipe']) . '">' . e($f['pesan']) . '</div>';
    }
}

// ---------- Menu aktif (tantangan mandiri) ----------
function menuAktif(string $page, string $prefix): string {
    return str_starts_with($page, $prefix) ? 'active' : '';
}