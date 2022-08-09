<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="layout-specing">
        <div class="d-md-flex justify-content-between align-items-center">
            <h5 class="mb-0">Dashboard</h5>

            <nav aria-label="breadcrumb" class="d-inline-block mt-2 mt-sm-0">
                <ul class="breadcrumb bg-transparent rounded mb-0 p-0">
                    <li class="breadcrumb-item text-capitalize"><a href="index.html">Landrick</a></li>
                    <li class="breadcrumb-item text-capitalize active" aria-current="page">Blank Page</li>
                </ul>
            </nav>
        </div>

        <div class="row">
            <div class="col-12 mt-4">
                <div class="card border-0 rounded shadow p-4">
                    <h5 class="mb-0 mb-3">Blank Page</h5>
                    <p class="text-muted mb-0">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Libero, aliquid soluta. Voluptas neque adipisci fuga magnam nulla exercitationem corrupti ducimus itaque soluta earum! Fugiat, animi id sit ad magnam facilis.</p>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
</div>
<!--end container-->
<?= $this->endSection(); ?>