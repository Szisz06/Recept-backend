<?php

namespace App\Http\Controllers;

use App\Models\Recept;
use Illuminate\Http\Request;

class ReceptController extends Controller
{
    public function index()
    {
        $receptek = Recept::with('kategoria')->get();
        $result = $receptek->map(function ($recept) {
            return [
                'id' => $recept->id,
                'nev' => $recept->nev,
                'kategoria_nev' => $recept->kategoria->nev,
                'kep' => $recept->kep,
                'leiras' => $recept->leiras,

            ];
        });
        return $result;
    }

    public function show($kateg_id)
    {
        $receptek = Recept::with('kategoria')->where('kateg_id', $kateg_id)->get();
        $result = $receptek->map(function ($recept) {
            return [
                'id' => $recept->id,
                'nev' => $recept->nev,
                'kategoria_nev' => $recept->kategoria->nev,
                'kep' => $recept->kep,
                'leiras' => $recept->leiras,
            ];
        });
        return $result;
    }



    public function store(Request $request)
    {
        $validated = $request->validate([
            'nev' => 'required|string|max:255',
            'kateg_id' => 'required|exists:kategorias,kateg_id',
            'kep' => 'required|string|max:255',
            'leiras' => 'required|string',
        ]);

        $recept = Recept::create($validated);
        return $recept;
    }
    //vagy
    // public function store(Request $request){ 
    // 	$recept = new Recept(); 
    // 	$recept->nev = $request->nev; 
    // 	$recept->kateg_id = $request->kateg_id; 
    // 	$recept->kep = $request->kep; 
    // 	$recept->leiras = $request->leiras; 
    // 	$recept->save(); 
    // } 



    public function destroy($id)
    {
        $recept = Recept::find($id);
        $recept->delete();
    }
}
