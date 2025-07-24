<?php

namespace App\Http\Controllers;

use App\Models\Zone;
use Illuminate\Http\Request;

class ZoneController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:manage_zones');
    }

    public function index()
    {
        return Zone::with('employees')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:zones',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'radius' => 'required|numeric',
        ]);

        return Zone::create($request->all());
    }

    public function show(Zone $zone)
    {
        return $zone->load('employees');
    }

    public function update(Request $request, Zone $zone)
    {
        $request->validate([
            'name' => 'required|unique:zones,name,' . $zone->id,
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'radius' => 'required|numeric',
        ]);

        $zone->update($request->all());

        return $zone;
    }

    public function destroy(Zone $zone)
    {
        $zone->delete();

        return response()->json(null, 204);
    }

    public function assignEmployee(Request $request, Zone $zone)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
        ]);

        $zone->employees()->attach($request->employee_id);

        return response()->json(null, 204);
    }

    public function revokeEmployee(Request $request, Zone $zone)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
        ]);

        $zone->employees()->detach($request->employee_id);

        return response()->json(null, 204);
    }
}
