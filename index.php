<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Generator</title>
    <link rel="stylesheet" href="assets/bootstrap-5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/boxicons/css/boxicons.min.css">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg p-4">
                    <h2 class="text-center mb-4">QR Code Generator</h2>
                    <form action="generate.php" method="POST">
                        <div class="mb-3">
                            <label for="text" class="form-label">Enter Text or URL</label>
                            <input type="text" name="text" id="text" class="form-control" required placeholder="e.g., https://example.com">
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                <i class="bx bx-qr"></i> Generate QR Code
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<script src="assets/bootstrap-5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
