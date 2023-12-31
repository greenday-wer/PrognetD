<?php
/**
 * using mysqli_connect for database connection
 */
 
$databaseHost = 'prognet.localnet';
$databaseName = 'db_2205551025';
$databaseUsername = '2205551025';
$databasePassword = '2205551025';
 
$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
if (!$mysqli) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}

$username = "";
$email = "";
$password = "";
$address = "";
$date = "";
$gender = "Laki-Laki";
$programStudi = "";
$sukses = "";
$error = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if ($op == 'delete') {
    $ID_Nama = $_GET['ID_Nama'];
    $sql1 = "DELETE FROM Biodata WHERE ID_Nama = '$ID_Nama'";
    $q1 = mysqli_query($mysqli, $sql1);
    if ($q1) {
        $sukses = "Berhasil hapus data";
    } else {
        $error = "Gagal melakukan delete data: " . mysqli_error($mysqli);
    }
}

if ($op == 'edit') {
    $ID_Nama = $_GET['ID_Nama'];
    $sql1 = "SELECT * FROM Biodata WHERE ID_Nama = '$ID_Nama'";
    $q1 = mysqli_query($mysqli, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $username = $r1['Nama_Lengkap'];
    $email = $r1['Email'];
    $password = $r1['Passwordd'];
    $address = $r1['Alamat'];
    $date = $r1['Tanggal_Lahir'];
    $gender = $r1['Jenis_Kelamin'];
    $programStudi = $r1['Program_Studi'];

    if ($username == '') {
        $error = "Data tidak ditemukan";
    }
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $date = $_POST['date'];
    $gender = $_POST['gender'];
    $programStudi = $_POST['programStudi'];

    if ($username && $email && $password && $address && $date && $gender && $programStudi) {
        if ($op == 'edit') {
            $sql1 = "UPDATE Biodata SET Nama_Lengkap = '$username', Email = '$email', Passwordd = '$password', Alamat = '$address', Tanggal_Lahir = '$date', Jenis_Kelamin = '$gender', Program_Studi = '$programStudi' WHERE ID_Nama = '$ID_Nama'";
            $q1 = mysqli_query($mysqli, $sql1);
            if ($q1) {
                $sukses = "Data Berhasil Diupdate";
            } else {
                $error = "Gagal Diupdate: " . mysqli_error($mysqli);
            }
        } else {
            $sql1 = "INSERT INTO Biodata (Nama_Lengkap, Email, Passwordd, Alamat, Tanggal_Lahir, Jenis_Kelamin, Program_Studi) VALUES ('$username', '$email', '$password', '$address', '$date', '$gender', '$programStudi')";
            $q1 = mysqli_query($mysqli, $sql1);
            if ($q1) {
                $sukses = "Berhasil Memasukan Data";
            } else {
                $error = "Gagal Memasukan Data: " . mysqli_error($mysqli);
            }
        }
    } else {
        $error = "Silahkan Masukan Semua Data";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="form.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .mx-auto {
            width: 800px
        }

        .card {
            margin-top: 10px;
        }
    </style>
    <script src="jss.js"></script>
</head>
<body class="card">
    <div>
        <div class="card-header text-white bg-secondary">
            Data Biodata
        </div>
        <div class="card-body">
            <!-- Form untuk mengisi atau mengedit data -->
            <!-- Tampilkan pesan kesalahan atau sukses di sini -->
            <?php if ($error) : ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>
            <?php if ($sukses) : ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $sukses; ?>
                </div>
            <?php endif; ?>
            <!-- Tabel untuk menampilkan data Biodata -->
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Alamat</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Program Studi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql2 = "SELECT * FROM Biodata ORDER BY ID_Nama ASC";
                    $q2 = mysqli_query($mysqli, $sql2);
                    $urut = 1;
                    while ($r2 = mysqli_fetch_array($q2)) {
                        $ID_Nama = $r2['ID_Nama'];
                        $username = $r2['Nama_Lengkap'];
                        $email = $r2['Email'];
                        $password = $r2['Passwordd'];
                        $address = $r2['Alamat'];
                        $date = $r2['Tanggal_Lahir'];
                        $gender = $r2['Jenis_Kelamin'];
                        $programStudi = $r2['Program_Studi'];
                        ?>
                        <tr>
                            <th scope="row"><?php echo $urut++; ?></th>
                            <td><?php echo $username; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php echo $password; ?></td>
                            <td><?php echo $address; ?></td>
                            <td><?php echo $date; ?></td>
                            <td><?php echo $gender; ?></td>
                            <td><?php echo $programStudi; ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
