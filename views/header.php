
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi PHP Modular</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">
</head>
<body>
<div class="container">
    <header>
        <h1>Aplikasi PHP Modular</h1>
        <p>Praktikum Pemrograman Web</p>
    </header>
    <nav>
    <a href="<?= url('dashboard') ?>">Dashboard</a>
    <a href="<?= url('user/list') ?>">Data Barang</a>
    <a href="<?= url('user/add') ?>">Tambah Barang</a>
    <a href="<?= url('auth/login') ?>">Login</a>
    <a href="<?= url('auth/logout') ?>">Logout</a>
</nav>
    <main>