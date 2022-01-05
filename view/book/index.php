<?php include('../header.php') ?>      

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Halaman Pengelolaan Buku</h1>
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
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Buku</h6>
            <a class="btn btn-primary" href="./add.php">
                <i class="fas fa-plus"></i> Tambah
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Sampul</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                      $i = 1;
                      $sql = "SELECT book.id AS id, book.title AS title, book.image AS image, book.author AS author, publisher.name AS publisher FROM book INNER JOIN publisher ON publisher.id = book.id_publisher";
                      $query = mysqli_query($connection, $sql);
                      while ($row = mysqli_fetch_array($query)) :
                    ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $row['title'] ?></td>
                            <td>
                                <img src="../../public/image/book/<?= $row['image'] ?>" alt="<?= $row['title'] ?>" class="img-fluid" style="height: 150px;"><br>
                                <?= $row['image'] ?>
                            </td>
                            <td><?= $row['author'] ?></td>
                            <td><?= $row['publisher'] ?></td>
                            <td>
                                <a class="btn btn-info" href="./edit.php?id=<?= $row['id'] ?>"><i class="fas fa-pen"></i> Ubah</a>
                                <a href='../../controller/book/delete.php?id=<?= $row['id'] ?>' class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')"><i class="fas fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                    <?php $i++; endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php include('../footer.php') ?>
