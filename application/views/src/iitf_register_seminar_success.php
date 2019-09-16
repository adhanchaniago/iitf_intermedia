<!-- modal -->
<div id="suksesseminar" class="modal is-active">
    <div class="modal-background"></div>
    <div class="modal-content">
        <!-- Any other Bulma elements you want -->
        <div class="card">
            <div class="card-content">
                <div class="media">
                    <!-- <div class="media-coantent"> -->
                        <p class="title is-4">
                            Selesai!
                        </p>
                    <!-- </div> -->
                </div>

                <div class="content">
                    <?php if ($htm != "OTS") {?>
                        Simpan kode berikut untuk digunakan saat melakukan pendaftaran ulang Seminar UI/UX.
                        <center><h3><code><?= $code; ?></code></h3></center>
                        Lakukan pembayaran HTM <?= $htm; ?> sebesar Rp<?= number_format($biaya, 0, ",", ".") ?>,- ke:<br>
                        <ol>
                            <li>Stand IITF 2019, Lantai 1 Universitas AMIKOM Purwokerto (Jalan Letjend. Pol. Soemarto (Depan SPN) Purwokerto Utara), atau</li>
                            <li>Transfer ke rekening 002-BRI Nomor Rekening <b>0077-01-100172-50-8</b> a.n. <b>Rahmat Hidayat Fitrianto</b></li>
                        </ol>
                        
                        Lalu, konfirmasi ke salah satu nomor berikut terkait pembayaran dan berikan kode pendaftaran dan bukti pembayarannya:
                        <table>
                            <tr>
                                <td>Erina Setyawati</td>
                                <td>
                                    <a href="https://api.whatsapp.com/send?phone=6282211538043">0822-1153-8043</a>
                                </td>
                                <td>
                                    <a href="tel:+6282211538043" class="button is-primary is-small"><i class="fas fa-phone"></i></a>
                                    <a href="https://api.whatsapp.com/send?phone=6282211538043" class="button is-primary is-small"><i class="fab fa-whatsapp"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Tri Suci Desiana</td>
                                <td>
                                    <a href="https://api.whatsapp.com/send?phone=6282328691559">0823-2869-1559</a>
                                </td>
                                <td>
                                    <a href="tel:+6282328691559" class="button is-primary is-small"><i class="fas fa-phone"></i></a>
                                    <a href="https://api.whatsapp.com/send?phone=6282328691559" class="button is-primary is-small"><i class="fab fa-whatsapp"></i></a>
                                </td>
                            </tr>
                        </table>
                        <b>CATATAN:</b><br>Kami telah mengirimkan Kode Pendaftaran ke email yang Anda berikan. Silakan periksa inbox pada email Anda. Apabila tidak ada pesan baru, periksalah di kotak spam.<br>
                        <p align="right">
                            <a class="button k-button k-primary raised has-gradient slanted" href="<?= base_url(); ?>">
                                <span class="text">
                                    Oke
                                </span>
                                <span class="front-gradient"></span>
                            </a>
                        </p>
                    <?php } else { ?>
                        Selamat! Kini Anda dapat mengikuti acara Seminar UI/UX di Pendopo Sipanji Purwokerto.<br>
                        Karena Anda mendafar pada masa On The Spot, Anda perlu membayar biaya masuk (HTM) sebesar Rp<?= number_format($biaya, 0, ",", ".") ?>,- langsung ke panitia pendaftaran (Divisi IP).
                        <p align="right">
                            <a class="button k-button k-primary raised has-gradient slanted" href="<?= base_url(); ?>">
                                <span class="text">
                                    Oke
                                </span>
                                <span class="front-gradient"></span>
                            </a>
                        </p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <button class="modal-close is-large" aria-label="close">x</button>
</div>