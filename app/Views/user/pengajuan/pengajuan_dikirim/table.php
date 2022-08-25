<table class="table table-center bg-white mb-0" id="table">
    <thead>
        <tr>
            <th class="text-center border-bottom p-3">No</th>
            <th class="border-bottom p-3">No Kartu Keluarga</th>
            <th class="border-bottom p-3">NIK</th>
            <th class="border-bottom p-3">No Telepon</th>
            <th class="border-bottom p-3">Keterangan</th>
            <th class="border-bottom p-3">Status</th>
            <th class="border-bottom p-3">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <!-- Start -->
        <?php
        $no = 1;
        foreach ($pds as $pd) :
        ?>
            <tr>
                <th class="text-center p-3" style="width: 5%;"><?= $no++; ?></th>
                <td class="p-3"><?= $pd->no_kk; ?></td>
                <td class="p-3"><?= $pd->nik; ?></td>
                <td class="p-3"><?= $pd->telepon; ?></td>
                <td class="p-3"><?= $pd->keterangan; ?></td>
                <td class="p-3"><?= $pd->status; ?></td>
                <td style="width: 25%;">
                    <button type="button" class="btn btn-warning btn-sm" onclick="editPengajuanDikirim(<?= $pd->id ?>)"><i class="fa-solid fa-pen"></i> Edit</button>
                    <button type="button" class="btn btn-danger btn-sm" onclick="deletePengajuanDikirim(<?= $pd->id ?>)"><i class="fa-solid fa-trash"></i> Hapus</button>
                </td>
            </tr>
        <?php endforeach; ?>
        <!-- End -->
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#table').DataTable();
    })


    function editPengajuanDikirim(id) {
        $.ajax({
            type: 'post',
            url: "<?= site_url('admin/data_dusun/edit') ?>",
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

    function deletePengajuanDikirim(id) {
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
                    url: '<?= site_url('user/pengajuan_dikirim/delete') ?>',
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
                            pengajuanDikirim();
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