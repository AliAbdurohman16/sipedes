<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="layout-specing">
        <div class="d-md-flex justify-content-between align-items-center">
            <h5 class="mb-0"><?= $title ?></h5>

            <nav aria-label="breadcrumb" class="d-inline-block mt-2 mt-sm-0">
                <ul class="breadcrumb bg-transparent rounded mb-0 p-0">
                    <li class="breadcrumb-item text-capitalize"><a href="index.html">Akun Saya</a></li>
                    <li class="breadcrumb-item text-capitalize active" aria-current="page"><?= $title ?></li>
                </ul>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-6 mt-4">
                <div class="card border-0 rounded shadow">
                    <div class="card-body">
                        <h5 class="text-md-start text-center mb-0">Personal Detail :</h5>

                        <div class="mt-4 text-md-start text-center d-sm-flex">
                            <img src="assets/images/client/05.jpg"
                                class="avatar float-md-left avatar-medium rounded-circle shadow me-md-4" alt="">

                            <div class="mt-md-4 mt-3 mt-sm-0">
                                <a href="javascript:void(0)" class="btn btn-primary mt-2">Change Picture</a>
                                <a href="javascript:void(0)" class="btn btn-outline-primary mt-2 ms-2">Delete</a>
                            </div>
                        </div>

                        <form>
                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">First Name</label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="user" class="fea icon-sm icons"></i>
                                            <input name="name" id="first" type="text" class="form-control ps-5" placeholder="First Name :">
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Last Name</label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="user-check" class="fea icon-sm icons"></i>
                                            <input name="name" id="last" type="text" class="form-control ps-5" placeholder="Last Name :">
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Your Email</label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="mail" class="fea icon-sm icons"></i>
                                            <input name="email" id="email" type="email" class="form-control ps-5" placeholder="Your email :">
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Occupation</label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="bookmark" class="fea icon-sm icons"></i>
                                            <input name="name" id="occupation" type="text" class="form-control ps-5" placeholder="Occupation :">
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Description</label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="message-circle" class="fea icon-sm icons"></i>
                                            <textarea name="comments" id="comments" rows="4" class="form-control ps-5" placeholder="Description :"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end row-->
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="submit" id="submit" name="send" class="btn btn-primary" value="Save Changes">
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </form>
                        <!--end form-->
                    </div>
                </div>
            </div>
            <!--end col-->

            <div class="col-lg-6 mt-4">
                <div class="card border-0 rounded shadow p-4">
                    <h5 class="mb-0">Change password :</h5>
                    <form>
                        <div class="row mt-4">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Old password :</label>
                                    <div class="form-icon position-relative">
                                        <i data-feather="key" class="fea icon-sm icons"></i>
                                        <input type="password" class="form-control ps-5" placeholder="Old password" required="">
                                    </div>
                                </div>
                            </div>
                            <!--end col-->

                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">New password :</label>
                                    <div class="form-icon position-relative">
                                        <i data-feather="key" class="fea icon-sm icons"></i>
                                        <input type="password" class="form-control ps-5" placeholder="New password" required="">
                                    </div>
                                </div>
                            </div>
                            <!--end col-->

                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Re-type New password :</label>
                                    <div class="form-icon position-relative">
                                        <i data-feather="key" class="fea icon-sm icons"></i>
                                        <input type="password" class="form-control ps-5" placeholder="Re-type New password" required="">
                                    </div>
                                </div>
                            </div>
                            <!--end col-->

                            <div class="col-lg-12 mt-2 mb-0">
                                <button class="btn btn-primary">Save password</button>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </form>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
</div>
<!--end container-->
<?= $this->endSection(); ?>