<table class="table table-center bg-white mb-0" id="table">
    <thead>
        <tr>
            <th class="text-center border-bottom p-3">No</th>
            <th class="border-bottom p-3">No Kartu Keluarga</th>
            <th class="border-bottom p-3">NIK</th>
            <th class="border-bottom p-3">No Telepon</th>
            <th class="border-bottom p-3">Jenis Pengajuan Surat</th>
            <th class="border-bottom p-3">Keterangan</th>
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
                <td style="width: 12%;">
                    <button type="button" class="btn btn-info btn-sm mb-2" onclick="detail(<?= $pd->id ?>)"><i class="fa-solid fa-circle-info"></i> Informasi</button>
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

    function detail(id) {
        $.ajax({
            type: 'post',
            url: "<?= site_url('admin/surat_keterangan_rame_rame/detail') ?>",
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
</script>