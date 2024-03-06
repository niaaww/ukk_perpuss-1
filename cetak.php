<h2 align="center">LAPORAN PEMINJAMAN BUKU</h2>
<table border="1" cellspacing="0" cellpading="5" widht"100%">
                <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Buku </th>
                    <th>Tgl Peminjaman</th>
                    <th>Tgl Pengembalian</th>
                    <th>Status Peminjaman</th>
                </tr>
                <?php
                include "koneksi.php";
                $i =1;
                    $query = mysqli_query ($koneksi, "SELECT*FROM peminjam LEFT JOIN user on
                    user.id_user= peminjam.id_user LEFT JOIN buku on buku. id_buku = peminjam.id_buku");
                    while($data = mysqli_fetch_array($query)){
                        ?>
                        <tr>        
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $data['nama']; ?> </td>
                            <td><?php echo $data['judul_buku']; ?> </td>
                            <td><?php echo $data['tgl_peminjaman']; ?> </td>
                            <td><?php echo $data['tgl_pengembalian']; ?> </td>
                            <td><?php echo $data['status_peminjaman']; ?> </td>
                        </tr>
                        <?php
                    }
                        ?>
                        </table>
                <script>

                    window.print();

                    setTimeout(() => {
                    window.close();
                    }, 100);
                </script>