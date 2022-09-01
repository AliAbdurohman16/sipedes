<?= $this->extend('template/user/index'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="layout-specing">
        <div class="d-md-flex justify-content-between align-items-center">
            <h5 class="mb-0"><?= $title ?></h5>

            <nav aria-label="breadcrumb" class="d-inline-block mt-2 mt-sm-0">
                <ul class="breadcrumb bg-transparent rounded mb-0 p-0">
                    <li class="breadcrumb-item text-capitalize active" aria-current="page"><?= $title ?></li>
                </ul>
            </nav>
        </div>

        <div class="row">
            <div class="card">
                <div class="card-body">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque veniam assumenda cumque voluptatibus asperiores soluta laborum incidunt, quia, perspiciatis corporis deserunt distinctio fuga totam dolor consectetur minima excepturi eveniet est.
                </div>
            </div>
        </div>
    </div>
</div>
<!--end container-->
<?= $this->endSection(); ?>