<?php
require_once 'controller/connection.php';
include 'controller/administrator-validation.php';

if (isset($_POST['delete'])) {
    $idDelete = $_GET['restore'];
    $query = mysqli_query($connection, "DELETE FROM gelombang WHERE id='$idDelete'");
    header("Location: ?pg=recycle-bin-data-gelombang&delete=success");
} else if (isset($_GET['delete-row'])) {
    $idDelete = $_GET['delete-row'];
    $query = mysqli_query($connection, "DELETE FROM gelombang WHERE id='$idDelete'");
    header("Location: ?pg=recycle-bin-data-gelombang&delete=success");
} else if (isset($_GET['delete-all'])) {
    $queryDeleteAll = mysqli_query($connection, "DELETE FROM gelombang WHERE deleted_at=1");
    header("Location:?pg=recycle-bin-data-gelombang&deleted=all=success");
} else if (isset($_GET['restore'])) {
    $idRestore = $_GET['restore'];
    $queryRestore = mysqli_query($connection, "SELECT * FROM gelombang WHERE id='$idRestore'");
    $rowRestore = mysqli_fetch_assoc($queryRestore);

    if (isset($_POST['restore'])) {
        $queryRestore = mysqli_query($connection, "UPDATE gelombang SET deleted_at=0 WHERE id='$idRestore'");
        header("Location:?pg=recycle-bin-data-gelombang&restore=success");
    }
} else if (isset($_GET['restore-row'])) {
    $idRestore = $_GET['restore-row'];
    $queryRestore = mysqli_query($connection, "UPDATE gelombang SET deleted_at=0 WHERE id='$idRestore'");
    header("Location:?pg=recycle-bin-data-gelombang&restore=success");
} else if (isset($_GET['restore-all'])) {
    $queryRestoreAll = mysqli_query($connection, "SELECT * FROM gelombang WHERE deleted_at=1");

    while ($rowRestoreAll = mysqli_fetch_assoc($queryRestoreAll)) {
        $IDRestoreAll = $rowRestoreAll['id'];
        $restoreAll = mysqli_query($connection, "UPDATE gelombang SET deleted_at=0 WHERE id='$IDRestoreAll'");
    }
    header("Location:?pg=recycle-bin-data-gelombang&restore=success");
}
?>

<div class="wrapper">
    <div class="card mt-3 me-3 ms-3">
        <div class="card-body">
            <h3 class="card-title">Restore Data Gelombang</h3>
            <form action="" method="post">
                <div class="row">
                    <div class="col-sm-6 mb-3">
                        <label for="nama_gelombang" class="form-label">Nama Gelombang</label>
                        <input type="text" class="form-control" id="nama_gelombang" name="nama_gelombang"
                            placeholder="Masukkan nama" value="<?= isset($_GET['restore']) ? $rowRestore['nama_gelombang'] : '' ?>"
                            required>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="nama_gelombang" class="form-label">Nama Gelombang</label>
                        <select name="aktif" class="form-control" id="">
                            <!-- <option value=""> -- status aktif -- </option> -->
                            <option value="0" <?php echo isset($_GET['restore']) && $rowRestore['aktif'] == 0 ? 'selected' : '' ?>>Tidak
                                Aktif</option>
                            <option value="1" <?php echo isset($_GET['restore']) && $rowRestore['aktif'] == 1 ? 'selected' : '' ?>>Aktif
                            </option>
                        </select>
                    </div>
                    <div class="mb-3 mt-1">
                        <button type="submit" class="btn" style="background-color: #00bf0d; color:white;" name="restore">
                            Restore
                        </button>
                        <button type="submit" class="btn" style="background-color: #f01202; color:white;" name="delete">
                            Delete
                        </button>
                    </div>
            </form>
        </div>
    </div>
</div>