<?php include('../header.php') ?>      

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Halaman Ubah Buku</h1>
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
              <?php
                $id = $_GET['id'];
                $sql = "SELECT * FROM book WHERE id = '$id'";
                $query = mysqli_query($connection, $sql);
                while ($data = mysqli_fetch_array($query)) :
              ?>
                <form action="../../controller/book/update.php" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="id" value="<?= $data['id'] ?>">
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" class="form-control" name="title" value="<?= $data['title'] ?>">
                    </div>
                    <div class="mb-2">
                        <img id="image-preview" src="../../public/image/book/<?= $data['image'] ?>" class="img-fluid">
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image" accept="image/*" onchange="previewImage()" style="height: 150px;">
                            <label class="custom-file-label" for="customFile"><?= $data['image'] ?></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Penulis</label>
                        <input type="text" class="form-control" name="author"  value="<?= $data['author'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Penerbit</label>
                        <select class="select2 form-control" name="id_publisher">
                        <?php 
                            $sql = "SELECT * FROM publisher";
                            $query = mysqli_query($connection, $sql);
                            while ($row = mysqli_fetch_array($query)) :
                        ?>
                            <option value="<?= $row['id'] ?>"
                            <?= $data['id_publisher'] == $row['id'] ? 'selected' : '' ?>
                            ><?= $row['name'] ?></option>
                        <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10">
                            <a href="./index.php" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
                            <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </div>
                </form>
              <?php endwhile ?>
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
