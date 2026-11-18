
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($judul) ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    @media (max-width: 576px) {
        .btn-tambah {
            font-size: 12px;
            padding: 6px 10px;
        }
    }
</style>
</head>
<body class="bg-light">

    <div class="container py-5">

        <div class="mb-4">
           <h2 class="fw-bold text-center">My Money Records</h2>
<p class="text-center">Aplikasi Pencatatan Pengeluaran Mahasiswa</p>
        </div>

<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

        <div class="card shadow-sm border-0">
            <div class="card-body">

<!-- Rekap Pengeluaran Bulanan -->
<div class="card border-0 shadow-sm rounded-4 mb-4">
    <div class="card-body p-4">

        <button class="btn p-0 border-0 bg-transparent fw-bold text-dark text-start"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#isiRekap"
        aria-expanded="false"
        aria-controls="isiRekap">
    Rekap Pengeluaran Bulanan
    <span class="ms-2">⌄</span>
</button>
<div class="collapse <?= (isset($filterSubmitted) && $filterSubmitted) ? 'show' : '' ?>" id="isiRekap">

        <form method="get" action="<?= base_url('pengeluaran') ?>" class="row g-2 mb-4">

            <div class="col-md-5">
                <label class="form-label">Pilih Bulan</label>
                <select name="bulan" class="form-select">
                    <option value="" <?= $bulan === '' ? 'selected' : '' ?>>
                     Semua Bulan
                    </option>
                    <?php for ($i = 1; $i <= 12; $i++) : ?>
                        <option value="<?= sprintf('%02d', $i) ?>"
                            <?= $bulan == sprintf('%02d', $i) ? 'selected' : '' ?>>
                            <?= date('F', mktime(0, 0, 0, $i, 1)) ?>
                        </option>
                    <?php endfor; ?>
                </select>
            </div>

            <div class="col-md-5">
                <label class="form-label">Pilih Tahun</label>
                <select name="tahun" class="form-select">
                    <option value="" <?= $tahun === '' ? 'selected' : '' ?>>
    Semua Tahun
</option>
                    <?php for ($i = date('Y'); $i >= 2020; $i--) : ?>
                        <option value="<?= $i ?>"
                            <?= $tahun == $i ? 'selected' : '' ?>>
                            <?= $i ?>
                        </option>
                    <?php endfor; ?>
                </select>
            </div>

            <div class="col-md-2 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-100">
                    Tampilkan
                </button>
            </div>

        </form>

        <div class="bg-primary-subtle rounded-3 p-3 mb-3">
            <div class="text-muted small">Total Pengeluaran</div>
            <h3 class="fw-bold mb-0">
                Rp <?= number_format($totalBulanan, 0, ',', '.') ?>
            </h3>
        </div>

        <h6 class="fw-bold mb-3">Rincian Berdasarkan Kategori</h6>

        <div class="table-responsive">
            <table class="table table-bordered align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Kategori</th>
                        <th>Total Pengeluaran</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($rekapKategori)) : ?>
                        <?php foreach ($rekapKategori as $kategori => $total) : ?>
                            <tr>
                                <td><?= esc($kategori) ?></td>
                                <td>Rp <?= number_format($total, 0, ',', '.') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="2" class="text-center text-muted">
                                Belum ada pengeluaran pada bulan ini.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
<!-- Akhir Rekap Pengeluaran Bulanan -->

                <div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="fw-bold mb-0">Daftar Pengeluaran</h5>

    <a href="<?= base_url('pengeluaran/tambah') ?>" class="btn btn-primary btn-tambah">
    + Tambah Pengeluaran
</a>
</div>

               <div class="table-responsive">
    <table class="table table-bordered table-striped align-middle">
                        <thead class="table-primary">
                            <tr>
                                <th>No.</th>
                                <th>Tanggal</th>
                                <th>Kategori</th>
                                <th>Keterangan</th>
                                <th>Nominal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if (!empty($pengeluaran)) : ?>
                                <?php $no = 1; ?>
                                <?php foreach ($pengeluaran as $item) : ?>
                                    <tr>
    <td><?= $no++ ?></td>
    <td><?= date('d-m-Y', strtotime($item['tanggal'])) ?></td>
    <td><?= esc($item['kategori']) ?></td>
    <td><?= esc($item['keterangan']) ?></td>
    <td>Rp <?= number_format($item['nominal'], 0, ',', '.') ?></td>
   
<td>
    <div class="d-flex gap-1">
        <a href="<?= base_url('pengeluaran/edit/' . $item['id_pengeluaran']) ?>"
           class="btn btn-warning btn-sm">
            Edit
        </a>

        <button type="button"
        class="btn btn-danger btn-sm"
        data-bs-toggle="modal"
        data-bs-target="#hapusModal"
        data-url="<?= base_url('pengeluaran/hapus/' . $item['id_pengeluaran']) ?>">
    Hapus
</button>
        </form>
    </div>
</td>

                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">
                                        Belum ada data pengeluaran.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const notifikasi = document.querySelector('.alert');

    if (notifikasi) {
        setTimeout(function () {
            const alert = bootstrap.Alert.getOrCreateInstance(notifikasi);
            alert.close();
        }, 3000);
    }
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const hapusModal = document.getElementById('hapusModal');
        const formHapus = document.getElementById('formHapus');

        hapusModal.addEventListener('show.bs.modal', function (event) {
            const tombol = event.relatedTarget;
            const urlHapus = tombol.getAttribute('data-url');

            formHapus.setAttribute('action', urlHapus);
        });
    });
</script>


<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="hapusModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow rounded-4">

            <div class="modal-body text-center p-4">

                <div class="mb-3">
                    <div class="rounded-circle bg-danger-subtle d-inline-flex align-items-center justify-content-center"
                         style="width: 70px; height: 70px;">
                        <span class="text-danger fs-2">!</span>
                    </div>
                </div>

                <h5 class="fw-bold mb-2">Hapus Pengeluaran?</h5>

                <p class="text-muted mb-4">
                    Apakah kamu yakin ingin menghapus data pengeluaran ini?
                    Data yang sudah dihapus tidak dapat dikembalikan.
                </p>

                <div class="d-flex justify-content-center gap-2">
                    <button type="button" class="btn btn-light border px-4"
                            data-bs-dismiss="modal">
                        Batal
                    </button>

                    <form id="formHapus" method="post">
                        <?= csrf_field() ?>

                        <button type="submit" class="btn btn-danger px-4">
                            Ya, Hapus
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

</body>
</html>
