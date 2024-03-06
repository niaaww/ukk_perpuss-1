<h1 class="mt-4">Peminjaman Buku</h1>
    <div class="card">
    <div class="card-body">
        <div class="row">
        <div class="col-md-12">
            <form method="post">
            <?php
            $id =$_GET['id'];
                    if (isset($_POST['submit'])) {
                    $id_buku = $_POST['id_buku'];
                    $id_user = $_SESSION['user']['id_user'];
                    $tgl_peminjaman = $_POST['tgl_peminjaman'];
                    $tgl_pengembalian = $_POST['tgl_pengembalian'];
                    $status_peminjaman = $_POST['status_peminjaman'];

                    $query = mysqli_query($koneksi, "UPDATE peminjam set id_buku='$id_buku',
                    tgl_peminjaman='$tgl_peminjaman', tgl_pengembalian='$tgl_pengembalian',
                    status_peminjaman='$status_peminjaman' WHERE id_peminjam=$id"); 

                        if($query) {
                            echo '<script>alert("Ubah Data Berhasil."); location.href="?page=peminjaman";</script>';
                        }else{
                            echo '<script>alert("Ubah Data Gagal."); </script>';
                        }
                     }
                     $query = mysqli_query($koneksi, "SELECT*FROM peminjam WHERE id_peminjam=$id");
                     $data = mysqli_fetch_array($query);
                ?>

                    <div class="row mb-3">
                    <div class="col-md-2">Buku</div>
                    <div class="col-md-8">
                            <select name="id_buku" class="form-control">
                        <?php
                            $buk =mysqli_query($koneksi, "SELECT*FROM buku");
                            while($buku = mysqli_fetch_array($buk)) {
                                ?>
                            <option <?php if ($data['id_buku'] == $buku ['id_buku']) echo 'selected';?>
                            value="<?php echo $buku['id_buku']; ?>"><?php echo $buku ['judul_buku']; ?></option>
                                <?php
                            }
                        ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-2">Tgl Peminjaman</div>
                        <div class="col-md-8">
                            <input type="date" class="form-control"value="<?php echo $data['tgl_peminjaman'];?>"
                            class="form-control"name="tgl_peminjaman">
                    </div>
                </div>

                <div class="row mb-3">
                        <div class="col-md-2">Tgl Pengembalian</div>
                        <div class="col-md-8">
                            <input type="date" class="form-control"value="<?php echo $data['tgl_pengembalian'];?>"
                            class="form-control" name="tgl_pengembalian">
                    </div>
                </div>
            <div class="row">
                <div class="col-md-2">Status Peminjaman</div>
                <div class="col-md-8">
                <select name="status_peminjaman" class="form-control">
                    <option value="dipinjam" <?php if($data['status_peminjaman'] == 'dipinjam')
                    echo 'selected';?>>Dipinjam</option>
                    <option value="dikembalikan" <?php if($data['status_peminjaman'] == 'dikembalikan')
                    echo 'selected';?>>Dikembalikan</option>
                </select>
                </div>
            </div>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-primary" name=submit value="submit">Simpan</button>
                                    <button type="reset" class="btn btn-secondary">Reset </button>
                                    <a href="?page=peminjam" class="btn btn-danger">Kembali</a>
                        </form>
                </div>
            </div>
            </form>
        </div>
        </div>
    </div>