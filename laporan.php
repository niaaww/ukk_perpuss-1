<h1 class="mt-4">Laporan Peminjam Buku</h1>
<div class="card">
        <a href="cetak.php" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Cetak Data </a>
        <div class="card-body">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Buku</th>
                    <th>Ulasan</th>
                    <th>Rating</th>
                </tr>
                <?php
                $i =1;
                    $query = mysqli_query ($koneksi, "SELECT*FROM ulasan 
                    LEFT JOIN
                    buku on ulasan.id_buku = buku.id_buku
                    LEFT JOIN user on ulasan.id_user = user.id_user "
                    );
                    while($data = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $data['nama']; ?> </td>
                        <td><?php echo $data['judul_buku']; ?> </td>
                        <td><?php echo $data['ulasan']; ?> </td>
                        <td><?php echo $data['rating']; ?> </td>
                        </tr>
                        <?php
                    }
                ?>
            </table>
        </div>
    </div>
        </div>
</div>