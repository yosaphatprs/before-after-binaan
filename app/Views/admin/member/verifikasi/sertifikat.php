<div class="card mb-4">
    <div class="card-header">
        <h3 class="card-title">Daftar <?= $section; ?> Menunggu Verifikasi</h3>
    </div>
    <div class="card-body p-0">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Nama Member</th>
                    <th>Nama Perusahaan</th>
                    <th>Judul Sertifikat</th>
                    <th>Nomor Sertifikat</th>
                    <th>Tanggal Terbit</th>
                    <th>Penerbit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($verifikasiData) && is_array($verifikasiData)): ?>
                <?php foreach ($verifikasiData as $index => $item): ?>
                <tr>
                    <td><?= $index + 1; ?></td>
                    <td><?= esc($item['nama_user']); ?></td>
                    <td><?= esc($item['nama_perusahaan']); ?></td>
                    <td><?= esc($item['judul_sertifikat']); ?></td>
                    <td><?= esc($item['no_sertifikat']); ?></td>
                    <td><?= esc($item['tanggal_terbit_sertifikat']); ?></td>
                    <td><?= esc($item['penerbit_sertifikat']); ?></td>
                    <td class="align-middle">
                        <div class="d-flex">
                            <form action="<?= base_url('admin/member/verifikasi') ?>" method="post">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="id" value="<?= $item['id_sertifikat']; ?>">
                                <input type="hidden" name="section" value="<?= $section; ?>">
                                <input type="hidden" name="aksi" value="accepted">
                                <button type="submit" class="btn btn-sm btn-success me-2">Terima</button>
                            </form>
                            <form action="<?= base_url('admin/member/verifikasi') ?>" method="post">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="id" value="<?= $item['id_sertifikat']; ?>">
                                <input type="hidden" name="section" value="<?= $section; ?>">
                                <input type="hidden" name="aksi" value="rejected">
                                <button type="submit" class="btn btn-sm btn-danger">Tolak</button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php else: ?>
                <tr>
                    <td colspan="8" class="text-center">Tidak ada
                        <?php  
                            if(strlen($section) > 10) {
                                $section = explode("-", $section);
                                echo implode(" ", $section);
                            } else {
                                echo $section;
                            }
                        ?> yang menunggu
                        verifikasi.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div> <!-- /.card-body -->
</div> <!-- /.card -->