<!DOCTYPE html>
<html>
<head>
    <title>Data Biodata</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            width: 80%;
            margin: 0 auto;
        }
        h1 {
            color: #333;
        }
        .data-item {
            margin: 10px 0;
            font-size: 18px;
        }
        .data-label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Biodata</h1>
    <div class="container">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<div class='data-item'><span class='data-label'>Nama Lengkap:</span> " . $_POST["username"] . "</div>";
            echo "<hr>"; // Tambah garis pemisah
            echo "<div class='data-item'><span class='data-label'>Email:</span> " . $_POST["email"] . "</div>";
            echo "<hr>";
            echo "<div class='data-item'><span class='data-label'>Password:</span> " . $_POST["password"] . "</div>";
            echo "<hr>";
            echo "<div class='data-item'><span class='data-label'>Alamat:</span> " . $_POST["address"] . "</div>";
            echo "<hr>";
            echo "<div class='data-item'><span class='data-label'>Tanggal Lahir:</span> " . $_POST["date"] . "</div>";
            echo "<hr>";
            echo "<div class='data-item'><span class='data-label'>Jenis Kelamin:</span> " . $_POST["gender"] . "</div>";
            echo "<hr>";
            echo "<div class='data-item'><span class='data-label'>Program Studi:</span> " . $_POST["programStudi"] . "</div>";
    }
    ?>
    </div>
</body>
</html>
