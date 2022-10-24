<div class="table-responsive shadow rounded">

    <table class="table table-center bg-white mb-0" id="table">
        <?php foreach ($aparat as $row) : ?>
            <tr>
                <th class="border-bottom p-3 text-center" colspan="3">
                    <img src="<?= site_url('images/aparat/' . $row->foto) ?>" class="avatar avatar-medium rounded-circle shadow me-md-4" alt="">
                </th>
            </tr>
            <tr>
                <th class="border-bottom p-3" style="width: 30%;">Nama Lengkap</th>
                <td style="width: 1%;">:</td>
                <td><?= $row->name; ?></td>
            </tr>
            <tr>
                <th class="border-bottom p-3">Jenis Kelamin</th>
                <td style="width: 1%;">:</td>
                <td><?= $row->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan'; ?></td>
            </tr>
            <tr>
                <th class="border-bottom p-3">Tempat Lahir</th>
                <td style="width: 1%;">:</td>
                <td><?= $row->tempat_lahir; ?></td>
            </tr>
            <tr>
                <th class="border-bottom p-3">Tanggal Lahir</th>
                <td style="width: 1%;">:</td>
                <td><?= $row->tgl_lahir; ?></td>
            </tr>
            <tr>
                <th class="border-bottom p-3">Jabatan</th>
                <td style="width: 1%;">:</td>
                <td><?= $row->jabatan; ?></td>
            </tr>
            <tr>
                <th class="border-bottom p-3">Pendidikan Terakhir</th>
                <td style="width: 1%;">:</td>
                <td><?= $row->pendidikan_terakhir; ?></td>
            </tr>
            <tr>
                <th class="border-bottom p-3">Tanggal Pengangkatan</th>
                <td style="width: 1%;">:</td>
                <td><?= $row->tgl_pengangkatan; ?></td>
            </tr>
            <tr>
                <th class="border-bottom p-3">No Surat Keputusan</th>
                <td style="width: 1%;">:</td>
                <td><?= $row->no_sk; ?></td>
            </tr>
            <tr>
                <th class="border-bottom p-3">No Telepon</th>
                <td style="width: 1%;">:</td>
                <td><?= $row->no_hp; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <button type="button" class="btn btn-secondary btn-sm mt-2" onclick="dataAparat()">Kembali</button>
</div>


<script>
    function dataAparat() {
        $.ajax({
            url: "<?= site_url('admin/aparat_desa') ?>",
            dataType: "json",
            success: function(response) {
                $('.viewdata').html(response.data);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }
</script>