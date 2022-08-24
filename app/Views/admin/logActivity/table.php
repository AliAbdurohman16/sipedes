<table class="table table-center bg-white mb-0" id="table">
    <thead>
        <tr>
            <th class="text-center border-bottom p-3">No</th>
            <th class="border-bottom p-3">Nama Pengguna</th>
            <th class="border-bottom p-3">Aktivitas</th>
            <th class="border-bottom p-3">Tanggal dan Waktu</th>
        </tr>
    </thead>
    <tbody>
        <!-- Start -->
        <?php
        $no = 1;
        foreach ($logs as $log) :
        ?>
            <tr>
                <th class="text-center p-3" style="width: 5%;"><?= $no++; ?></th>
                <td class="p-3"><?= $log->name; ?></td>
                <td class="p-3"><?= $log->activities; ?></td>
                <td class="p-3"><?= $log->created_at; ?></td>
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