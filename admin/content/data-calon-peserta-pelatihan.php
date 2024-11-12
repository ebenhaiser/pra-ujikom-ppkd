<?php 
include 'controller/pic-jurusan-validation.php';
$idPicJurusan = $_SESSION['id'];
$queryPicJurusan = mysqli_query($connection, "SELECT * FROM users WHERE id='$idPicJurusan'");
$rowPicJurusan = mysqli_fetch_assoc($queryPicJurusan);
$idJurusan = $rowPicJurusan['id_jurusan'];

$queryDataPendaftar = mysqli_query($connection, "SELECT peserta_pelatihan.*, jurusan.nama_jurusan, gelombang.nama_gelombang FROM peserta_pelatihan LEFT JOIN jurusan ON peserta_pelatihan.id_jurusan=jurusan.id LEFT JOIN gelombang ON peserta_pelatihan.id_gelombang=gelombang.id WHERE peserta_pelatihan.deleted_at=0 AND peserta_pelatihan.id_jurusan='$idJurusan' ORDER BY  peserta_pelatihan.id_gelombang DESC, peserta_pelatihan.status ASC");

?>

<div class="wrapper">
  <div class="card mt-3 me-3 ms-3">
    <div class="card-body">
      <h3 class="card-title">Calon Peserta Pelatihan</h3>
      <div align="right" class="button-action">
        <!-- <a href="?pg=add-data-pendaftaran-pelatihanan-pelatihan" class="btn btn-primary">Tambah</a> -->
      </div>
      <table class="table table-bordered table-striped table-hover table-responsive mt-3">
        <thead>
          <tr>
            <th>#</th>
            <th>Status</th>
            <th>Jurusan</th>
            <th>Gelombang</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Nomor Telepon</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $no = 1;
          while($rowDataPendaftar = mysqli_fetch_assoc($queryDataPendaftar)) : ?>
          <tr>
            <td><?= $no++ ?></td>
            <?php switch($rowDataPendaftar['status']) {
              case 0:
                $status = 'Pending';
                break;
              case 1:
                $status = 'Wawancara';
                break;
              case 2:
                $status = 'Lolos';
                break;
              case 3:
                $status = 'Tidak Lolos';
                break;
            } ?>
            <td><?= $status ?></td>
            <td><?= isset($rowDataPendaftar['nama_jurusan']) ? $rowDataPendaftar['nama_jurusan'] : '-' ?></td>
            <td><?= isset($rowDataPendaftar['nama_gelombang']) ? $rowDataPendaftar['nama_gelombang'] : '-' ?></td>
            <td><?= isset($rowDataPendaftar['nama_lengkap']) ? $rowDataPendaftar['nama_lengkap'] : '-' ?></td>
            <td><?= isset($rowDataPendaftar['email']) ? $rowDataPendaftar['email'] : '-' ?></td>
            <td><?= isset($rowDataPendaftar['nomor_hp']) ? $rowDataPendaftar['nomor_hp'] : '-' ?></td>
            <td>
              <a href="?pg=add-data-calon-peserta-pelatihan&edit=<?php echo $rowDataPendaftar['id'] ?>">
                <button class="btn btn-light">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-search" viewBox="0 0 16 16">
                    <path
                      d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                  </svg>
                </button>
              </a>

              <?php if($rowDataPendaftar['status'] == 2) : ?>
              |
              <a href="https://wa.me/<?= $rowDataPendaftar['nomor_hp'] ?>?text=Halo,%20selamat%20anda%20lolos%20seleksei"
                target="_blank">
                <button class="btn btn-light">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-whatsapp" viewBox="0 0 16 16">
                    <path
                      d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232" />
                  </svg>
                </button>
              </a>
              <?php endif ?>
            </td>
          </tr>
          <?php endwhile; // End While ?>
        </tbody>
      </table>
    </div>
  </div>
</div>