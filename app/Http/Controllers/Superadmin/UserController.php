<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Aset;
use App\Models\Merk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\Datatables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::select('id','name', 'email', 'username')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editUrl = route('super-admin.user.edit', $row->id); // pastikan route butuh parameter id
                    $deleteUrl = route('super-admin.user.destroy', $row->id); // pastikan route butuh parameter id
                    $btn = '
                            <div class="flex space-x-4">
                                <a href="' . $editUrl . '" class="btn btn-outline-warning btn-sm"><i class="bi bi-pencil-fill"></i></a>
                                <form method="POST" action="' . $deleteUrl . '" style="display:inline;" onsubmit="return confirm(\'Yakin ingin menghapus?\');">
                                    ' . csrf_field() . method_field('DELETE') . '
                                    <button type="submit" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash-fill"></i></button>
                                </form>
                            </div>
                                ';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('super-admin.user.index');
    }

    public function getData(Request $request)
    {
        // $data = User::select('name', 'email', 'username')->get();
        $data = Aset::select('*')->get();

        return response()->json($data);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('super-admin.user.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'username' => ['required', 'string', 'max:255', 'unique:users'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'confirmed', 'max:255'],
            ]);

            User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return redirect()->route('super-admin.user.index')->with('success', 'User created successfully!');
        } catch (\Exception $e) {
            return redirect()->route('super-admin.user.create')->with('error', $e->getMessage())->withInput();
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('super-admin.user.show', compact('user'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('super-admin.user.edit', compact('user'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'username' => 'required|string|max:255|unique:users,username,' . $id,
                'email' => 'required|email|max:255|unique:users,email,' . $id,
                'password' => 'required|string|confirmed|max:255',
            ]);
    
            $user = User::findOrFail($id);
            $user->update($request->all());
    
            return redirect()->route('super-admin.user.index')->with('success', 'pengguna berhasil diperbarui!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('super-admin.user.index')->with('success', 'Pengguna berhasil dihapus!');
    }
}
