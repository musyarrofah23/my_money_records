<?php
namespace App\Controllers;

use App\Models\PengeluaranModel;

class Pengeluaran extends BaseController
{
    protected $pengeluaranModel;

    public function __construct()
    {
        $this->pengeluaranModel = new PengeluaranModel();
    }

    public function create()
    {
    $data = [
        'judul' => 'Tambah Pengeluaran'
    ];

    return view('pengeluaran/create', $data);
    }


public function save()
{
    $kategori = $this->request->getPost('kategori');

    if ($kategori === 'Lainnya') {
        $kategori = trim($this->request->getPost('kategori_lainnya'));
    }

    $data = [
        'tanggal'    => $this->request->getPost('tanggal'),
        'kategori'   => $kategori,
        'keterangan' => $this->request->getPost('keterangan'),
        'nominal'    => $this->request->getPost('nominal')
    ];

    $this->pengeluaranModel->insert($data);

    return redirect()->to('/pengeluaran')
        ->with('success', 'Pengeluaran berhasil ditambahkan!');
}


public function edit($id)
{
    $dataPengeluaran = $this->pengeluaranModel->find($id);

    if (!$dataPengeluaran) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
            'Data pengeluaran tidak ditemukan.'
        );
    }

    $data = [
        'judul' => 'Edit Pengeluaran',
        'pengeluaran' => $dataPengeluaran
    ];

    return view('pengeluaran/edit', $data);
}



public function update($id)
{
    $data = [
        'tanggal'    => $this->request->getPost('tanggal'),
        'kategori'   => trim($this->request->getPost('kategori') ?? ''),
        'keterangan' => trim($this->request->getPost('keterangan') ?? ''),
        'nominal'    => $this->request->getPost('nominal')
    ];

    $rules = [
        'tanggal'    => 'required|valid_date[Y-m-d]',
        'kategori'   => 'required|max_length[50]',
        'keterangan' => 'permit_empty',
        'nominal'    => 'required|decimal|greater_than[0]'
    ];

    if (!$this->validateData($data, $rules)) {
        return redirect()->back()
            ->withInput()
            ->with('errors', $this->validator->getErrors());
    }

    $pengeluaran = $this->pengeluaranModel->find($id);

    if (!$pengeluaran) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
            'Data pengeluaran tidak ditemukan.'
        );
    }

    $this->pengeluaranModel->update($id, $data);

    return redirect()->to(base_url('pengeluaran'))
        ->with('success', 'Data pengeluaran berhasil diperbarui!');
}

    
public function index()
{
    // Mengambil semua data pengeluaran
    $pengeluaran = $this->pengeluaranModel
        ->orderBy('tanggal', 'DESC')
        ->findAll();

    // Mengambil bulan dan tahun yang dipilih
    $bulan = $this->request->getGet('bulan') ?? '';
    $tahun = $this->request->getGet('tahun') ?? '';
    $filterSubmitted = $this->request->getGet('bulan') !== null
    || $this->request->getGet('tahun') !== null;

    // Memeriksa pilihan bulan dan tahun
   if ($bulan !== '' && (!ctype_digit((string) $bulan) || (int) $bulan < 1 || (int) $bulan > 12)) {
    $bulan = '';
}

if ($tahun !== '' && (!ctype_digit((string) $tahun) || (int) $tahun < 2000 || (int) $tahun > 2100)) {
    $tahun = '';
}

    $kategoriTetap = [
        'Makanan',
        'Transportasi',
        'Pendidikan',
        'Hiburan',
        'Kesehatan'
    ];

    $rekapKategori = [];
    $totalBulanan = 0;

    // Menghitung pengeluaran berdasarkan kategori
    foreach ($pengeluaran as $item) {
        $tanggal = strtotime($item['tanggal']);

       if (
    ($bulan === '' || date('m', $tanggal) == $bulan) &&
    ($tahun === '' || date('Y', $tanggal) == $tahun)
) {
         $kategori = $item['kategori'];

            // Kategori tambahan digabung ke Lainnya
            if (!in_array($kategori, $kategoriTetap)) {
                $kategori = 'Lainnya';
            }

            if (!isset($rekapKategori[$kategori])) {
                $rekapKategori[$kategori] = 0;
            }

            $rekapKategori[$kategori] += (float) $item['nominal'];
            $totalBulanan += (float) $item['nominal'];
        }
    }

    $data = [
        'judul' => 'CatatUang - Daftar Pengeluaran',
        'pengeluaran' => $pengeluaran,
        'bulan' => $bulan,
        'tahun' => $tahun,
        'rekapKategori' => $rekapKategori,
        'totalBulanan' => $totalBulanan,
        'filterSubmitted' => $filterSubmitted
    ];

       return view('pengeluaran/index', $data);
}

// Function untuk menghapus pengeluaran
public function delete($id)
{
    $pengeluaran = $this->pengeluaranModel->find($id);

    if (!$pengeluaran) {
        return redirect()->to('/pengeluaran')
            ->with('error', 'Data pengeluaran tidak ditemukan.');
    }

    $this->pengeluaranModel->delete($id);

    return redirect()->to('/pengeluaran')
        ->with('success', 'Data pengeluaran berhasil dihapus.');
}

}

