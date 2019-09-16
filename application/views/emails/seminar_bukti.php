<html>
<head>
    <title>Selamat, Anda Berhasil Menjadi Peserta Seminar UI/UX!</title>
</head>
<body>
    <h2>Dear <?= $nama; ?>,</h2>
    <p>Terimakasih telah menjadi Peserta Seminar UI/UX di Intermedia Information Technology Festival (IITF) 2019!<br>
    Berikut rincian pendaftaran Anda.</p><br>
    <table>
        <tr>
            <th>ID Pendaftaran:</th>
            <td><?= $id_daf; ?></td>
        </tr>
        <tr>
            <th>Nama Peserta:</th>
            <td><?= $nama; ?></td>
        </tr>
        <tr>
            <th>Alamat Peserta:</th>
            <td><?= $alamat; ?></td>
        </tr>
        <tr>
            <th>Email:</th>
            <td><?= $emailnya; ?></td>
        </tr>
        <tr>
            <th>Nomor HP/WA:</th>
            <td><?= $nohp; ?></td>
        </td>
        <tr>
            <th>Periode Daftar:</th>
            <td><?= strtoupper($htm); ?></td>
        </tr>
        <tr>
            <th>Jumlah Bayar:</th>
            <td><?= number_format($biaya, 0, ",", ".") ?>,-</td>
        </tr>
    </table>
    <p>Simpan email ini baik-baik dan tunjukkan email ini pada saat daftar ulang.</p><br>
    Mohon untuk tidak membalas karena email ini dikirimkan secara otomatis oleh sistem.
</body>
</html>