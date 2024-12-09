<?php
require_once 'Customer.php';
require_once 'CustomerManager.php';

$customerManager = new CustomerManager();

// Menangani penambahan customer baru
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $customerManager->tambahCustomer($nama, $email, $alamat);
    header('Location: viewCustomer.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Customer</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
<div class="container">
    <h1>Daftar Customer</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customerManager->getCustomer() as $customer): ?>
                <tr>
                    <td><?= htmlspecialchars($customer['id']); ?></td>
                    <td><?= htmlspecialchars($customer['nama']); ?></td>
                    <td><?= htmlspecialchars($customer['email']); ?></td>
                    <td><?= htmlspecialchars($customer['alamat']); ?></td>
                </tr>
            <?php endforeach; ?>    
        </tbody>
    </table>
    <div class="button-container">
        <a href="tambahCustomer.html" class="btn" style="background-color: #28a745;">+ Tambah Customer</a>
        <a href="home.html" class="btn" style="background-color: blueviolet;">Home</a>
    </div>
</div>
</body>
</html>