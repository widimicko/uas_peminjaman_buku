<?php include('../header.php') ?>      

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Halaman Pengelolaan Anggota</h1>
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
            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Anggota</h6>
            <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#addMemberModal">
                <i class="fas fa-plus"></i> Tambah
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-member" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th class="d-none">ID</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>Domisili</th>
                            <th>Tanggal Lahir</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                      $i = 1;
                      $sql = "select * from member";
                      $query = mysqli_query($connection, $sql);
                      while ($row = mysqli_fetch_array($query)) :
                    ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td class="d-none"><?= $row['id'] ?></td>
                            <td><?= $row['name'] ?></td>
                            <td><?= $row['id_number'] ?></td>
                            <td><?= $row['domicile'] ?></td>
                            <td><?= $row['datebirth'] ?></td>
                            <td>
                            <a class="btn btn-info" href="#" data-toggle="modal" data-target="#editMemberModal"><i class="fas fa-pen"></i> Ubah</a>
                              <a href='../../controller/member/delete.php?id=<?= $row['id'] ?>' class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')"><i class="fas fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                    <?php $i++; endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addMemberModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="../../controller/member/create.php" method="post">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Anggota</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                      </button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Nama</label>
                      <input required type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                      <label>NIK</label>
                      <input required type="number" class="form-control" name="id_number">
                    </div>
                    <div class="form-group">
                      <label>Domisili</label>
                      <input required type="text" class="form-control" name="domicile">
                    </div>
                    <div class="form-group">
                      <label>Tanggal lahir</label>
                      <input required type="date" class="form-control" name="datebirth">
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

    <div class="modal fade" id="editMemberModal" tabindex="-1" role="dialog" aria-labelledby="editMemberModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="../../controller/member/update.php" method="post">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit Anggota</h5>
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
                    <div class="form-group">
                      <label>NIK</label>
                      <input type="number" id="input-edit-id-number" class="form-control" name="id_number">
                    </div>
                    <div class="form-group">
                      <label>Domisili</label>
                      <input type="text" id="input-edit-domicile" class="form-control" name="domicile">
                    </div>
                    <div class="form-group">
                      <label>Tanggal lahir</label>
                      <input type="date" id="input-edit-datebirth" class="form-control" name="datebirth">
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
      const tableData = document.querySelector(".table-member")

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
        const id_number = tableRow.childNodes[7].innerHTML
        const domicile = tableRow.childNodes[9].innerHTML
        const datebirth = tableRow.childNodes[11].innerHTML

        document.getElementById('input-edit-id').setAttribute("value", id)
        document.getElementById('input-edit-name').setAttribute("value", name)
        document.getElementById('input-edit-id-number').setAttribute("value", id_number)
        document.getElementById('input-edit-domicile').setAttribute("value", domicile)
        document.getElementById('input-edit-datebirth').setAttribute("value", datebirth)
      }
    </script>

</div>
<!-- /.container-fluid -->

<?php include('../footer.php') ?>
