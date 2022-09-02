<?= $this->extend('template/frontend/index'); ?>
<?= $this->section('content'); ?>
<!-- Google Maps section -->
<div class="section">
    <div class="container">
        <div class="margin-bottom-70">
            <div class="row text-center">
                <div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                    <h2>Kontak</h2>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. </p>
                </div>
            </div>
        </div>
        <iframe class="gmap gmap-lg" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31680.835858448936!2d108.46228477823074!3d-6.996975380256!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f15b56610a65d%3A0x36fc4ed5dfaa4c27!2sKantor%20Kepala%20Desa%20Cibinuang!5e0!3m2!1sid!2sid!4v1662072444117!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div><!-- end container -->
</div>
<!-- end Google Maps section -->

<!-- Contact Info section -->
<div class="section padding-top-0">
    <div class="container">
        <div class="row text-center icon-5xl">
            <div class="col-12 col-sm-6 col-md-4">
                <i class="bi bi-envelope text-dark margin-bottom-20"></i>
                <h6 class="fw-normal margin-0">Email</h6>
                <p>contact@email.com</p>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <i class="bi bi-telephone text-dark margin-bottom-20"></i>
                <h6 class="fw-normal margin-0">Telepon</h6>
                <p>+(987) 654 321 01</p>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <i class="bi bi-pin-map text-dark margin-bottom-20"></i>
                <h6 class="fw-normal margin-0">Alamat</h6>
                <p>Jalan Siliwangi No.88 Kuningan, Kode Pos: 45511</p>
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</div>
<!-- end Contact Info section -->
<?= $this->endSection(); ?>