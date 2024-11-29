<?php

namespace App\Http\Controllers;

use App\Models\XeMay; // Assuming the XeMay model is already created
use App\Models\ChuXe; // Assuming the ChuXe model exists to relate the owner (id_chu_xe)
use Illuminate\Http\Request;

class XeMayController extends Controller
{
    /**
     * Display a listing of the xe may (motorbikes).
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index()
    {
    
        $xeMays = XeMay::with('chuXe')->get();
        
        return view('index', compact('xeMays'));
    }

    /**
     * Show the form for creating a new xe may.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $chuXes = ChuXe::all(); // Fetch all chu xe (owners)
        return view('xemay.create', compact('chuXes')); // Pass owners to create view
    }

    /**
     * Store a newly created xe may in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'bien_so' => 'required|unique:xe_mays',
            'hang_xe' => 'required|string|max:50',
            'model' => 'required|string|max:50',
            'mau_sac' => 'nullable|string|max:30',
            'so_khung' => 'required|string|max:50|unique:xe_mays',
            'so_may' => 'required|string|max:50|unique:xe_mays',
            'id_chu_xe' => 'required|exists:chu_xes,id_chu_xe',
        ]);

        // Create the new xe may entry
        XeMay::create([
            'bien_so' => $request->bien_so,
            'hang_xe' => $request->hang_xe,
            'model' => $request->model,
            'mau_sac' => $request->mau_sac,
            'so_khung' => $request->so_khung,
            'so_may' => $request->so_may,
            'id_chu_xe' => $request->id_chu_xe, // Foreign key for the owner
        ]);

        return redirect()->route('xemay.index')->with('success', 'Xe máy đã được thêm thành công');
    }

    /**
     * Display the specified xe may.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $xeMay = XeMay::findOrFail($id); // Find the xe may by its ID
        return view('xemay.show', compact('xeMay')); // Display the xe may details
    }

    /**
     * Show the form for editing the specified xe may.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $xeMay = XeMay::findOrFail($id); // Find the xe may to edit
        $chuXes = ChuXe::all(); // Fetch all owners for the dropdown
        return view('xemay.edit', compact('xeMay', 'chuXes')); // Pass the data to edit view
    }

    /**
     * Update the specified xe may in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $xeMay = XeMay::findOrFail($id); // Find the xe may by its ID

        // Validate the request data
        $validated = $request->validate([
            'bien_so' => 'required|unique:xe_mays,bien_so,' . $xeMay->id_xe,
            'hang_xe' => 'required|string|max:50',
            'model' => 'required|string|max:50',
            'mau_sac' => 'nullable|string|max:30',
            'so_khung' => 'required|string|max:50|unique:xe_mays,so_khung,' . $xeMay->id_xe,
            'so_may' => 'required|string|max:50|unique:xe_mays,so_may,' . $xeMay->id_xe,
            'id_chu_xe' => 'required|exists:chu_xes,id_chu_xe',
        ]);

        // Update the xe may record
        $xeMay->update([
            'bien_so' => $request->bien_so,
            'hang_xe' => $request->hang_xe,
            'model' => $request->model,
            'mau_sac' => $request->mau_sac,
            'so_khung' => $request->so_khung,
            'so_may' => $request->so_may,
            'id_chu_xe' => $request->id_chu_xe, // Update the owner
        ]);

        return redirect()->route('xemay.index')->with('success', 'Xe máy đã được cập nhật thành công');
    }

    /**
     * Remove the specified xe may from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $xeMay = XeMay::findOrFail($id);
        $xeMay->delete(); // Delete the xe may record

        return redirect()->route('xemay.index')->with('success', 'Xe máy đã được xóa thành công');
    }
}
