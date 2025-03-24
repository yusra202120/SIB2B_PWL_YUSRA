<?php

namespace App\Http\Controllers;
use App\Models\LevelModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class LevelController extends Controller
{
    // Menampilkan halaman awal Level
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Level Pengguna',
            'list'  => ['Home', 'Level']
        ];

        $page = (object) [
            'title' => 'Daftar Level Pengguna dalam Sistem'
        ];

        $activeMenu = 'level';

        return view('level.index', [
            'breadcrumb' => $breadcrumb,
            'page'       => $page,
            'activeMenu' => $activeMenu
        ]);
    }

    // Ambil data level dalam bentuk json untuk DataTables
    public function list(Request $request)
    {
        $data = LevelModel::query();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('aksi', function ($row) {
                return '
                    <a href="' . url('/level/' . $row->level_id) . '" class="btn btn-sm btn-info">Detail</a>
                    <a href="'.url('/level/'.$row->level_id.'/edit').'" class="btn btn-sm btn-warning">Edit</a>
                    <form action="'.url('/level/'.$row->level_id).'" method="POST" style="display:inline;">
                        '.csrf_field().method_field('DELETE').'
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm(\'Yakin hapus level ini?\')">Hapus</button>
                    </form>';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }


        public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Level',
            'list'  => ['Home', 'Level', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah level pengguna baru'
        ];

        $activeMenu = 'level'; // aktifkan menu level

        return view('level.create', [
            'breadcrumb' => $breadcrumb,
            'page'       => $page,
            'activeMenu' => $activeMenu
        ]);

        
    }

    public function store(Request $request)
    {
        $request->validate([
            'level_kode' => 'required|string|unique:m_level,level_kode',
            'level_nama' => 'required|string|max:100'
        ]);

        LevelModel::create([
            'level_kode' => $request->level_kode,
            'level_nama' => $request->level_nama
        ]);

        return redirect('/level')->with('success', 'Data level berhasil disimpan');
    }

    public function show(string $id)
    {
        $level = LevelModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Level',
            'list'  => ['Home', 'Level User', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail level pengguna'
        ];

        $activeMenu = 'level'; // set menu yang sedang aktif

        return view('level.show', [
            'breadcrumb' => $breadcrumb,
            'page'       => $page,
            'level'      => $level,
            'activeMenu' => $activeMenu
        ]);
    }

    public function edit(string $id)
{
    $level = LevelModel::find($id);

    $breadcrumb = (object) [
        'title' => 'Edit Level',
        'list' => ['Home', 'Level', 'Edit']
    ];

    $page = (object) [
        'title' => 'Edit level'
    ];

    $activeMenu = 'level'; // set menu aktif

    return view('level.edit', [
        'breadcrumb' => $breadcrumb,
        'page' => $page,
        'level' => $level,
        'activeMenu' => $activeMenu
    ]);
}

public function update(Request $request, string $id)
{
    $request->validate([
        'level_kode' => 'required|string|min:2|unique:m_level,level_kode,' . $id . ',level_id',
        'level_nama' => 'required|string|max:100'
    ]);

    LevelModel::find($id)->update([
        'level_kode' => $request->level_kode,
        'level_nama' => $request->level_nama
    ]);

    return redirect('/level')->with('success', 'Data level berhasil diubah');
}

public function destroy(string $id)
{
    $check = LevelModel::find($id);

    if (!$check) {
        return redirect('/level')->with('error', 'Data level tidak ditemukan');
    }

    try {
        LevelModel::destroy($id);
        return redirect('/level')->with('success', 'Data level berhasil dihapus');
    } catch (\Illuminate\Database\QueryException $e) {
        return redirect('/level')->with('error', 'Data level gagal dihapus karena masih terdapat data lain yang terkait');
    }
}








}
