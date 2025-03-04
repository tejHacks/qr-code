<?php
require 'vendor/autoload.php';

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['text'])) {
    $text = trim($_POST['text']);

    if (!empty($text)) {
        // Create QR code
        $qrCode = QrCode::create($text)
            ->setSize(300)
            ->setMargin(10);

        $writer = new PngWriter();
        $result = $writer->write($qrCode);

        // Encode QR code as base64
        $qrImage = base64_encode($result->getString());
    } else {
        $error = "Please enter valid text or URL.";
    }
} else {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generated QR Code</title>
    <link rel="stylesheet" href="assets/bootstrap-5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/boxicons/css/boxicons.min.css">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg p-4 text-center">
                    <h2 class="mb-4">Your QR Code</h2>
                    
                    <?php if (isset($qrImage)) : ?>
                        <img src="data:image/png;base64,<?= $qrImage ?>" alt="QR Code" class="img-fluid">
                        <p class="mt-3"><strong>Encoded Text:</strong> <?= htmlspecialchars($text) ?></p>
                        <a href="index.php" class="btn btn-primary mt-3"><i class="bx bx-arrow-back"></i> Generate Another</a>
                    <?php else : ?>
                        <p class="text-danger"><?= $error ?></p>
                        <a href="index.php" class="btn btn-danger mt-3"><i class="bx bx-arrow-back"></i> Try Again</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

<script src="assets/bootstrap-5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
