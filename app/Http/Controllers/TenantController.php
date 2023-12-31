<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $contracts = Tenant::all(); // Make sure this is the correct model name
    return view('tenant-contract', compact('contracts')); // Ensure the view name matches the file in your views directory
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validate form data
    $validatedData = $request->validate([
        'nama_restoran' => 'required|string|max:255',
        'nama_pemilik' => 'required|string|max:255',
        'nomor_telepon' => 'required|string|max:15',
        'email' => 'required|email|max:255',
        // 'owner-id-type' => 'required|string',
        // 'owner-id-number' => 'required|string|max:255',
        'kota' => 'required|string|max:255',
        'alamat' => 'required|string',
    ]);

    // Create a new TenantContract model and save it to the database
    $contract = new Tenant();
    $contract->nama_restoran = $validatedData['nama_restoran'];
    $contract->nama_pemilik= $validatedData['nama_pemilik'];
    $contract->nomor_telepon = $validatedData['nomor_telepon'];
    $contract->email = $validatedData['email'];
    // $contract->owner_id_type = $validatedData['owner-id-type'];
    // $contract->owner_id_number = $validatedData['owner-id-number'];
    $contract->kota = $validatedData['kota'];
    $contract->alamat = $validatedData['alamat'];
    $contract->save();

    return redirect('/tenant-contract')->with('success', 'Tenant contract created successfully.');
}
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $contract = Tenant::findOrFail($id);
        $contract->delete();
        return redirect()->back()->with('success', 'Contract deleted successfully.');
    }

}
