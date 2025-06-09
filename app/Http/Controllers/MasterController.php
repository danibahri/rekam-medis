<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterAgama;
use App\Models\MasterCaraPembayaran;
use App\Models\MasterJenisKelamin;
use App\Models\MasterObat;
use App\Models\MasterPekerjaan;
use App\Models\MasterPendidikan;
use App\Models\MasterStatusPernikahan;
use SweetAlert2\Laravel\Swal;

class MasterController extends Controller
{
    // Master Agama CRUD
    public function agama()
    {
        $data = MasterAgama::all();
        return view('pages.master.agama.index', compact('data'));
    }

    public function agama_create()
    {
        return view('pages.master.agama.create');
    }

    public function agama_store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:50'
        ]);

        // generate unique ID for agama
        $id = MasterAgama::max('id') + 1;
        MasterAgama::create($request->all() + ['id' => $id]);

        Swal::success([
            'title' => 'Success',
            'text' => 'Data agama berhasil ditambahkan',
            'icon' => 'success'
        ]);

        return redirect()->route('master.agama');
    }

    public function agama_edit($id)
    {
        $data = MasterAgama::findOrFail($id);
        return view('pages.master.agama.edit', compact('data'));
    }

    public function agama_update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:50'
        ]);

        $data = MasterAgama::findOrFail($id);
        $data->update($request->only(['nama']));

        Swal::success([
            'title' => 'Success',
            'text' => 'Data agama berhasil diupdate',
            'icon' => 'success'
        ]);

        return redirect()->route('master.agama');
    }

    public function agama_destroy($id)
    {
        try {
            $data = MasterAgama::findOrFail($id);
            $data->delete();

            Swal::success([
                'title' => 'Success',
                'text' => 'Data agama berhasil dihapus',
                'icon' => 'success'
            ]);
        } catch (\Exception $e) {
            Swal::error([
                'title' => 'Error',
                'text' => 'Data tidak dapat dihapus karena masih digunakan',
                'icon' => 'error'
            ]);
        }

        return redirect()->route('master.agama');
    }

    // Master Cara Pembayaran CRUD
    public function cara_pembayaran()
    {
        $data = MasterCaraPembayaran::all();
        return view('pages.master.cara-pembayaran.index', compact('data'));
    }

    public function cara_pembayaran_create()
    {
        return view('pages.master.cara-pembayaran.create');
    }

    public function cara_pembayaran_store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:50'
        ]);

        // generate unique ID for cara pembayaran
        $id = MasterCaraPembayaran::max('id') + 1;
        MasterCaraPembayaran::create($request->all() + ['id' => $id]);

        Swal::success([
            'title' => 'Success',
            'text' => 'Data cara pembayaran berhasil ditambahkan',
            'icon' => 'success'
        ]);

        return redirect()->route('master.cara-pembayaran');
    }

    public function cara_pembayaran_edit($id)
    {
        $data = MasterCaraPembayaran::findOrFail($id);
        return view('pages.master.cara-pembayaran.edit', compact('data'));
    }

    public function cara_pembayaran_update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:50'
        ]);

        $data = MasterCaraPembayaran::findOrFail($id);
        $data->update($request->only(['nama']));

        Swal::success([
            'title' => 'Success',
            'text' => 'Data cara pembayaran berhasil diupdate',
            'icon' => 'success'
        ]);

        return redirect()->route('master.cara-pembayaran');
    }

    public function cara_pembayaran_destroy($id)
    {
        try {
            $data = MasterCaraPembayaran::findOrFail($id);
            $data->delete();

            Swal::success([
                'title' => 'Success',
                'text' => 'Data cara pembayaran berhasil dihapus',
                'icon' => 'success'
            ]);
        } catch (\Exception $e) {
            Swal::error([
                'title' => 'Error',
                'text' => 'Data tidak dapat dihapus karena masih digunakan',
                'icon' => 'error'
            ]);
        }

        return redirect()->route('master.cara-pembayaran');
    }

    // Master Jenis Kelamin CRUD
    public function jenis_kelamin()
    {
        $data = MasterJenisKelamin::all();
        return view('pages.master.jenis-kelamin.index', compact('data'));
    }

    public function jenis_kelamin_create()
    {
        return view('pages.master.jenis-kelamin.create');
    }

    public function jenis_kelamin_store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:50'
        ]);

        // generate unique ID for jenis kelamin
        $id = MasterJenisKelamin::max('id') + 1;
        MasterJenisKelamin::create($request->all() + ['id' => $id]);

        Swal::success([
            'title' => 'Success',
            'text' => 'Data jenis kelamin berhasil ditambahkan',
            'icon' => 'success'
        ]);

        return redirect()->route('master.jenis-kelamin');
    }

    public function jenis_kelamin_edit($id)
    {
        $data = MasterJenisKelamin::findOrFail($id);
        return view('pages.master.jenis-kelamin.edit', compact('data'));
    }

    public function jenis_kelamin_update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:50'
        ]);

        $data = MasterJenisKelamin::findOrFail($id);
        $data->update($request->only(['nama']));

        Swal::success([
            'title' => 'Success',
            'text' => 'Data jenis kelamin berhasil diupdate',
            'icon' => 'success'
        ]);

        return redirect()->route('master.jenis-kelamin');
    }

    public function jenis_kelamin_destroy($id)
    {
        try {
            $data = MasterJenisKelamin::findOrFail($id);
            $data->delete();

            Swal::success([
                'title' => 'Success',
                'text' => 'Data jenis kelamin berhasil dihapus',
                'icon' => 'success'
            ]);
        } catch (\Exception $e) {
            Swal::error([
                'title' => 'Error',
                'text' => 'Data tidak dapat dihapus karena masih digunakan',
                'icon' => 'error'
            ]);
        }

        return redirect()->route('master.jenis-kelamin');
    }

    // Master Pekerjaan CRUD
    public function pekerjaan()
    {
        $data = MasterPekerjaan::all();
        return view('pages.master.pekerjaan.index', compact('data'));
    }

    public function pekerjaan_create()
    {
        return view('pages.master.pekerjaan.create');
    }

    public function pekerjaan_store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:50'
        ]);

        // generate unique ID for pekerjaan
        $id = MasterPekerjaan::max('id') + 1;
        MasterPekerjaan::create($request->all() + ['id' => $id]);

        Swal::success([
            'title' => 'Success',
            'text' => 'Data pekerjaan berhasil ditambahkan',
            'icon' => 'success'
        ]);

        return redirect()->route('master.pekerjaan');
    }

    public function pekerjaan_edit($id)
    {
        $data = MasterPekerjaan::findOrFail($id);
        return view('pages.master.pekerjaan.edit', compact('data'));
    }

    public function pekerjaan_update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:50'
        ]);

        $data = MasterPekerjaan::findOrFail($id);
        $data->update($request->only(['nama']));

        Swal::success([
            'title' => 'Success',
            'text' => 'Data pekerjaan berhasil diupdate',
            'icon' => 'success'
        ]);

        return redirect()->route('master.pekerjaan');
    }

    public function pekerjaan_destroy($id)
    {
        try {
            $data = MasterPekerjaan::findOrFail($id);
            $data->delete();

            Swal::success([
                'title' => 'Success',
                'text' => 'Data pekerjaan berhasil dihapus',
                'icon' => 'success'
            ]);
        } catch (\Exception $e) {
            Swal::error([
                'title' => 'Error',
                'text' => 'Data tidak dapat dihapus karena masih digunakan',
                'icon' => 'error'
            ]);
        }

        return redirect()->route('master.pekerjaan');
    }

    // Master Pendidikan CRUD
    public function pendidikan()
    {
        $data = MasterPendidikan::all();
        return view('pages.master.pendidikan.index', compact('data'));
    }

    public function pendidikan_create()
    {
        return view('pages.master.pendidikan.create');
    }

    public function pendidikan_store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:50'
        ]);

        // generate unique ID for pendidikan
        $id = MasterPendidikan::max('id') + 1;
        MasterPendidikan::create($request->all() + ['id' => $id]);

        Swal::success([
            'title' => 'Success',
            'text' => 'Data pendidikan berhasil ditambahkan',
            'icon' => 'success'
        ]);

        return redirect()->route('master.pendidikan');
    }

    public function pendidikan_edit($id)
    {
        $data = MasterPendidikan::findOrFail($id);
        return view('pages.master.pendidikan.edit', compact('data'));
    }

    public function pendidikan_update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:50'
        ]);

        $data = MasterPendidikan::findOrFail($id);
        $data->update($request->only(['nama']));

        Swal::success([
            'title' => 'Success',
            'text' => 'Data pendidikan berhasil diupdate',
            'icon' => 'success'
        ]);

        return redirect()->route('master.pendidikan');
    }

    public function pendidikan_destroy($id)
    {
        try {
            $data = MasterPendidikan::findOrFail($id);
            $data->delete();

            Swal::success([
                'title' => 'Success',
                'text' => 'Data pendidikan berhasil dihapus',
                'icon' => 'success'
            ]);
        } catch (\Exception $e) {
            Swal::error([
                'title' => 'Error',
                'text' => 'Data tidak dapat dihapus karena masih digunakan',
                'icon' => 'error'
            ]);
        }

        return redirect()->route('master.pendidikan');
    }

    // Master Status Pernikahan CRUD
    public function status_pernikahan()
    {
        $statusPernikahan = MasterStatusPernikahan::all();
        return view('pages.master.status-pernikahan.index', compact('statusPernikahan'));
    }

    public function status_pernikahan_create()
    {
        return view('pages.master.status-pernikahan.create');
    }

    public function status_pernikahan_store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:50'
        ]);

        // generate unique ID for status pernikahan
        $id = MasterStatusPernikahan::max('id') + 1;
        MasterStatusPernikahan::create($request->all() + ['id' => $id]);
        // Show success message
        Swal::success([
            'title' => 'Success',
            'text' => 'Data status pernikahan berhasil ditambahkan',
            'icon' => 'success'
        ]);
        return redirect()->route('master.status-pernikahan')->with('success', 'Data status pernikahan berhasil ditambahkan');
    }

    public function status_pernikahan_edit($id)
    {
        $statusPernikahan = MasterStatusPernikahan::findOrFail($id);
        return view('pages.master.status-pernikahan.edit', compact('statusPernikahan'));
    }

    public function status_pernikahan_update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:50'
        ]);

        $statusPernikahan = MasterStatusPernikahan::findOrFail($id);
        $statusPernikahan->update($request->only(['nama']));

        // Show success message
        Swal::success([
            'title' => 'Success',
            'text' => 'Data status pernikahan berhasil diupdate',
            'icon' => 'success'
        ]);
        return redirect()->route('master.status-pernikahan')->with('success', 'Data status pernikahan berhasil diupdate');
    }

    public function status_pernikahan_destroy($id)
    {
        try {
            $statusPernikahan = MasterStatusPernikahan::findOrFail($id);
            $statusPernikahan->delete();
            // Show success message
            Swal::success([
                'title' => 'Success',
                'text' => 'Data status pernikahan berhasil dihapus',
                'icon' => 'success'
            ]);
            return redirect()->route('master.status-pernikahan')->with('success', 'Data status pernikahan berhasil dihapus');
        } catch (\Exception $e) {
            // Show error message
            Swal::error([
                'title' => 'Error',
                'text' => 'Data tidak dapat dihapus karena masih digunakan',
                'icon' => 'error'
            ]);
            return redirect()->route('master.status-pernikahan')->with('error', 'Data tidak dapat dihapus karena masih digunakan');
        }
    }
}
