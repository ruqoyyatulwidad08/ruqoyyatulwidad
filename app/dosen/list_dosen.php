<?php
require "../../config/config_database.php";
$db = koneksi (hostname, username, password, database);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>
<body>
    <?php
    $query = $db->query("select * from murid");
    ?>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIDN</th>
            <th>alamat</th>
            <th>Jenis kelamin</th>
        </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
                while($row = $query->fetch_array()){
                    ?>
                        <tr>
                            <td><?php echo $no++;?></td>
                            <td><?php echo $row['nama'];?></td>
                            <td><?php echo $row['tempat_lahir'];?></td>
                            <td><?php echo $row['tanggal_lahir'];?></td>
                            <td><?php echo $row['jenis_kelamin'];?></td>
                        </tr>
                        <?php
                }
            ?>
        </tbody>
    </table>
        <a class="btn btn-primary btn-sm" href="form.php">Tambah Data</a>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>