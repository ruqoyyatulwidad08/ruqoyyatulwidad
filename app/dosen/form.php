<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <br>   <form action="controller.php" method="post">
        <div class="mb-3">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" name="nama" id="nama">
        </div>
        <div class="mb-3">
            <label for="NIDN">NIDN</label>
            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir">
        </div>
        <div class="mb-3">
            <label for="alamat">alamat</label>
            <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir">
        </div>
        <div class="mb-3">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin">
        </div>
        <div class="mb-3">
            <button class="btn btn-primary btn-sm"type="submit">
                Simpan
</button>

            <button class="btn btn-danger btn-sm float-end" onclick="history.back()">
               Kembali
               <a class ="btn btn-danger btn-sm float-start" href="list_murid.php"></a>
</button>

        </div>
    </form>
    </div>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    
</body>
</html>