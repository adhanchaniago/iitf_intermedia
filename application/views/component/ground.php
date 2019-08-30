        <!-- modal -->
        <div id="whatsapp" class="modal">
            <div class="modal-background"></div>
            <div class="modal-content">
                <!-- Any other Bulma elements you want -->
                <div class="card">
                    <div class="card-content">
                        <div class="media">
                            <!-- <div class="media-coantent"> -->
                                <p class="title is-4">
                                    Hubungi Kami
                                </p>
                            <!-- </div> -->
                        </div>

                    <div class="content">
                    Untuk informasi lebih lanjut, Anda dapat menghubungi:<br><br>
                    <table>
                        <tr><td>Erina Setyawati</td><td><a href="https://api.whatsapp.com/send?phone=6282211538043">0822-1153-8043</a></td><td><a href="tel:+6282211538043" class="button is-primary"><i class="fas fa-phone"></i></a></td></tr>
                        <tr><td>Tri Suci Desiana</td><td><a href="https://api.whatsapp.com/send?phone=6282328691559">0823-2869-1559</a></td><td><a href="tel:+6282328691559" class="button is-primary"><i class="fas fa-phone"></i></a></td></tr>
                    </table>
                    <span class="text">
                    Klik nomor diatas untuk menghubungi via WhatsApp, atau klik <a class="button is-primary is-small"><i class="fas fa-phone "></i></a> untuk memanggil/menyimpan kontak.
                    </span>
                    <br><br>
                    <p align="right">
                    <button
                        class="button k-button k-primary raised has-gradient slanted"
                        onclick="hideWhatsApp();"
                    >
                        <span class="text">
                        Tutup
                        </span>
                        <span class="front-gradient"></span>
                    </button>
                    </p>
                    </div>
                </div>
                </div>
            </div>
            <!-- <button class="modal-close is-large" aria-label="close"></button> -->
        </div>
        
        <script src="<?= base_url()?>assets/app/js/app.js"></script>
        <script type="text/javascript">
            var step = "<?= @$step; ?>";
            var ket  = "<?= @$keterangan; ?>"
        </script>
        <script src="<?= base_url()?>assets/app/js/warning.js"></script>
        <script src="<?= base_url()?>assets/app/js/step.js"></script>
        <!--script src="assets/js/particlesjs/particles.min.js"></script-->
        <script src="<?= base_url()?>assets/app/js/aos/aos.js"></script>
        <script src="<?= base_url()?>assets/app/js/timer.js"></script>
        <script src="<?= base_url()?>assets/app/js/timeline.js"></script>
        <script src="<?= base_url()?>assets/app/js/roadmap.js"></script>
        <script src="<?= base_url()?>assets/app/js/main.js" defer="defer"></script>        
        <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
        <script src="<?= base_url()?>assets/app/js/custom.js"></script>
    </body>  
</html>
