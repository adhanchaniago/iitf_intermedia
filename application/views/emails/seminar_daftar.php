<html>
<head>
    <title>Lakukan Pembayaran agar Anda dapat hadir pada acara Seminar UI/UX IITF 2019</title>
</head>
<body>
    <h2>Dear <?= $nama; ?>,</h2>
    <p>Terimakasih telah mendaftar pada acara Seminar UI/UX IITF 2019. Namun, Anda belum bisa melakukan daftar ulang saat acara nanti dimulai. Untuk itu, silakan lakukan pembayaran HTM <?= $htm; ?> sebesar Rp<?= number_format($biaya, 0, ",", ".") ?>,- ke:<br>
    <ol>
        <li>Stand IITF 2019, Lantai 1 Universitas AMIKOM Purwokerto (Jalan Letjend. Pol. Soemarto (Depan SPN) Purwokerto Utara), atau</li>
        <li>Transfer ke rekening 002-BRI Nomor Rekening <b>0077-01-100172-50-8</b> a.n. <b>Rahmat Hidayat Fitrianto</b></li>
    </ol>
    <p>Kode Pendaftaran Anda:</p>
    <h1><b><code><?= $id_daf; ?></code></b></h1>
    
    <p>Lalu, konfirmasi ke salah satu nomor berikut terkait pembayaran dan berikan kode pendaftaran dan bukti pembayarannya:</p>
    
    <table>
        <tr><td>Erina Setyawati: </td><td><a href="https://api.whatsapp.com/send?phone=6282211538043">0822-1153-8043</a></td></tr>
        <tr><td>Tri Suci Desiana: </td><td><a href="https://api.whatsapp.com/send?phone=6282328691559">0823-2869-1559</a></td></tr>
    </table><br>
    Terimakasih.<br>
    Mohon untuk tidak membalas karena email ini dikirimkan secara otomatis oleh sistem.
</body>
</html>