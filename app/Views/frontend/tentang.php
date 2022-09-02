<?= $this->extend('template/frontend/index'); ?>
<?= $this->section('content'); ?>
<!-- About section -->
<div class="section">
    <div class="container">
        <div class="margin-bottom-70">
            <div class="row text-center">
                <div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                    <h2>Tentang</h2>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean massa. Cum sociis natoque
                        penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                </div>
            </div>
        </div>
        <div class="owl-carousel owl-dots-overlay" data-owl-items="1" data-owl-dots="true" data-owl-nav="true">
            <!-- Slider Image 1 -->
            <div>
                <img src="<?= base_url() ?>/assets/frontend/images/col-1.jpg" alt="">
            </div>
            <!-- Slider Image 2 -->
            <div>
                <img src="<?= base_url() ?>/assets/frontend/images/col-1.jpg" alt="">
            </div>
            <!-- Slider Image 3 -->
            <div>
                <img src="<?= base_url() ?>/assets/frontend/images/col-1.jpg" alt="">
            </div>
        </div><!-- end owl-carousel -->
    </div><!-- end container -->
</div>
<!-- end About section -->

<!-- Contact Info section -->
<div class="section-sm">
    <div class="container">
        <div class="row g-2">
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="d-flex align-items-center">
                    <div class="circle-box-sm bg-grey margin-right-20">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div class="d-inline-block">
                        <p>+987 654 321 01</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="d-flex align-items-center">
                    <div class="circle-box-sm bg-grey margin-right-20">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="d-inline-block">
                        <p>contact@example.com</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="d-flex align-items-center">
                    <div class="circle-box-sm bg-grey margin-right-20">
                        <i class="bi bi-skype"></i>
                    </div>
                    <div class="d-inline-block">
                        <p>contact.support</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="d-flex align-items-center">
                    <div class="circle-box-sm bg-grey margin-right-20">
                        <i class="fab fa-viber"></i>
                    </div>
                    <div class="d-inline-block">
                        <p>+987 654 321 01</p>
                    </div>
                </div>
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</div>
<!-- end Contact Info section -->

<!-- Team section -->
<div class="section border-top">
    <div class="container">
        <div class="margin-bottom-70">
            <div class="row text-center">
                <div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                    <h2>Aparat Desa</h2>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cum sociis natoque penatibus et
                        magnis dis parturient montes, nascetur ridiculus mus.</p>
                </div>
            </div>
        </div>
        <div class="row g-3 team-wrapper">
            <!-- Team box 1 -->
            <div class="col-12 col-sm-6 col-lg-3 team-box">
                <div class="team-img">
                    <img src="<?= base_url() ?>/assets/frontend/images/col-4-square.jpg" alt=""><!-- image source -->
                    <!-- social links -->
                    <div>
                        <ul>
                            <li><a href="#"><i class="bi bi-facebook"></i></a></li>
                            <li><a href="#"><i class="bi bi-twitter"></i></a></li>
                            <li><a href="#"><i class="bi bi-pinterest"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="margin-bottom-10">
                    <h6 class="fw-normal margin-0">John Doe</h6>
                    <p>CEO</p>
                </div>
            </div>
            <!-- Team box 2 -->
            <div class="col-12 col-sm-6 col-lg-3 team-box">
                <div class="team-img">
                    <img src="<?= base_url() ?>/assets/frontend/images/col-4-square.jpg" alt=""><!-- image source -->
                    <!-- social links -->
                    <div>
                        <ul>
                            <li><a href="#"><i class="bi bi-facebook"></i></a></li>
                            <li><a href="#"><i class="bi bi-twitter"></i></a></li>
                            <li><a href="#"><i class="bi bi-pinterest"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="margin-bottom-10">
                    <h6 class="fw-normal margin-0">John Doe</h6>
                    <p>Co-Founder</p>
                </div>
            </div>
            <!-- Team box 3 -->
            <div class="col-12 col-sm-6 col-lg-3 team-box">
                <div class="team-img">
                    <img src="<?= base_url() ?>/assets/frontend/images/col-4-square.jpg" alt=""><!-- image source -->
                    <!-- social links -->
                    <div>
                        <ul>
                            <li><a href="#"><i class="bi bi-facebook"></i></a></li>
                            <li><a href="#"><i class="bi bi-twitter"></i></a></li>
                            <li><a href="#"><i class="bi bi-pinterest"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="margin-bottom-10">
                    <h6 class="fw-normal margin-0">John Doe</h6>
                    <p>Lead Developer</p>
                </div>
            </div>
            <!-- Team box 4 -->
            <div class="col-12 col-sm-6 col-lg-3 team-box">
                <div class="team-img">
                    <img src="<?= base_url() ?>/assets/frontend/images/col-4-square.jpg" alt=""><!-- image source -->
                    <!-- social links -->
                    <div>
                        <ul>
                            <li><a href="#"><i class="bi bi-facebook"></i></a></li>
                            <li><a href="#"><i class="bi bi-twitter"></i></a></li>
                            <li><a href="#"><i class="bi bi-pinterest"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="margin-bottom-10">
                    <h6 class="fw-normal margin-0">John Doe</h6>
                    <p>Lead Designer</p>
                </div>
            </div>
            <!-- Team box 5 -->
            <div class="col-12 col-sm-6 col-lg-3 team-box">
                <div class="team-img">
                    <img src="<?= base_url() ?>/assets/frontend/images/col-4-square.jpg" alt=""><!-- image source -->
                    <!-- social links -->
                    <div>
                        <ul>
                            <li><a href="#"><i class="bi bi-facebook"></i></a></li>
                            <li><a href="#"><i class="bi bi-twitter"></i></a></li>
                            <li><a href="#"><i class="bi bi-pinterest"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="margin-bottom-10">
                    <h6 class="fw-normal margin-0">John Doe</h6>
                    <p>Manager</p>
                </div>
            </div>
            <!-- Team box 6 -->
            <div class="col-12 col-sm-6 col-lg-3 team-box">
                <div class="team-img">
                    <img src="<?= base_url() ?>/assets/frontend/images/col-4-square.jpg" alt=""><!-- image source -->
                    <!-- social links -->
                    <div>
                        <ul>
                            <li><a href="#"><i class="bi bi-facebook"></i></a></li>
                            <li><a href="#"><i class="bi bi-twitter"></i></a></li>
                            <li><a href="#"><i class="bi bi-pinterest"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="margin-bottom-10">
                    <h6 class="fw-normal margin-0">John Doe</h6>
                    <p>Designer</p>
                </div>
            </div>
            <!-- Team box 7 -->
            <div class="col-12 col-sm-6 col-lg-3 team-box">
                <div class="team-img">
                    <img src="<?= base_url() ?>/assets/frontend/images/col-4-square.jpg" alt=""><!-- image source -->
                    <!-- social links -->
                    <div>
                        <ul>
                            <li><a href="#"><i class="bi bi-facebook"></i></a></li>
                            <li><a href="#"><i class="bi bi-twitter"></i></a></li>
                            <li><a href="#"><i class="bi bi-pinterest"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="margin-bottom-10">
                    <h6 class="fw-normal margin-0">John Doe</h6>
                    <p>Developer</p>
                </div>
            </div>
            <!-- Team box 8 -->
            <div class="col-12 col-sm-6 col-lg-3 team-box">
                <div class="team-img">
                    <img src="<?= base_url() ?>/assets/frontend/images/col-4-square.jpg" alt=""><!-- image source -->
                    <!-- social links -->
                    <div>
                        <ul>
                            <li><a href="#"><i class="bi bi-facebook"></i></a></li>
                            <li><a href="#"><i class="bi bi-twitter"></i></a></li>
                            <li><a href="#"><i class="bi bi-pinterest"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="margin-bottom-10">
                    <h6 class="fw-normal margin-0">John Doe</h6>
                    <p>Photographer</p>
                </div>
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</div>
<!-- end Team section -->
<?= $this->endSection(); ?>