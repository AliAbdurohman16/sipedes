<div class="table-responsive shadow rounded">

    <table class="table table-center bg-white mb-0" id="table">
        <?php foreach ($penduduk as $row) : ?>
            <tr>
                <th class="border-bottom p-3" style="width: 25%;">Nomor Induk Kependudukan</th>
                <td style="width: 1%;">:</td>
                <td><?= $row->nik; ?></td>
            </tr>
            <tr>
                <th class="border-bottom p-3">Nama Lengkap</th>
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
                <th class="border-bottom p-3">RT / RW</th>
                <td style="width: 1%;">:</td>
                <td><?= $row->rt_number; ?> / <?= $row->rw_number; ?></td>
            </tr>
            <tr>
                <th class="border-bottom p-3">Desa</th>
                <td style="width: 1%;">:</td>
                <td><?= $row->desa; ?></td>
            </tr>
            <tr>
                <th class="border-bottom p-3">Kecamatan</th>
                <td style="width: 1%;">:</td>
                <td><?= $row->kecamatan; ?></td>
            </tr>
            <tr>
                <th class="border-bottom p-3">Kabupaten</th>
                <td style="width: 1%;">:</td>
                <td><?= $row->kabupaten; ?></td>
            </tr>
            <tr>
                <th class="border-bottom p-3">Provinsi</th>
                <td style="width: 1%;">:</td>
                <td><?= $row->provinsi; ?></td>
            </tr>
            <tr>
                <th class="border-bottom p-3">Alamat</th>
                <td style="width: 1%;">:</td>
                <td><?= $row->alamat; ?></td>
            </tr>
            <tr>
                <th class="border-bottom p-3">Golongan Darah</th>
                <td style="width: 1%;">:</td>
                <td><?= $row->gol_darah; ?></td>
            </tr>
            <tr>
                <th class="border-bottom p-3">Agama</th>
                <td style="width: 1%;">:</td>
                <td><?= $row->agama; ?></td>
            </tr>
            <tr>
                <th class="border-bottom p-3">Status Kawin</th>
                <td style="width: 1%;">:</td>
                <td><?= $row->status_kawin; ?></td>
            </tr>
            <tr>
                <th class="border-bottom p-3">Pendidikan Terakhir</th>
                <td style="width: 1%;">:</td>
                <td><?= $row->pendidikan_terakhir; ?></td>
            </tr>
            <tr>
                <th class="border-bottom p-3">Pekerjaan</th>
                <td style="width: 1%;">:</td>
                <td><?= $row->pekerjaan; ?></td>
            </tr>
            <tr>
                <th class="border-bottom p-3">Nama Ayah</th>
                <td style="width: 1%;">:</td>
                <td><?= $row->nama_ayah; ?></td>
            </tr>
            <tr>
                <th class="border-bottom p-3">Nama Ibu</th>
                <td style="width: 1%;">:</td>
                <td><?= $row->nama_ibu; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <button type="button" class="btn btn-secondary btn-sm mt-2" onclick="dataPenduduk()">Kembali</button>
</div>


<script>
    function dataPenduduk() {
        $.ajax({
            url: "<?= site_url('admin/penduduk') ?>",
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