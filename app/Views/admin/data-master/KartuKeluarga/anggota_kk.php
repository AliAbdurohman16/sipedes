<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <button type="button" class="btn btn-secondary btn-sm mb-4" onclick="dataKartuKeluarga()">Kembali</button>
</div>
<?= form_open('admin/kartu-keluarga/create_anggota', ['class' => 'formAnggotaKeluarga']); ?>
<?= csrf_field(); ?>
<div class="mb-3 row">
    <label for="staticEmail" class="col-sm-2 col-form-label">No KK | Kepala Keluarga</label>
    <div class="col-sm-5">
        <input type="hidden" name="kk_id" value="<?= $id ?>">
        <input type="number" readonly class="form-control" id="staticEmail" value="<?= $no_kk ?>" disabled>
    </div>
    <div class="col-sm-5">
        <input type="text" readonly class="form-control" id="staticEmail" value="<?= $nama_kepala ?>" disabled>
    </div>
</div>
<div class="mb-3 row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Alamat</label>
    <div class="col-sm-10">
        <input type="text" readonly class="form-control" id="staticEmail" value="<?= $alamat ?>, RT. <?= $rt_id ?> / RW.<?= $rw_id ?>, Kel. <?= $kelurahan ?>, Kec. <?= $kecamatan ?>, Kab. <?= $kabupaten ?>, <?= $provinsi ?>" disabled>
    </div>
</div>
<div class="mb-3 row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Anggota</label>
    <div class="col-sm-5">
        <select name="penduduk" id="penduduk" class="form-control">
            <option value="">-- Penduduk --</option>
            <?php foreach ($penduduks as $row) : ?>
                <option value="<?= $row->id ?>"><?= $row->nik; ?> - <?= $row->name; ?></option>
            <?php endforeach; ?>
        </select>
        <div class="invalid-feedback errorPenduduk">
        </div>
    </div>
    <div class="col-sm-4">
        <select name="status_hubungan" id="status_hubungan" class="form-control">
            <option value="">-- Hubungan Keluarga --</option>
            <option value="Kepala Keluarga">Kepala Keluarga</option>
            <option value="Istri">Istri</option>
            <option value="Anak">Anak</option>
            <option value="Menantu">Menantu</option>
            <option value="Cucu">Cucu</option>
            <option value="Orang tua">Orang tua</option>
            <option value="Mertua">Mertua</option>
            <option value="Keluarga Lain">Keluarga Lain</option>
        </select>
        <div class="invalid-feedback errorHubungan">
        </div>
    </div>
    <div class="col-sm-1">
        <button class="btn btn-sm btn-primary" type="submit" id="save">Tambah</button>
    </div>
</div>
<?= form_close(); ?>

<div class="table-responsive shadow rounded">
    <table class="table table-center bg-white mb-0" id="table">
        <thead>
            <tr>
                <th class="text-center border-bottom p-3">No</th>
                <th class="border-bottom p-3">NIK</th>
                <th class="border-bottom p-3">Nama</th>
                <th class="border-bottom p-3">Jenis Kelamin</th>
                <th class="border-bottom p-3">Hub Keluarga</th>
                <th class="border-bottom p-3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <!-- Start -->
            <?php
            $no = 1;
            foreach ($anggota_penduduk as $row) :
            ?>
                <tr>
                    <th class="text-center p-3" style="width: 5%;"><?= $no++; ?></th>
                    <td class="p-3"><?= $row->nik; ?></td>
                    <td class="p-3"><?= $row->name; ?></td>
                    <td class="p-3"><?= $row->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan'; ?></td>
                    <td class="p-3"><?= $row->status_hubungan; ?></td>
                    <td style="width: 20%;">
                        <button type="button" class="btn btn-danger btn-sm" onclick="deleteAnggotaKeluarga(<?= $row->id ?>)"><i class="fa-solid fa-trash"></i> Hapus</button>
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

    function dataKartuKeluarga() {
        $.ajax({
            url: "<?= site_url('admin/kartu-keluarga') ?>",
            dataType: "json",
            success: function(response) {
                $('.viewdata').html(response.data);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }

    $('.formAnggotaKeluarga').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: 'json',
            beforeSend: function() {
                $('#save').attr('disable', 'disabled');
                $('#save').html('<i class="fa-solid fa-spin fa-spinner"></i>');
            },
            complete: function() {
                $('#save').removeAttr('disable');
                $('#save').html('Simpan');
            },
            success: function(response) {
                if (response.error) {
                    //Penduduk
                    if (response.error.penduduk) {
                        $('#penduduk').addClass('is-invalid');
                        $('.errorPenduduk').html(response.error.penduduk);
                    } else {
                        $('#penduduk').removeClass('is-invalid');
                        $('.errorPenduduk').html('');
                    }

                    //Hubungan Keluarga
                    if (response.error.status_hubungan) {
                        $('#status_hubungan').addClass('is-invalid');
                        $('.errorHubungan').html(response.error.status_hubungan);
                    } else {
                        $('#status_hubungan').removeClass('is-invalid');
                        $('.errorHubungan').html('');
                    }
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: response.success,
                    })
                    // $('#addModal').modal('hide');
                    dataKartuKeluarga();
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        })
        return false
    })

    function deleteAnggotaKeluarga(id) {
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
                    url: '<?= site_url('admin/kartu-keluarga/delete_anggota') ?>',
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
                            dataKartuKeluarga();
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