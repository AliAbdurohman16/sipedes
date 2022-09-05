<?= $this->extend('template/frontend/index'); ?>

<?= $this->section('content'); ?>
<div class="section-fullscreen bg-image parallax" data-bg-src="<?= base_url() ?>/images/content/bg-blue.jpg">
    <div class="bg-black-02 section-divider-wavesOpacity-bottom">
        <div class="container">
            <div class="position-middle">
                <div class="d-flex justify-content-between">
                    <div class="row">
                        <div class="col">
                            <h1 class="fw-bold margin-bottom-20 font-family-secondary">Sistem Pengajuan Desa Cibinuang (SIPEDES)</h1>
                            <p class="text-white font-family-tertiary">SIPEDES (Sistem Pengajuan Desa Cibinuang) merupakan aplikasi berbasis
                                website untuk menyediakan pengajuan tentang surat menyurat kepada masyarakat khususnya
                                masyarakat Desa Cibinuang, Kec.Kuningan, Kab.Kuningan.</p>
                            <div class="margin-top-40">
                                <a class="button button-lg button-radius button-secondary-3" href="<?= base_url() ?>/tulis_pengajuan">Buat
                                    Pengajuan</a>
                                <a class="button button-lg button-radius button-white-3" href="#tutorial">Tutorial</a>
                            </div>
                        </div>
                        <div class="col d-none d-sm-none d-lg-block">
                            <img src="<?= base_url() ?>/images/content/ilustration.svg"
                                style="margin-left: 50px;" class="img-fluid ml-5" alt="ilustration">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container icon-5xl">
        <div class="row g-4">
            <div class="col-12 col-lg-4">
                <div
                    class="bg-white border-radius-10 box-shadow-with-hover hover-float padding-20 padding-md-30 padding-lg-40">
                    <div class="text-dark margin-bottom-10">
                        <i class="bi bi-pencil"></i>
                    </div>
                    <h5 class="fw-normal">Isi Form Yang Telah Disediakan</h5>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div
                    class="bg-white border-radius-10 box-shadow-with-hover hover-float padding-20 padding-md-30 padding-lg-40">
                    <div class="text-dark margin-bottom-10">
                        <i class="bi bi-send"></i>
                    </div>
                    <h5 class="fw-normal">Kirimkan Pengajuan Yang Ingin Diajukan</h5>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div
                    class="bg-white border-radius-10 box-shadow-with-hover hover-float padding-20 padding-md-30 padding-lg-40">
                    <div class="text-dark margin-bottom-10">
                        <i class="bi bi-calendar-check"></i>
                    </div>
                    <h5 class="fw-normal">Tunggu Dan Kami Akan Mengirimkannya</h5>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section move-top-50 bg-white-09" id="tentang">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-12 col-lg-6">
                <h2 class="font-family-secondary">Tentang SIPEDES</h2>
                <p class="font-family-tertiary">SIPEDES merupakan singkatan dari <u>Sistem Pengajuan Desa</u> dimana aplikasi berbasis website ini merupakan aplikasi untuk mengajukan pengajuan tentang surat-menyurat yang diperlukan oleh masyarakat khususnya masyarakat Desa Cibinuang.</p>
            </div>
            <div class="col-12 col-lg-6">
                <h2 class="font-family-secondary">Syarat Dan Ketentuan</h2>
                <p class="font-family-tertiary">Tidak ada syarat dan ketentuan yang berlaku, yang terpenting warga berdomisili di Desa Cibinuang, Kec.Kuningan, Kab.Kuningan dan ingin mengajukan pengajuan surat-menyurat untuk kepentingannya tanpa harus datang ke Balai Desa.</p>
            </div>
        </div>
    </div>
</div>

<div class="section move-top-100" id="langkah-langkah">
    <div class="container">
        <div class="row text-center">
            <div class="col-12 col-lg-12">
                <div class="mt-3">
                <h2 class="font-family-secondary">3 Langkah Mudah Mengajukan Surat-Menyurat Tanpa RIBET!</h2>
                <div class="divider-zigzag divider-zigzag-color-black-07 margin-bottom-20">
                    <span></span><span></span><span></span>
                </div>
                <div class="timeline-wrapper timeline-left bg-grey-lightest rounded">
                <div class="timeline">
                    <div class="timeline-date">
                    <h6 class="font-family-tertiary font-small fw-normal uppercase">01</h6>
                    </div>
                    <div class="timeline-content">
                    <h6>Klik tautan <a class="text-decoration-underline" href="<?= base_url() ?>/tulis_pengajuan">ini</a>. Lalu isi form isian yang sudah disediakan dan pastikan form diisi dengan benar</h6>
                    </div>
                </div>
                <div class="timeline">
                    <div class="timeline-date">
                    <h6 class="font-family-tertiary font-small fw-normal uppercase">02</h6>
                    </div>
                    <div class="timeline-content">
                    <h6>Klik "Kirimkan" maka dengan otomatis surat pengajuan yang bapak/ibu ingin ajukan akan terkirim ke pihak desa dan pihak desa akan membuatkan surat pengajuan yang sudah bapak/ibu ajukan</h6>
                    </div>
                </div>
                <div class="timeline">
                    <div class="timeline-date">
                    <h6 class="font-family-tertiary font-small fw-normal uppercase">03</h6>
                    </div>
                    <div class="timeline-content">
                    <h6>Tunggu dari pihak desa mengirimkan surat yang telah bapak/ibu ajukan melalui nomor ponsel yang telah bapak/ibu isi atau dengan mengecek status surat yang telah diajukan dengan login kedalam sistem untuk melihatnya</h6>
                    </div>
                </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

<div class="section border-bottom move-top-100" id="jenis-surat">
    <div class="container">
        <div class="row text-center">
            <div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
                <h2 class="font-family-secondary">Jenis Surat Yang Bisa Diajukan</h2>
                <div class="divider-zigzag divider-zigzag-color-black-07">
                    <span></span><span></span><span></span>
                </div>
            </div>
        </div>
        <div class="row g-4 margin-top-30">
                <div class="col-12 col-md-4">
                    <h2 class="fw-bold text-dark font-family-secondary">01.</h2>
                    <h5 class="fw-normal font-family-secondary">Surat Keterangan Nama</h5>
                    <p class="font-family-tertiary">Surat untuk keterangan nama apabila terdapat nama yang berbeda.</p>
                </div>
                <div class="col-12 col-md-4">
                    <h2 class="fw-bold text-dark font-family-secondary">02.</h2>
                    <h5 class="fw-normal font-family-secondary">Surat Keterangan Domisili</h5>
                    <p class="font-family-tertiary">Surat untuk keterangan domisili tempat tinggal sekarang.</p>
                </div>
                <div class="col-12 col-md-4">
                    <h2 class="fw-bold text-dark font-family-secondary">03.</h2>
                    <h5 class="fw-normal font-family-secondary">Surat Keterangan Belum Menikah</h5>
                    <p class="font-family-tertiary">Surat untuk keterangan bahwa belum menikah.</p>
                </div>
                <div class="col-12 col-md-4">
                    <h2 class="fw-bold text-dark font-family-secondary">04.</h2>
                    <h5 class="fw-normal font-family-secondary">Surat Keterangan Kelahiran</h5>
                    <p class="font-family-tertiary">Surat untuk keterangan kelahiran anak.</p>
                </div>
                <div class="col-12 col-md-4">
                    <h2 class="fw-bold text-dark font-family-secondary">05.</h2>
                    <h5 class="fw-normal font-family-secondary">Surat Keterangan Penghasilan</h5>
                    <p class="font-family-tertiary">Surat untuk keterangan pengahasilan yang didapat.</p>
                </div>
                <div class="col-12 col-md-4">
                    <h2 class="fw-bold text-dark font-family-secondary">06.</h2>
                    <h5 class="fw-normal font-family-secondary">Surat Keterangan Pindah KK</h5>
                    <p class="font-family-tertiary">Surat untuk keterangan pindah kartu keluarga karena hal tertentu.</p>
                </div>
                <div class="col-12 col-md-4">
                    <h2 class="fw-bold text-dark font-family-secondary">07.</h2>
                    <h5 class="fw-normal font-family-secondary">Surat Keterangan Rame-Rame</h5>
                    <p class="font-family-tertiary">Surat untuk keterangan mengadakan acara.</p>
                </div>
                <div class="col-12 col-md-4">
                    <h2 class="fw-bold text-dark font-family-secondary">08.</h2>
                    <h5 class="fw-normal font-family-secondary">Surat Keterangan Usaha</h5>
                    <p class="font-family-tertiary">Surat untuk keterangan mempunyai usaha.</p>
                </div>
                <div class="col-12 col-md-4">
                    <h2 class="fw-bold text-dark font-family-secondary">09.</h2>
                    <h5 class="fw-normal font-family-secondary">Surat Keterangan Tidak Mampu</h5>
                    <p class="font-family-tertiary">Surat untuk keterangan tidak mampu.</p>
                </div>
                <div class="col-12 col-md-4">
                    <h2 class="fw-bold text-dark font-family-secondary">10.</h2>
                    <h5 class="fw-normal font-family-secondary">Surat Keterangan Catatan Kepolisian</h5>
                    <p class="font-family-tertiary">Surat untuk keterangan catatan kepolisian.</p>
                </div>
                <div class="col-12 col-md-4">
                    <h2 class="fw-bold text-dark font-family-secondary">11.</h2>
                    <h5 class="fw-normal font-family-secondary">Surat Keterangan Kematian</h5>
                    <p class="font-family-tertiary">Surat untuk keterangan kematian.</p>
                </div>
        </div>
    </div>
</div>

<div class="section border-top bg-grey" id="faq">
    <div class="container">
        <div class="row text-center">
            <div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
                <h3 class="font-family-secondary">Pertanyaan Yang Sering Ditanyakan</h3>
                <div class="divider-zigzag divider-zigzag-color-black-07">
                    <span></span><span></span><span></span>
                </div>
            </div>
        </div>
        <div class="row g-5 margin-top-30">
            <div class="col-12 col-lg-12">
                <ul class="accordion single-open style-1 border-radius">
                    <li class="active">
                        <div class="accordion-title">
                            <h6 class="fw-medium font-small uppercase">Apa itu SIPEDES?</h6>
                        </div>
                        <div class="accordion-content">
                            <p class="font-family-tertiary">Sipedes merupakan singkatan dari Sistem Pengajuan Desa.</p>
                        </div>
                    </li>
                    <li>
                        <div class="accordion-title">
                            <h6 class="fw-medium font-small uppercase">Apa tujuan SIPEDES?</h6>
                        </div>
                        <div class="accordion-content">
                            <p class="font-family-tertiary">Tujuannya untuk mengefisienkan waktu masyarakat Desa Cibinuang perihal pengajuan surat-menyurat tanpa harus datang ke Balai Desa, cukup dirumah saja, surat akan dikirimkan melalui nomor ponsel yang telah diberikan.</p>
                        </div>
                    </li>
                    <li>
                    <li>
                        <div class="accordion-title">
                            <h6 class="fw-medium font-small uppercase">Bagaimana Cara Kerja SIPEDES?</h6>
                        </div>
                        <div class="accordion-content">
                            <p class="font-family-tertiary">Bisa dibaca pada bagian <a class="text-decoration-underline" href="#langkah-langkah">ini</a>.</p>
                        </div>
                    </li>
                    <li>
                        <div class="accordion-title">
                            <h6 class="fw-medium font-small uppercase">Apakah SIPEDES di buat untuk Umum?</h6>
                        </div>
                        <div class="accordion-content">
                            <p class="font-family-tertiary">Untuk saat ini hanya bisa melayani pengajuan masyarakat Desa Cibinuang, Kec.Kuningan, Kab.Kuningan.</p>
                        </div>
                    </li>
                    <li>
                        <div class="accordion-title">
                            <h6 class="fw-medium font-small uppercase">Apakah SIPEDES berbayar?</h6>
                        </div>
                        <div class="accordion-content">
                            <p class="font-family-tertiary">Layanan ini sama sekali tidak dipungut biaya apapun alias gratis!.</p>
                        </div>
                    </li>
                    <li>
                        <div class="accordion-title">
                            <h6 class="fw-medium font-small uppercase">Jenis surat apa saja yang bisa diajukan?</h6>
                        </div>
                        <div class="accordion-content">
                            <p class="font-family-tertiary">Bisa dibaca pada bagian <a class="text-decoration-underline" href="#jenis-surat">ini</a>.</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="section move-top-90 bg-grey" id="tutorial">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-12 col-lg-6 order-lg-1">
            <h3 class="font-family-secondary">Tutorial Menggunakan Aplikasi SIPEDES Cibinuang</h3>
                <p class="font-family-tertiary">Masih bingung cara menggunakan aplikasi ini? bisa disimak melalui video berikut ini.</p>
            </div>
            <div class="col-12 col-lg-6 order-lg-2">
                <a class="lightbox-media-box border-radius-025 icon-lg" href="https://www.youtube.com/watch?v=W-j4QGAgNu8">
                    <img src="<?= base_url() ?>/images/content/tutor.jpg" alt="thumbnail">
                    <i class="bi bi-play"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="section move-top-70 bg-grey">
    <div class="container">
    <div class="row text-center">
            <div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
                <h3 class="font-family-secondary">Aparat Desa Cibinuang</h3>
                <div class="divider-zigzag divider-zigzag-color-black-07">
                    <span></span><span></span><span></span>
                </div>
            </div>
        </div>
        <div class="owl-carousel mt-5" data-owl-items="1" data-owl-dots="false" data-owl-nav="true">
            <?php foreach($aparat as $a): ?>
            <div class="testimonial-box">
                <img class="margin-bottom-20" src="<?= base_url() ?>/images/aparat/<?= $a->foto ?>" alt="<?= $a->name ?>">
                <h5 class="fw-normal line-height-140 margin-0"><?= $a->name ?></h5>
                <span class="font-small fw-normal"><?= $a->nama_jabatan ?></span>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</div>

<div class="section border-top">
    <div class="container">
        <ul class="clients-grid column-4">
            <li><a href="#"><img src="<?= base_url() ?>/images/logo/ppk.jpg" style="width: 100px;" alt=""></a></li>
            <li><a href="#"><img src="<?= base_url() ?>/images/logo/pbk.png" style="width: 60px;" alt=""></a></li>
            <li><a href="#"><img src="<?= base_url() ?>/images/logo/cibinuang.png" style="width: 160px;" alt=""></a></li>
            <li><a href="#"><img src="<?= base_url() ?>/images/logo/logo.png" style="width: 90px;" alt=""></a></li>
        </ul>
    </div>
</div>
<?= $this->endSection(); ?>