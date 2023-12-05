<?php

namespace App\Http\Controllers;

use App\Models\Lokasigambar;
use App\Models\Sertifikat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class SertifikatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $sertifikats = Sertifikat::all();
        return view('sertifikat.index', compact('sertifikats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //create
        return view('sertifikat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //store

        // dd($request->all());



        $sertifikat = new Sertifikat($request->all());



        $image = $request->file('gambar');
        $imagePath = $image->store('sertifikat', 'public');

        // Save the image path to the database or perform any other operations

        // Example: Saving the image path to a model attribute
        $sertifikat->gambar = $imagePath;


        $sertifikat->save();

        $sertifikat->lokasigambar()->create([
            'text' => 'nama nama nama nama',
            'x' => '0',
            'y' => '0',
            'font' => '150px Arial',
            'color' => '#000',
            'xSebagai' => '0',
            'ySebagai' => '200',
            'xQR' => '0',
            'yQR' => '0',
            'fontSebagai' => '150px Arial',
            'colorSebagai' => '#000',
            'ukuranQR' => '1',
            'fontUrl' => '-',
            'multiple' => '-',
            'sertifikat_id' => $sertifikat->id
        ]);


        return redirect('/sertifikat')->with('success', 'Sertifikat stored successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sertifikat $sertifikat)
    {
        //
        return view('sertifikat.show', [
            'sertifikat' => $sertifikat
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sertifikat $sertifikat)
    {
        //

        $sebagai = 'sebagai';
       
        // dd($multiple['text']);
        return view('sertifikat.edit', [
            'sertifikat' => $sertifikat,
            'sebagai' => $sebagai,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sertifikat $sertifikat)
    {

        //

        $multiple = json_encode($request->multiple);



        $lokasigambar = $request;
        $lokasigambar['multiple'] = $multiple;
        $lokasigambar = $lokasigambar->toArray();
        array_shift($lokasigambar);
        array_shift($lokasigambar);
        // dd($lokasigambar,$multiple);
        // $sertifikat->lokasigambar()->create($lokasigambar);
        $sertifikat->lokasigambar()->update($lokasigambar);
        $sertifikat->save();


        return 'success';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sertifikat $sertifikat)
    {
        //
    }

    public function addUsers($id)
    {
        $sertifikat = Sertifikat::find($id);
        return view('sertifikat.addusers', compact('sertifikat'));
    }

    public function storeUsers(Request $request, $id)
    {

        $users_array = preg_split("/[\r\n;]+/", $request->users);



        $sertifikat = Sertifikat::find($id);

        foreach ($users_array as $key => $value) {
            if (!User::where('name', $value)->exists()) {
                $user = User::create([
                    'name' => $value,
                    'email' => $value . '@gmail.com',
                    'password' => bcrypt('password'),
                ]);
                $user->sertifikats()->attach($sertifikat);

                DB::table('user_sertifikats')
                    ->where('user_id', $user->id)
                    ->where('sertifikat_id', $id)
                    ->update(['sebagai' => $request->sebagai]);
            } else {



                $user = User::where('name', $value)->firstOrFail();

                $userSertifikat = DB::table('user_sertifikats')
                    ->where('user_id', $user->id)
                    ->where('sertifikat_id', $id);

                if (!$userSertifikat->exists()) {
                    $user->sertifikats()->attach($sertifikat);
                    $userSertifikat->update(['sebagai' => $request->sebagai]);
                } else {

                    $userSertifikat->update(['sebagai' => $request->sebagai]);
                }
            }
        }


        return redirect('/sertifikat/' . $id)->with('success', 'Sertifikat stored successfully');
    }
}
