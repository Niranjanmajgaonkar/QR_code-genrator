<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>QR Code Generator</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: #f5f7fa;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            background: #fff;
            padding: 40px 30px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 90%;
            max-width: 400px;
        }

        .container h2 {
            margin-bottom: 20px;
            color: #333;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            transition: 0.3s;
        }

        input[type="text"]:focus {
            border-color: #4a90e2;
            outline: none;
        }

        input[type="submit"] {
            padding: 12px 25px;
            background-color: #4a90e2;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            transition: 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #357abd;
        }

        .qr-output {
            margin-top: 30px;
        }

        .qr-output img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }

    </style>
</head>
<body>

<div class="container">
    <h2>QR Code Generator</h2>
    <form method="post">
        <input type="text" name="url" id="url" placeholder="Enter URL or Text" required>
        <input type="submit" name="submit" value="Generate QR Code">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        include 'phpqrcode/qrlib.php';
        $text = $_POST['url'];
        $path = 'images/';
        $file = $path . uniqid() . ".png";
        $ecc = 'L';
        $pixel_Size = 10;
        $frame_Size = 10;

        QRcode::png($text, $file, $ecc, $pixel_Size, $frame_Size);

        echo "<div class='qr-output'><img src='" . $file . "' alt='QR Code'></div>";
    }
    ?>
</div>

</body>
</html>
