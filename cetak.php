<!DOCTYPE html>
<html>
    <head>
        <title>PRINT LAPORAN PEMINJAMAN BUKU</title>
    </head>
    <body>


    <center>

        <h2>DATA LAPORAN PEMINJAMAN BUKU</h2>

    </center>

    <?php
    include 'koneksi.php';
    ?>

    <table border="1" style="width: 100">
    <th>width="1%">No</th>
    <th>User</th>
    <th>Buku</th>
    <th>Ulasan</th>
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

<script>
    window.print();
                </script>
    </body>
</html>