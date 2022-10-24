<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <button type="button" class="btn btn-primary mb-3 btn-sm addButton">
        Tambah Data +
    </button>
</div>
<div class="table-responsive shadow rounded ">
    <table class="table table-center bg-white mb-0" id="table">
        <thead>
            <tr>
                <th class="text-center border-bottom p-3">No</th>
                <th class="border-bottom p-3">NIK</th>
                <th class="border-bottom p-3">Nama</th>
                <th class="border-bottom p-3">Jenis Kelamin</th>
                <th class="border-bottom p-3">Alamat</th>
                <th class="border-bottom p-3">No KK</th>
                <th class="border-bottom p-3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <!-- Start -->
            <?php
            $no = 1;
            foreach ($penduduks as $penduduk) :
            ?>
                <tr>
                    <th class="text-center p-3" style="width: 5%;"><?= $no++; ?></th>
                    <td class="p-3"><?= $penduduk->nik; ?></td>
                    <td class="p-3"><?= $penduduk->name; ?></td>
                    <td class="p-3"><?= $penduduk->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' ?></td>
                    <td class="p-3"><?= $penduduk->alamat; ?></td>
                    <td class="p-3"><?= $penduduk->no_kk . " - " . $penduduk->nama_kepala ?></td>
                    <td style="width: 20%;">
                        <button type="button" class="btn btn-info btn-sm" onclick="detailPenduduk(<?= $penduduk->id ?>)"><i class="fa-solid fa-eye"></i> Detail</button>
                        <button type="button" class="btn btn-warning btn-sm" onclick="editPenduduk(<?= $penduduk->id ?>)"><i class="fa-solid fa-pen"></i> Edit</button>
                        <button type="button" class="btn btn-danger btn-sm" onclick="deletePenduduk(<?= $penduduk->id ?>)"><i class="fa-solid fa-trash"></i> Hapus</button>
                    </td>
                </tr>
            <?php endforeach; ?>
            <!-- End -->
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        $('#table').DataTable();
    })

    $('.addButton').click(function() {
        $.ajax({
            url: "<?= site_url('admin/penduduk/new') ?>",
            dataType: "json",
            success: function(response) {
                $('.viewModal').html(response.data).show();
                $('#addModal').modal('show');
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    })

    function detailPenduduk(id) {
        $.ajax({
            type: 'post',
            url: "<?= site_url('admin/penduduk/detail') ?>",
            data: {
                id: id
            },
            dataType: "json",
            success: function(response) {
                $('.viewdata').html(response.data);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }

    function editPenduduk(id) {
        $.ajax({
            type: 'post',
            url: "<?= site_url('admin/penduduk/edit') ?>",
            data: {
                id: id
            },
            dataType: "json",
            success: function(response) {
                if (response.success) {
                    $('.viewModal').html(response.success).show();
                    $('#editModal').modal('show');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }

    function deletePenduduk(id) {
        Swal.fire({
            title: 'Hapus',
            text: "Apakah anda yakin?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "post",
                    url: '<?= site_url('admin/penduduk/delete') ?>',
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses',
                                text: response.success,
                            });
                            dataPenduduk();
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    }
                })
            }
        })
    }
</script>