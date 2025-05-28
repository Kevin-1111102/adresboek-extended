<?php

namespace App\Http\Controllers;

use App\Models\Adres;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreAdresRequest;
use App\Http\Requests\UpdateAdresRequest;

class AdresController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $adressen = Auth::user()->adressen()->get();
        return view('adressen.index', compact('adressen'));
    }

    public function create()
    {
        $this->authorize('create', Adres::class);
        return view('adressen.create');
    }

    public function store(StoreAdresRequest $request)
    {
        Auth::user()->adressen()->create($request->only('naam', 'straat', 'huisnummer', 'postcode', 'stad'));

        return redirect()->route('adressen.index')->with('success', 'Adres toegevoegd!');
    }

    public function edit(Adres $adres)
    {
        $this->authorize('view', $adres);
        return view('adressen.edit', compact('adres'));
    }

    public function update(UpdateAdresRequest $request, Adres $adres)
    {
        $this->authorize('update', $adres);

        $adres->update($request->only('naam', 'straat', 'huisnummer', 'postcode', 'stad'));

        return redirect()->route('adressen.index')->with('success', 'Adres bijgewerkt!');
    }

    public function destroy(Adres $adres)
    {
        $this->authorize('delete', $adres);

        $adres->delete();

        return response()->json(['success' => true]);
    }
}
