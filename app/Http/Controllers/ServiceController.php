<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AgentService;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $services = Service::with('agents')->orderBy('id_service', 'desc')->with('agents')->get()->groupBy('id_service');

        return view('layout.Service.services', compact('services' ));
    }


    public function create()
    {
        //
        $agents = Agent::all();
        $services = Service::all();
        return view('layout.Service.ajouteService', compact('services', 'agents'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom_service' => 'required|string|max:255',
            'id_agent' => 'required|array',
        ]);

        $service = new Service();
        $created_service = $service->create([
            "nom_service" => $validatedData['nom_service'],
        ]);

        foreach ($validatedData['id_agent'] as $item) {
            $agent_service = new AgentService();
            $created_service = $agent_service->create([
                "id_service" => $created_service->id_service,
                "id_agent" => $item,
            ]);
        }
        return redirect()->route('services.index')->with('success', 'Service created successfully.');

    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $service = Service::with('agents')->findOrFail($id);

        return view('layout.Service.view', compact('service'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $service = Service::findOrFail($id);
        $agents = Agent::all();
        return view('layout.Service.edit', compact('service', 'agents'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nom_service' => 'required|string|max:255',
            'id_agent' => 'required|array',
        ]);

        $service = Service::findOrFail($id);

        $service->update([
            'nom_service' => $validatedData['nom_service'],
        ]);

        $service->agents()->sync($validatedData['id_agent']);

        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Service::where('id_service', $id)->delete();
        return redirect('services')->with('lash_message', 'services deleted!');
    }
}
