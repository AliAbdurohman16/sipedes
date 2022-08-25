<table class="table table-center bg-white mb-0" id="table">
    <thead>
        <tr>
            <th class="text-center border-bottom p-3">No</th>
            <th class="border-bottom p-3">Nama</th>
            <th class="border-bottom p-3">Jabatan</th>
            <th class="border-bottom p-3">Jenis Kelamin</th>
            <th class="border-bottom p-3">Nomor SK</th>
            <th class="border-bottom p-3">Nomor HP</th>
            <th class="border-bottom p-3">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <!-- Start -->
        <?php
        $no = 1;
        foreach ($aparat_desa as $row) :
        ?>
            <tr>
                <th class="text-center p-3" style="width: 5%;"><?= $no++; ?></th>
                <td class="p-3"><?= $row->name; ?></td>
                <td class="p-3"><?= $row->jabatan; ?></td>
                <td class="p-3"><?= $row->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan'; ?></td>
                <td class="p-3"><?= $row->no_sk; ?></td>
                <td class="p-3"><?= $row->no_hp; ?></td>
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

    function editJabatan(id) {
        $.ajax({
            type: 'post',
            url: "<?= site_url('admin/data_jabatan/edit') ?>",
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

    function deleteJabatan(id) {
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
                    url: '<?= site_url('admin/data_jabatan/delete') ?>',
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
                            dataJabatan();
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