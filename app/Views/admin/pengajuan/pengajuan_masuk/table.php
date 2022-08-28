<table class="table table-center bg-white mb-0" id="table">
    <thead>
        <tr>
            <th class="text-center border-bottom p-3">No</th>
            <th class="border-bottom p-3">No Kartu Keluarga</th>
            <th class="border-bottom p-3">NIK</th>
            <th class="border-bottom p-3">Nama Lengkap</th>
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
                <td class="p-3"><?= $pd->nama; ?></td>
                <td class="p-3"><?= $pd->telepon; ?></td>
                <td class="p-3"><?= $pd->jenis; ?></td>
                <td class="p-3"><?= word_limiter($pd->keterangan, 5); ?></td>
                <td class="p-3"><span class="badge bg-soft-danger"> <?= $pd->status; ?> </span></td>
                <td style="width: 12%;">
                    <button type="button" class="btn btn-info btn-sm mb-2" onclick="detailPengajuanMasuk(<?= $pd->id ?>)"><i class="fa-solid fa-eye"></i> Detail</button>
                    <button type="button" class="btn btn-success btn-sm mb-2" onclick="validasiPengajuanMasuk(<?= $pd->id ?>)"><i class="fa-solid fa-check"></i> Validasi</button>
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

    function validasiPengajuanMasuk(id) {
        $.ajax({
            type: 'post',
            url: "<?= site_url('admin/data_pengajuan_masuk/validasi') ?>",
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

    function detailPengajuanMasuk(id) {
        $.ajax({
            type: 'post',
            url: "<?= site_url('admin/data_pengajuan_masuk/detail') ?>",
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