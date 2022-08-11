<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="layout-specing">
        <div class="d-md-flex justify-content-between align-items-center">
            <h5 class="mb-0">RT</h5>

            <nav aria-label="breadcrumb" class="d-inline-block mt-2 mt-sm-0">
                <ul class="breadcrumb bg-transparent rounded mb-0 p-0">
                    <li class="breadcrumb-item text-capitalize"><a href="index.html">Data Master</a></li>
                    <li class="breadcrumb-item text-capitalize active" aria-current="page">RT</li>
                </ul>
            </nav>
        </div>

        <div class="row">
            <div class="col-12 mt-4">
                <button type="button" class="btn btn-primary btn-sm mb-3" style="float: right;" id="buttonAdd">
                    Tambah Data
                </button>
                <div class="table-responsive shadow rounded">
                    <!-- Button trigger modal -->
                    <table class="table table-center bg-white mb-0" id="table">
                        <thead>
                            <tr>
                                <th class="text-center border-bottom p-3">#</th>
                                <th class="border-bottom p-3">Nama Ketua RT</th>
                                <th class="text-center border-bottom p-3">No RT</th>
                                <th class="text-center border-bottom p-3">No RW</th>
                                <th class="border-bottom p-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Start -->
                            <?php
                            $no = 1;
                            foreach ($rts as $rt) { ?>
                                <tr>
                                    <th class="text-center p-3"><?= $no++; ?></th>
                                    <td class="p-3"><?= $rt->name ?></td>
                                    <td class="text-center p-3"><?= $rt->number ?></td>
                                    <td class="text-center p-3"><?= $rt->number_rw ?></td>
                                    <td class="p-3">
                                        <button type="button" class="btn btn-warning btn-sm ms-2" onclick="edit(<?= $rt->id ?>)"><i class="fa-solid fa-pen"></i> Edit</button>
                                        <button type="button" class="btn btn-danger btn-sm ms-2" onclick="hapus(<?= $rt->id ?>)"><i class="fa-solid fa-trash"></i> Hapus</button>
                                    </td>
                                </tr>
                            <?php } ?>
                            <!-- End -->
                        </tbody>
                    </table>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
</div>
<!--end container-->
<div class="viewmodal" style="display: none;"></div>

<?= $this->endSection(); ?>

<?= $this->section('javascript'); ?>
<script>
    $(function() {
        <?php if (session()->has("success")) { ?>
            Swal.fire({
                icon: 'success',
                title: 'Selamat!',
                text: '<?= session("success") ?>'
            })
        <?php } else if (session()->has("error")) { ?>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '<?= session("error") ?>'
            })
        <?php }?>
    });

    function hapus(id) {
        Swal.fire({
            title: 'Apakah yakin ingin menghapus data ini?',
            text: "Jika data dihapus maka data yang bersangkutan akan ikut terhapus juga!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result) {
                $.ajax({
                    type: "post",
                    url: "<?= site_url('rt/destroy')?>",
                    data: { id : id },
                    dataType: "json",
                    success: function(response) {
                        if (response.success) {
                            Swal.fire(
                                'Selamat!',
                                response.success,
                                'success'
                            ).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });
                        }
                    },
                    error: function(xhr, thrownError) {
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    }
                });
            }
        });
    }

    function edit(id) {
        $.ajax({
            url: "<?= site_url('rt/edit') ?>",
            dataType: "json",
            data: {
                id: id
            },
            success: function(response) {
                if (response.data) {
                    if (response.data) {
                        $('.viewmodal').html(response.data).show();
                        $('#exampleModal').on('shown.bs.modal', function(event) {
                            $('#nama').focus();
                        });
                        $('#exampleModal').modal('show');
                    }
                }
            }
        });
    }

    $(document).ready(function() {
        $('#buttonAdd').click(function(e) {
            e.preventDefault();

            $.ajax({
                url: "<?= site_url('rt/add') ?>",
                dataType: "json",
                type: "get",
                success: function(response) {
                    if (response.data) {
                        $('.viewmodal').html(response.data).show();
                        $('#exampleModal').on('shown.bs.modal', function(event) {
                            $('#nama').focus();
                        });
                        $('#exampleModal').modal('show');
                    }
                },
                error: function(xhr, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        });
    });
</script>
<?= $this->endSection(); ?>