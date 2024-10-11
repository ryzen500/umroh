<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Umroh;
use App\Models\Paket;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use PDF;


class UmrohController extends Controller
{

    public function index(Request $request)
    {
        if ($request->has('search')) {
            // pencarian
            $keyword = $request->search;
            $umroh = Umroh::where('nik', 'like', "%" . $keyword . "%")->paginate(1); 
        } else {
            $umroh = Umroh::select('nama', 'nik', 'calon_jamaah', 'pembimbing', 'keberangkatan', 'foto', 'id')
                ->latest()->paginate(5);
        }

        return view('admin.index', compact('umroh'));
    }

    public function create()
    {

              // Mengambil semua data paket
        $paketList = Paket::all();
        return view('admin.create', compact('paketList'));
    }


public function store(Request $request)
{
    try {
        // Log request data untuk debugging

        // dd($request->all());die;
        Log::info('Request data: ', $request->all());

        $this->validate($request, [
            'nik' => 'required|numeric|digits:16|unique:umrohs,nik',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'calon_jamaah' => 'required',
            'pembimbing' => 'required',
            'keberangkatan' => 'required|date',
            'pekerjaan' => 'required',
            'no_paspor' => 'nullable|numeric',
            'masa_berlaku_paspor' => 'nullable|date',
            'no_visa' => 'nullable|numeric',
            'berlaku_sampai' => 'nullable|date',
            'paket' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'lampiran_ktp' => 'nullable|file|mimes:jpeg,png,pdf|max:2048',
            'lampiran_kk' => 'nullable|file|mimes:jpeg,png,pdf|max:2048',
            'lampiran_paspor' => 'nullable|file|mimes:jpeg,png,pdf|max:2048',
        ]);

        // Simpan data ke database
        $umroh = new Umroh($request->except(['foto', 'lampiran_ktp', 'lampiran_kk', 'lampiran_paspor']));
        $umroh->save();

        session()->flash('success', 'Data umroh berhasil ditambah.');
        return redirect()->route('umroh.index');

    } catch (ValidationException $e) {
        // Jika validasi gagal
        Log::error('Validasi gagal: ', $e->errors());
        return redirect()->back()->withErrors($e->validator)->withInput();
    } catch (\Exception $e) {
        // Jika terjadi kesalahan umum
        Log::error('Error saat menyimpan data: ' . $e->getMessage());

        var_dump($e->getMessage());die;
                dd($request->all());die;

        session()->flash('error', 'Terjadi kesalahan saat menambah data umroh: ' . $e->getMessage());
        return redirect()->back()->withInput();
    }
}

    public function edit($id)
    {
        $umroh = Umroh::find($id);
         $paketList = Paket::all();
        return view('admin.edit', compact('umroh','paketList'));
    }
public function update(Request $request, $id)
{
    try {
        // Log request data untuk debugging
        Log::info('Request data: ', $request->all());

        $this->validate($request, [
            'nik' => 'required|numeric|digits:16|unique:umrohs,nik,' . $id,  // Ignore unique constraint for current ID
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'calon_jamaah' => 'required',
            'pembimbing' => 'required',
            'keberangkatan' => 'required|date',
            'pekerjaan' => 'required',
            'no_paspor' => 'nullable|numeric',
            'masa_berlaku_paspor' => 'nullable|date',
            'no_visa' => 'nullable|numeric',
            'berlaku_sampai' => 'nullable|date',
            'paket' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'lampiran_ktp' => 'nullable|file|mimes:jpeg,png,pdf|max:2048',
            'lampiran_kk' => 'nullable|file|mimes:jpeg,png,pdf|max:2048',
            'lampiran_paspor' => 'nullable|file|mimes:jpeg,png,pdf|max:2048',
        ]);

        $umroh = Umroh::find($id);

        if (!$umroh) {
            return redirect()->route('umroh.index')->with('error', 'Data umroh tidak ditemukan.');
        }

        // Handle file uploads and update or delete previous files
        if ($request->hasFile('foto')) {
            // Delete old file if exists
            if ($umroh->foto && file_exists(public_path('uploads/' . $umroh->foto))) {
                unlink(public_path('uploads/' . $umroh->foto));
            }

            // Store new file
            $fileName = time() . '_' . $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(public_path('uploads'), $fileName);
            $umroh->foto = $fileName;
        }

        // Same logic for other file fields (lampiran_ktp, lampiran_kk, lampiran_paspor)
        // Example for lampiran_ktp:
        if ($request->hasFile('lampiran_ktp')) {
            if ($umroh->lampiran_ktp && file_exists(public_path('uploads/' . $umroh->lampiran_ktp))) {
                unlink(public_path('uploads/' . $umroh->lampiran_ktp));
            }

            $ktpFileName = time() . '_' . $request->file('lampiran_ktp')->getClientOriginalName();
            $request->file('lampiran_ktp')->move(public_path('uploads'), $ktpFileName);
            $umroh->lampiran_ktp = $ktpFileName;
        }

        // Update other fields
        $umroh->update($request->except(['foto', 'lampiran_ktp', 'lampiran_kk', 'lampiran_paspor']));
    
          Log::info('Data setelah update: ', $umroh->fresh()->toArray());

        session()->flash('success', 'Data umroh berhasil diupdate.');
        return redirect()->route('umroh.index');
    } catch (ValidationException $e) {
        // Jika validasi gagal
        Log::error('Validasi gagal: ', $e->errors());
        return redirect()->back()->withErrors($e->validator)->withInput();
    } catch (\Exception $e) {
        // Jika terjadi kesalahan umum
        Log::error('Error saat menyimpan data: ' . $e->getMessage());
        session()->flash('error', 'Terjadi kesalahan saat mengupdate data umroh: ' . $e->getMessage());
        return redirect()->back()->withInput();
    }
}



    public function delete(Request $request, string $id)
    {
        $umroh = Umroh::find($id);

        if (!$umroh) {
            return response()->json(['error' => 'Umroh not found'], 404);
        }

        if ($umroh->foto) { 
            $path = 'assets/uploads/foto/'.$umroh->foto;
            if (File::exists($path)) {
                if (!File::delete($path)) {
                    return response()->json(['error' => 'Failed to delete photo file'], 500);
                }
            }
        }

        if (!$umroh->delete()) {
            return response()->json(['error' => 'Failed to delete umroh record'], 500);
        }

        return response()->json(['success' => 'Umroh successfully deleted'], 200);
    }


    public function math()
    {
        $totalUmroh = Umroh::count();
        $totalUser = User::count();

        return view('admin.admin', compact('totalUmroh', 'totalUser'));
    }

    public function view($id)
    {
        $umroh = Umroh::find($id);
        return view('admin.view', compact('umroh'));
    }

    function cetak()
    {
        $umroh = Umroh::all();

        view()->share('umroh', $umroh);
        $pdf = PDF::loadview('admin.pdf');
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download('data.pdf');
    }
}