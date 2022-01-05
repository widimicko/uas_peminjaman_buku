<?php include('../header.php') ?>      

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Halaman Peminjaman Buku</h1>
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
            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Peminjaman</h6>
            <a class="btn btn-primary" href="./add.php">
                <i class="fas fa-plus"></i> Tambah
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-peminjaman" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th class="d-none">ID</th>
                            <th>Anggota</th>
                            <th>Buku</th>
                            <th>Penerbit</th>
                            <th>Sampul</th>
                            <th>Tanggal Pinjam</th>
                            <th>Jatuh Tempo</th>
                            <th>Tanggal Kembali</th>
                            <th>Denda</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                      $i = 1;
                      $sql = "SELECT peminjaman.id AS id, member.name AS member, book.title AS book, book.image AS image, publisher.name AS publisher, peminjaman.borrow_date AS borrow_date, peminjaman.return_date AS return_date, peminjaman.returned_date AS returned_date, peminjaman.charge AS charge FROM peminjaman INNER JOIN member ON member.id = peminjaman.id_member INNER JOIN book ON book.id = peminjaman.id_book INNER JOIN publisher ON publisher.id = book.id_publisher";
                      $query = mysqli_query($connection, $sql);
                      while ($row = mysqli_fetch_array($query)) :
                    ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td class="d-none"><?= $row['id'] ?></td>
                            <td><?= $row['member'] ?></td>
                            <td><?= $row['book'] ?></td>
                            <td><?= $row['publisher'] ?></td>
                            <td>
                                <img src="../../public/image/book/<?= $row['image'] ?>" alt="<?= $row['book'] ?>" class="img-fluid" style="height: 150px;"><br>
                                <?= $row['image'] ?>
                            </td>
                            <td><?= $row['borrow_date'] ?></td>
                            <td><?= $row['return_date'] ?></td>
                            <td><?= $row['returned_date'] ? $row['returned_date'] : '<span class="badge badge-warning">Belum Kembali</span>' ?></td>
                            <td>
                                <?php if (!$row['returned_date']) : ?>
                                    <span class="badge badge-light">Tidak ada denda</span>
                                <?php endif ?> 
                                <?php if ($row['returned_date']) : ?>
                                    <?php if ($row['charge']) : ?>
                                        <span class="badge badge-danger">Rp. <?= number_Format($row['charge'], 2, ",", ".") ?></span>
                                    <?php endif ?>
                                    <?php if (!$row['charge']) : ?>
                                        <span class="badge badge-success">Tidak didenda</span>
                                    <?php endif ?>
                                <?php endif ?> 
                            </td>
                            <td>
                                <?php if (!$row['returned_date']) : ?>
                                    <a class="btn btn-info" href="../../controller/peminjaman/returned.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin mengembalikan buku?')"><i class="fas fa-book"></i> kembalikan</a>
                                <?php endif ?> 
                                <?php if ($row['returned_date']) : ?>
                                    <a href='../../controller/peminjaman/delete.php?id=<?= $row['id'] ?>' class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')"><i class="fas fa-trash"></i> Hapus</a>
                                <?php endif ?> 
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
