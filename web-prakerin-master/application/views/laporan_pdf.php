<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-spacing: 25px;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <th>No.</th>
            <th>Nama Siswa</th>
            <th>Tanggal</th>
            <th style="margin-left: 10px;">Jam</th>
            <th>Nama Perusahaan</th>
        </tr>

        <?php $no = 1;
        foreach ($cetak as $a) : ?>

            <tr">
                <td style="text-align: center;"><?= $no++ ?></td>
                <td><?= $a->siswa; ?></td>
                <td><?= $a->tanggal; ?></td>
                <td style="text-align: center;"><?= $a->jam; ?></td>
                <td><?= $a->perusahaan; ?></td>

                </tr>
            <?php endforeach; ?>
    </table>

</body>

</html>