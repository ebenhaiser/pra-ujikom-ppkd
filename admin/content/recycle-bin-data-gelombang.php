<?php 
$queryDataGelombang = mysqli_query($connection, "SELECT * FROM gelombang WHERE deleted_at=1 ORDER BY id ASC");
include 'controller/administrator-validation.php';
?>

<div class="wrapper">
  <div class="card mt-3 me-3 ms-3">
    <div class="card-body">
      <h3 class="card-title">Restore Data Gelombang</h3>
      <div align="right" class="button-action">
        <!-- <a href="?pg=add-data-gelombang" class="btn btn-primary">Tambah</a> -->
        <a onclick="return confirm ('Apakah anda yakin akan memulihkan semua data?')"
          href="?pg=restore-data-gelombang&restore-all=process">
          <button class="btn" style="background-color: #00bf0d; color:white;" >
            Restore All
          </button>
        </a>
        <a onclick="return confirm ('Apakah anda yakin akan menghapus semua data?')"
          href="?pg=restore-data-gelombang&delete-all=process">
          <button class="btn" style="background-color: #f01202; color:white;" >
            Delete All
          </button>
        </a>
      </div>
      <table class="table table-bordered table-striped table-hover table-responsive mt-3">
        <thead>
          <tr>
            <th>#</th>
            <th>Nama Gelombang</th>
            <th>Aktif</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $no = 1;
          while($rowDataGelombang = mysqli_fetch_assoc($queryDataGelombang)) : ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= isset($rowDataGelombang['nama_gelombang']) ? $rowDataGelombang['nama_gelombang'] : '-' ?></td>
            <?php 
            switch($rowDataGelombang['aktif']) {
              case 1:
                $aktif = 'Aktif';
                break;
              case 0:
                $aktif = 'Tidak Aktif';
                break;
              default:
                $aktif = '-';
                break;
            }
            ?>
            <td><?= isset($rowDataGelombang['aktif']) ? $aktif : '' ?></td>
            <td>
            <a href="?pg=restore-data-gelombang&restore=<?php echo $rowDataGelombang['id'] ?>">
                  <button class="btn btn-light">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                      <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                    </svg>
                  </button>
                </a>
                |
                <a onclick="return confirm ('Apakah anda yakin akan memulihkan data ini?')"
                  href="?pg=restore-data-gelombang&restore-row=<?php echo $rowDataGelombang['id'] ?>">
                  <button class="btn btn-light">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-recycle" viewBox="0 0 16 16">
                      <path d="M9.302 1.256a1.5 1.5 0 0 0-2.604 0l-1.704 2.98a.5.5 0 0 0 .869.497l1.703-2.981a.5.5 0 0 1 .868 0l2.54 4.444-1.256-.337a.5.5 0 1 0-.26.966l2.415.647a.5.5 0 0 0 .613-.353l.647-2.415a.5.5 0 1 0-.966-.259l-.333 1.242zM2.973 7.773l-1.255.337a.5.5 0 1 1-.26-.966l2.416-.647a.5.5 0 0 1 .612.353l.647 2.415a.5.5 0 0 1-.966.259l-.333-1.242-2.545 4.454a.5.5 0 0 0 .434.748H5a.5.5 0 0 1 0 1H1.723A1.5 1.5 0 0 1 .421 12.24zm10.89 1.463a.5.5 0 1 0-.868.496l1.716 3.004a.5.5 0 0 1-.434.748h-5.57l.647-.646a.5.5 0 1 0-.708-.707l-1.5 1.5a.5.5 0 0 0 0 .707l1.5 1.5a.5.5 0 1 0 .708-.707l-.647-.647h5.57a1.5 1.5 0 0 0 1.302-2.244z" />
                    </svg>
                  </button>
                </a>
                |
                <a onclick="return confirm ('Apakah anda yakin akan menghapus data ini?')"
                  href="?pg=restore-data-gelombang&delete-row=<?php echo $rowDataGelombang['id'] ?>">
                  <button class="btn btn-light">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash"
                      viewBox="0 0 16 16">
                      <path
                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                      <path
                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                    </svg>
                  </button>
                </a>
            </td>
          </tr>
          <?php endwhile; // End While ?>
        </tbody>
      </table>
    </div>
  </div>
</div>