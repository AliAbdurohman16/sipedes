<table class="table table-center bg-white mb-0" id="table">
    <thead>
        <tr>
            <th class="text-center border-bottom p-3">No</th>
            <th class="border-bottom p-3">No KK</th>
            <th class="border-bottom p-3">Kepala Keluarga</th>
            <th class="border-bottom p-3">Alamat</th>
            <th class="border-bottom p-3">Anggota KK</th>
            <th class="border-bottom p-3">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <!-- Start -->
        <?php
        $no = 1;
        foreach ($kartu_keluarga as $row) :
        ?>
            <tr>
                <th class="text-center p-3" style="width: 5%;"><?= $no++; ?></th>
                <td class="p-3"><?= $row->no_kk; ?></td>
                <td class="p-3"><?= $row->nama_kepala; ?></td>
                <td class="p-3"><?= $row->alamat; ?></td>
                <td style="width: 15%;">
                    <button type="button" class="btn btn-info btn-sm" onclick="editJabatan(<?= $row->id ?>)"><i class="fa-solid fa-eye"></i> Anggota KK</button>
                </td>
                <td style="width: 20%;">
                    <button type="button" class="btn btn-warning btn-sm" onclick="editJabatan(<?= $row->id ?>)"><i class="fa-solid fa-pen"></i> Edit</button>
                    <button type="button" class="btn btn-danger btn-sm" onclick="deleteJabatan(<?= $row->id ?>)"><i class="fa-solid fa-trash"></i> Hapus</button>
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
</script>