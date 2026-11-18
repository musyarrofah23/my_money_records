
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

                <h5 class="fw-bold mb-4">Tambah Pengeluaran</h5>

                <form action="<?= base_url('pengeluaran/simpan') ?>" method="post">

                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label class="form-label">
    Tanggal Pengeluaran<span class="text-danger">*</span>
</label>
                        <input type="date" name="tanggal" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
    Kategori Pengeluaran<span class="text-danger">*</span>
</label>
                        <select name="kategori" id="kategori" class="form-select" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="Makanan">Makanan</option>
                            <option value="Transportasi">Transportasi</option>
                            <option value="Pendidikan">Pendidikan</option>
                            <option value="Hiburan">Hiburan</option>
                            <option value="Kesehatan">Kesehatan</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>

                    <div class="mb-3" id="kategoriLainnya" style="display: none;">
                        <label class="form-label">
    Tulis Keterangan Lainnya<span class="text-danger">*</span>
</label>
                        <input type="text" name="kategori_lainnya" id="kategori_lainnya"
                            class="form-control" placeholder="Contoh: Kebutuhan Kos">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Keterangan</label>
                        <textarea name="keterangan" class="form-control" rows="3"
                            placeholder="Contoh: Membeli Makanan"></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">
    Nominal (Rp)<span class="text-danger">*</span>
</label>
                        <input type="number" name="nominal" class="form-control"
                            min="1" step="1" placeholder="Contoh: 15000" required>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Simpan Pengeluaran
                    </button>

                    <a href="<?= base_url('pengeluaran') ?>" class="btn btn-secondary">
                        Kembali
                    </a>

                </form>

            </div>
        </div>

    </div>

    <script>
        const kategori = document.getElementById('kategori');
        const kategoriLainnya = document.getElementById('kategoriLainnya');
        const inputLainnya = document.getElementById('kategori_lainnya');

        kategori.addEventListener('change', function () {
            if (this.value === 'Lainnya') {
                kategoriLainnya.style.display = 'block';
                inputLainnya.required = true;
            } else {
                kategoriLainnya.style.display = 'none';
                inputLainnya.required = false;
                inputLainnya.value = '';
            }
        });
    </script>

</body>
</html>
