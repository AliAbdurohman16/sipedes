<table class="table table-center bg-white mb-0" id="table">
    <thead>
        <tr>
            <th class="text-center border-bottom p-3">No</th>
            <th class="border-bottom p-3">No Kartu Keluarga</th>
            <th class="border-bottom p-3">NIK</th>
            <th class="border-bottom p-3">Nama Lengkap</th>
            <th class="border-bottom p-3">No Whatsapp</th>
            <th class="border-bottom p-3">Jenis Pengajuan Surat</th>
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
                <td class="p-3"><?= $pd->nama; ?></td>
                <td class="p-3"><?= $pd->telepon; ?></td>
                <td class="p-3"><?= $pd->jenis; ?></td>
                <td class="p-3"><span class="badge bg-soft-success"> <?= $pd->status; ?> </span></td>
                <td style="width: 12%;">
                    <button type="button" class="btn btn-info btn-sm mb-2" onclick="detailPengajuanDibuat(<?= $pd->id ?>)"><i class="fa-solid fa-circle-info"></i> Informasi</button>
                    <form action="<?= site_url('user/pengajuan_sudah_dibuat/download/' . $pd->id); ?>" method="post">
                        <button href="submit" class="btn btn-primary btn-sm mb-2"><i class="fa-solid fa-download"></i> Unduh</button>
                    </form>
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

    function detailPengajuanDibuat(id) {
        $.ajax({
            type: 'post',
            url: "<?= site_url('user/pengajuan_sudah_dibuat/detail') ?>",
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