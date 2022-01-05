<?php include('../header.php') ?>      

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Halaman Pengelolaan Penerbit</h1>
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
            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Penerbit</h6>
            <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#addPublisherModal">
                <i class="fas fa-plus"></i> Tambah
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-publisher" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                      $i = 1;
                      $sql = "select * from publisher";
                      $query = mysqli_query($connection, $sql);
                      while ($row = mysqli_fetch_array($query)) :
                    ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['name'] ?></td>
                            <td>
                            <a class="btn btn-info" href="#" data-toggle="modal" data-target="#editPublisherModal"><i class="fas fa-pen"></i> Ubah</a>
                              <a href='../../controller/publisher/delete.php?id=<?= $row['id'] ?>' class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')"><i class="fas fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                    <?php $i++; endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addPublisherModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="../../controller/publisher/create.php" method="post">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Penerbit</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                      </button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Nama</label>
                      <input required type="text" class="form-control" name="name">
                    </div>
                  </div>
                  <div class="modal-footer">
                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                      <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
                  </div>
              </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="editPublisherModal" tabindex="-1" role="dialog" aria-labelledby="editMemberModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="../../controller/publisher/update.php" method="post">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit Penerbit</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                      </button>
                  </div>
                  <div class="modal-body">
                    <input type="hidden" name="id" id="input-edit-id">
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" id="input-edit-name" class="form-control" name="name">
                    </div>
                  </div>
                  <div class="modal-footer">
                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                      <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                  </div>
              </div>
            </form>
        </div>
    </div>

    <script>
      const tableData = document.querySelector(".table-publisher")

      if (tableData) {
        for (let i = 0; i < tableData.rows.length; i++) {
          tableData.rows[i].onclick = function() {
            getDataRow(this)
          }
        }
      }

      function getDataRow(tableRow) {
        // Get row data
        const id = tableRow.childNodes[3].innerHTML
        const name = tableRow.childNodes[5].innerHTML

        document.getElementById('input-edit-id').setAttribute("value", id)
        document.getElementById('input-edit-name').setAttribute("value", name)
      }
    </script>

</div>
<!-- /.container-fluid -->

<?php include('../footer.php') ?>
