<?php include('../header.php') ?>      

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Halaman Tambah Peminjaman</h1>
    <?php
        if (isset($_SESSION['status'])) {
            if ($_SESSION['status'] == 'success') {
                echo '<div class="alert alert-success" role="alert">'.$_SESSION['message'].'</div>';
            } else if ($_SESSION['status'] == 'failed') {
                echo '<div class="alert alert-danger" role="alert">'.$_SESSION['message'].'</div>';
            }
        }
        session_destroy();
    ?>
     <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="w-75">
                <form action="../../controller/peminjaman/create.php" method="POST">
                    <div class="form-group">
                        <label>Anggota</label><br>
                        <select class="select2 form-control" name="id_member" required>
                        <?php 
                            $sql = "SELECT * FROM member";
                            $query = mysqli_query($connection, $sql);
                            while ($row = mysqli_fetch_array($query)) :
                        ?>
                            <option value="<?= $row['id'] ?>"
                            ><?= $row['name'] ?></option>
                        <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Buku</label><br>
                        <select class="select2 form-control" name="id_book" required>
                        <?php 
                            $sql = "SELECT * FROM book";
                            $query = mysqli_query($connection, $sql);
                            while ($row = mysqli_fetch_array($query)) :
                        ?>
                            <option value="<?= $row['id'] ?>"
                            ><?= $row['title'] ?></option>
                        <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal pinjam</label>
                        <p class="text-dark"><?= date('d M Y') ?></p>
                        <input type="hidden" class="form-control" name="borrow_date" value="<?= date('Y-m-d') ?>">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Kembali</label>
                        <p class="text-dark"><?= date('d M Y', strtotime(date('Y-m-d'). ' + 7 days')) ?></p>
                        <input type="hidden" class="form-control" name="return_date" value="<?= date('Y-m-d', strtotime(date('Y-m-d'). ' + 7 days')) ?>">
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10">
                            <a href="./index.php" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
                            <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function previewImage() {
            const image = document.querySelector('#image')
            const imagePreview = document.querySelector('#image-preview')
            const imageLabel = document.querySelector('.custom-file-label');

            imageLabel.textContent = image.files[0].name;

            const imageFile = new FileReader();
            imageFile.readAsDataURL(image.files[0])

            imageFile.onload = (e) => imagePreview.src = e.target.result
            }
    </script>

</div>
<!-- /.container-fluid -->

<?php include('../footer.php') ?>
