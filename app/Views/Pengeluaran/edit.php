
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($judul) ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5">

        <div class="mb-4">
            <h2 class="fw-bold">My Money Records</h2>
            <p class="text-muted">Aplikasi Pencatatan Pengeluaran Mahasiswa</p>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body p-4">

                <h5 class="fw-bold mb-4">Edit Pengeluaran</h5>

                <form action="<?= base_url('pengeluaran/update/' . $pengeluaran['id_pengeluaran']) ?>" method="post">

                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label class="form-label">
                            Tanggal Pengeluaran<span class="text-danger">*</span>
                        </label>
                        <input type="date" name="tanggal" class="form-control"
                            value="<?= esc($pengeluaran['tanggal']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Kategori Pengeluaran<span class="text-danger">*</span>
                        </label>
                        <input type="text" name="kategori" class="form-control"
                            value="<?= esc($pengeluaran['kategori']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <textarea name="keterangan" class="form-control" rows="3" permit_empty><?= esc($pengeluaran['keterangan']) ?></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">
                            Nominal (Rp)<span class="text-danger">*</span>
                        </label>
                        <input type="number" name="nominal" class="form-control"
                            min="1" step="1" value="<?= esc($pengeluaran['nominal']) ?>" required>
                    </div>

                    <p class="text-muted small mb-3">
                        <span class="text-danger">*</span> Wajib diisi
                    </p>

                    <button type="submit" class="btn btn-primary">
                        Simpan Perubahan
                    </button>

                    <a href="<?= base_url('pengeluaran') ?>" class="btn btn-secondary">
                        Kembali
                    </a>

                </form>

            </div>
        </div>

    </div>

</body>
</html>
