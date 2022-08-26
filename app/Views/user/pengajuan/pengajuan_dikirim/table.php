<table class="table table-center bg-white mb-0" id="table">
    <thead>
        <tr>
            <th class="text-center border-bottom p-3">No</th>
            <th class="border-bottom p-3">No Kartu Keluarga</th>
            <th class="border-bottom p-3">NIK</th>
            <th class="border-bottom p-3">No Whatsapp</th>
            <th class="border-bottom p-3">Jenis Pengajuan Surat</th>
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
                <td class="p-3"><?= $pd->jenis; ?></td>
                <td class="p-3"><?= word_limiter($pd->keterangan, 5); ?></td>
                <td class="p-3"><span class="badge bg-soft-danger"> <?= $pd->status; ?> </span></td>
                <td style="width: 12%;">
                    <button type="button" class="btn btn-info btn-sm mb-2" onclick="detailPengajuanDikirim(<?= $pd->id ?>)"><i class="fa-solid fa-eye"></i> Detail</button>
                    <button type="button" class="btn btn-warning btn-sm mb-2" onclick="editPengajuanDikirim(<?= $pd->id ?>)"><i class="fa-solid fa-pen"></i> Edit</button>
                    <button type="button" class="btn btn-danger btn-sm mb-2" onclick="deletePengajuanDikirim(<?= $pd->id ?>)"><i class="fa-solid fa-trash"></i> Hapus</button>
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
            url: "<?= site_url('user/pengajuan_dikirim/edit') ?>",
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

    function detailPengajuanDikirim(id) {
        $.ajax({
            type: 'post',
            url: "<?= site_url('user/pengajuan_dikirim/detail') ?>",
            data: {
                id: id
            },
            dataType: "json",
            success: function(response) {
                if (response.success) {
                    $('.viewModal').html(response.success).show();
                    $('#detailModal').modal('show');
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