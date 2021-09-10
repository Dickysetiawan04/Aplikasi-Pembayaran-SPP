<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

use App\Models\Siswa;
use App\Models\User;



use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        /// mengambil data terakhir dan pagination 5 list
        $siswa = Siswa::latest()->paginate(5);
         
        /// mengirimkan variabel $users ke halaman views users/index.blade.php
        /// include dengan number index
        return view('siswas.index',compact('siswa'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        /// menampilkan halaman create
        return view('siswas.create');
    }

    // public function store(Request $request)
    // {
    //     /// membuat validasi untuk title dan content wajib diisi
    //     $request->validate([
    //         'nisn ' => 'nullable',
    //         'name' => 'nullable',
    //         'no_telpon' => 'required',
    //         'foto' => 'nullable',
    //         'tingkat' => 'required',
    //         'jurusan' => 'required',
    //         'kelas' => 'required',
    //         'email' => 'required',
    //         'password' => 'required',
    //     ]);
         
    //     /// insert setiap request dari form ke dalam database via model
    //     /// jika menggunakan metode ini, maka nama field dan nama form harus sama
    //     Siswa::create($request->all());
         
    //     /// redirect jika sukses menyimpan data
        
    // }


    // 2 tabel
    public function store(Request $request)
    {
        $foto = $request->foto;
        $new_foto = "spp". "_" . $foto->getClientOriginalName();
        Siswa::create([
            'nisn' => $request->nisn,
            'name' => $request->name,
            'no_telpon' => $request->no_telpon,
            'foto' => 'foto/' . $new_foto,
            'tingkat' => $request->tingkat,
            'jurusan' => $request->jurusan,
            'kelas' => $request->kelas,
            'role' => $request->role,
            'email' => $request->email,
            // 'password' => $request->password,
            'password' => Hash::make($request->password),
        ]);

        $foto->move('foto/', $new_foto);

        return redirect()->route('siswas.index')
                            ->with('success','siswa updated successfully');
                         

    }
    

    public function show(Siswa $siswa)
    {
        return view('siswas.show',compact('siswa'));
    }

    public function edit(Siswa $siswa)
    {
        return view('siswas.edit',compact('siswa'));
    }



    
    // Edit 2 tabel
    public function update(Request $request, $id)
    {
        if($request->foto){
            $foto = $request->foto;
            $new_foto = "Takola". "_" . $foto->getClientOriginalName();
            $siswa = Siswa::findorfail($id);
            
                $siswa->update([
                    'nisn' => $request->nisn,
                    'name' => $request->name,
                    'no_telpon' => $request->no_telpon,
                    'foto' => 'foto/' . $new_foto,
                    'tingkat' => $request->tingkat,
                    'jurusan' => $request->jurusan,
                    'kelas' => $request->kelas,
                    'email' => $request->email,
                    // 'password' => $request->password,
                    'password' => Hash::make($request->password),
                ]);
                $foto->move('foto/', $new_foto);
        } else{
                $siswa = Siswa::findorfail($id);
                    $siswa->update([
                        'nisn' => $request->nisn,
                        'name' => $request->name,
                        'no_telpon' => $request->no_telpon,
                        'tingkat' => $request->tingkat,
                        'jurusan' => $request->jurusan,
                        'kelas' => $request->kelas,
                        'email' => $request->email,
                        // 'password' => $request->password,
                        'password' => Hash::make($request->password),
                    ]);
        }
        
        return redirect()->route('siswas.index')
                            ->with('success','siswa updated successfully');
    }
    

    // public function update(Request $request, Siswa $siswa)
    // {
    //     /// membuat validasi untuk title dan content wajib diisi
    //     $request->validate([
    //         'nisn ' => 'required',
    //         'name' => 'required',
    //         'no_telpon' => 'required',
    //         'foto' => 'nullable',
    //         'tingkat' => 'required',
    //         'jurusan' => 'required',
    //         'kelas' => 'required',
    //         'email' => 'required',
    //         'password' => 'required',
    //     ]);

    //     /// mengubah data berdasarkan request dan parameter yang dikirimkan
    //     $siswa->update($request->all());
         
    //     /// setelah berhasil mengubah data
    //     return redirect()->route('siswas.index')
    //                     ->with('success','siswa updated successfully');
    // }

    public function destroy(Request $request, $id)
    {
        /// melakukan hapus data berdasarkan parameter yang dikirimkan
        $siswa = Siswa::findorfail($id);
        $siswa->delete();
        return redirect()->route('siswas.index')
                        ->with('success','siswa deleted successfully');
    }


    // untuk 2 tabel
    
}
