<h1 class="mt-4">Peminjaman</h1>
<div class="card">
        <a href="?page=peminjaman_tambah" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Peiminjam </a>
        <div class="card-body">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Buku</th>
                    <th>Tgl Peminjaman</th>
                    <th>Tgl Pengembalian</th>
                    <th>Status Peminjaman</th>
                    <th>Aksi</th>
                </tr>
                <?php
                $i =1;
                    $query = mysqli_query ($koneksi, "SELECT*FROM peminjam LEFT JOIN user on user.id_user 
                    = peminjam.id_user LEFT JOIN buku on buku.id_buku = peminjam.id_buku
                    WHERE peminjam.id_user=" . $_SESSION['user']['id_user']);
                    while($data = mysqli_fetch_array($query)){
                        ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $data['nama']; ?> </td>
                        <td><?php echo $data['judul_buku']; ?> </td>
                        <td><?php echo $data['tgl_peminjaman']; ?> </td>
                        <td><?php echo $data['tgl_pengembalian']; ?> </td>
                        <td><?php echo $data['status_peminjaman']; ?> </td>
                        <td>

                        <?php
                        if($data['status_peminjaman'] != 'dikembalikan'){
                            ?>
                        <a href="?page=peminjaman_ubah&&id=<?php echo $data['id_peminjam']; ?>" 
                        class="btn btn-info">Ubah</a>    
                            <a onclick="return confirm ('Apakah Anda Yakin Menghapus Data ini ??');"
                            href="?page=peminjaman_hapus&&id=<?php echo $data ['id_peminjam']; ?>" 
                            class="btn btn-danger">Hapus</a>
                        <?php
                    }
                
                ?>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
            </table>
        </div>
    </div>
        </div>
</div>