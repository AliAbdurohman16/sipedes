<?= $this->extend('template/frontend/index'); ?>
<?= $this->section('content'); ?>
<!-- Hero section -->
<div class="section-xl bg-image" data-bg-src="<?= base_url() ?>/assets/frontend/images/background.jpg" id="beranda">
    <div class="bg-black-02">
        <div class="container">
            <div class="row g-4">
                <div class="col-12 col-md-10 col-lg-8 col-xl-6">
                    <h1 class="fw-normal margin-bottom-20">Sistem Pengajuan Desa</h1>
                    <p>Sistem Pengajuan Desa di Desa Cibinuang ini merupakan sistem pengajuan digital. Apabila masyarakat ingin mengajukan pembuatan surat yang diperlukan maka masyarakat tersebut bisa langsung mengajukannya pada sistem ini agar meminimalisir ke antrian pada kantor desa.</p>
                    <a class="button button-lg button-radius button-white-3 margin-top-40" href="#buat-surat">Buat Surat</a>
                    <a class="button button-lg button-radius button-white-3 margin-top-40" href="#tutorial">Tutorial</a>
                </div>
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end bg-dark-* -->
</div>

<!-- Buat surat section -->
<div class="section" id="buat-surat">
    <div class="container text-start text-lg-center">
        <div class="row text-center">
            <div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
                <h3 class="fw-normal">Surat Yang Tersedia Di Layanan Ini</h3>
                <p>Pilih surat yang anda ingin ajukan</p>
            </div>
        </div><!-- end row(1) -->
        <div class="row icon-5xl g-4 margin-top-30">
            <div class="col-12 col-lg-3">
                <div class="border-all padding-40">
                    <i class="bi bi-briefcase text-dark"></i>
                    <h6 class="fw-normal margin-top-10">Surat Keterangan Nama</h6>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                    <a class="button button-sm button-radius button-dark margin-top-40" href="<?= base_url() ?>/user/dashboard">Buat Surat</a>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="border-all padding-40">
                    <i class="bi bi-geo-alt text-dark"></i>
                    <h6 class="fw-normal margin-top-10">Surat Keterangan Domisili</h6>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                    <a class="button button-sm button-radius button-dark margin-top-40" href="<?= base_url() ?>/user/dashboard">Buat Surat</a>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="border-all padding-40">
                    <i class="bi bi-suit-heart text-dark"></i>
                    <h6 class="fw-normal margin-top-10">Surat Keterangan Belum Nikah</h6>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                    <a class="button button-sm button-radius button-dark margin-top-40" href="<?= base_url() ?>/user/dashboard">Buat Surat</a>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="border-all padding-40">
                    <i class="bi bi-person-plus text-dark"></i>
                    <h6 class="fw-normal margin-top-10">Surat Keterangan Lahir</h6>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                    <a class="button button-sm button-radius button-dark margin-top-40" href="<?= base_url() ?>/user/dashboard">Buat Surat</a>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="border-all padding-40">
                    <i class="bi bi-cash text-dark"></i>
                    <h6 class="fw-normal margin-top-10">Surat Keterangan Penghasilan</h6>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                    <a class="button button-sm button-radius button-dark margin-top-40" href="<?= base_url() ?>/user/dashboard">Buat Surat</a>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="border-all padding-40">
                    <i class="bi bi-bookmark-dash text-dark"></i>
                    <h6 class="fw-normal margin-top-10">Surat Keterangan Pindah KK</h6>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                    <a class="button button-sm button-radius button-dark margin-top-40" href="<?= base_url() ?>/user/dashboard">Buat Surat</a>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="border-all padding-40">
                    <i class="bi bi-people text-dark"></i>
                    <h6 class="fw-normal margin-top-10">Surat Keterangan Rame-rame</h6>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                    <a class="button button-sm button-radius button-dark margin-top-40" href="<?= base_url() ?>/user/dashboard">Buat Surat</a>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="border-all padding-40">
                    <i class="bi bi-basket text-dark"></i>
                    <h6 class="fw-normal margin-top-10">Surat Keterangan Usaha</h6>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                    <a class="button button-sm button-radius button-dark margin-top-40" href="<?= base_url() ?>/user/dashboard">Buat Surat</a>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="border-all padding-40">
                    <i class="bi bi-caret-down-square text-dark"></i>
                    <h6 class="fw-normal margin-top-10">Surat Keterangan Tidak Mampu</h6>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                    <a class="button button-sm button-radius button-dark margin-top-40" href="<?= base_url() ?>/user/dashboard">Buat Surat</a>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="border-all padding-40">
                    <i class="bi bi-shield-check text-dark"></i>
                    <h6 class="fw-normal margin-top-10">Surat Keterangan Catatan Kepolisian</h6>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                    <a class="button button-sm button-radius button-dark margin-top-40" href="<?= base_url() ?>/user/dashboard">Buat Surat</a>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="border-all padding-40">
                    <i class="bi bi-person-dash text-dark"></i>
                    <h6 class="fw-normal margin-top-10">Surat Keterangan Kematian</h6>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                    <a class="button button-sm button-radius button-dark margin-top-40" href="<?= base_url() ?>/user/dashboard">Buat Surat</a>
                </div>
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</div>
<!-- end Buat surat section -->

<!-- FAQ section -->
<div class="section border-top" id="faq">
    <div class="container">
        <div class="row text-center">
            <div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
                <h3 class="fw-normal">F.A.Q</h3>
                <p>Pertanyaan Paling Sering Tentang SIPEDES</p>
            </div>
        </div><!-- end row(1) -->
        <div class="row g-5 margin-top-30">
            <div class="col-12 col-lg-6 order-lg-2">
                <ul class="accordion single-open style-1 border-radius">
                    <!-- Accordion item 1 -->
                    <li class="active">
                        <div class="accordion-title">
                            <h6 class="fw-medium font-small uppercase">Apa itu SIPEDES?</h6>
                        </div>
                        <div class="accordion-content">
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                        </div>
                    </li>
                    <!-- Accordion item 2 -->
                    <li>
                        <div class="accordion-title">
                            <h6 class="fw-medium font-small uppercase">Bagaimana Cara Kerja SIPEDES?</h6>
                        </div>
                        <div class="accordion-content">
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                        </div>
                    </li>
                    <!-- Accordion item 3 -->
                    <li>
                        <div class="accordion-title">
                            <h6 class="fw-medium font-small uppercase">Apakah SIPEDES di buat untuk Umum?</h6>
                        </div>
                        <div class="accordion-content">
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                        </div>
                    </li>
                    <!-- Accordion item 4 -->
                    <li>
                        <div class="accordion-title">
                            <h6 class="fw-medium font-small uppercase">Apakah SIPEDES berbayar?</h6>
                        </div>
                        <div class="accordion-content">
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-12 col-lg-6 order-lg-1">
                <img class="border-radius-025" src="<?= base_url() ?>/assets/frontend/images/col-1.jpg" alt="">
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</div>
<!-- end FAQ section -->

<!-- Syarat section -->
<div class="section border-top" id="syarat">
    <div class="container">
        <div class="margin-bottom-70">
            <div class="row g-4">
                <div class="col-12 col-md-10 col-lg-8 col-xl-7">
                    <h3 class="fw-light">Syarat Dan Ketentuan :</h3>
                </div>
            </div><!-- end row -->
        </div>
        <div class="row g-4">
            <!-- Service box 1 -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="feature-box dark">
                    <div class="feature-box-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h5 class="fw-normal">Service title</h5>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                </div>
            </div>
            <!-- Service box 2 -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="feature-box dark">
                    <div class="feature-box-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h5 class="fw-normal">Service title</h5>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                </div>
            </div>
            <!-- Service box 3 -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="feature-box dark">
                    <div class="feature-box-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h5 class="fw-normal">Service title</h5>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                </div>
            </div>
            <!-- Service box 4 -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="feature-box dark">
                    <div class="feature-box-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h5 class="fw-normal">Service title</h5>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                </div>
            </div>
            <!-- Service box 5 -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="feature-box dark">
                    <div class="feature-box-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h5 class="fw-normal">Service title</h5>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                </div>
            </div>
            <!-- Service box 6 -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="feature-box dark">
                    <div class="feature-box-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h5 class="fw-normal">Service title</h5>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                </div>
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</div>
<!-- end Syarat section -->

<!-- Tutorial` section -->
<div class="section border-top" id="tutorial">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-12 col-lg-6 order-lg-2">
                <a class="lightbox-media-box border-radius-025 icon-lg" href="https://www.youtube.com/watch?v=W-j4QGAgNu8">
                    <img src="<?= base_url() ?>/assets/frontend/images/col-1.jpg" alt="">
                    <i class="bi bi-play"></i>
                </a>
            </div>
            <div class="col-12 col-lg-6 order-lg-1">
                <h3 class="fw-light">Tutorial Penggunaan SIPEDES</h3>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                <a class="button button-lg button-radius button-dark margin-top-40" href="#">Lihat Tutorial</a>
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</div>
<!-- end Tutorial section -->
<?= $this->endSection(); ?>