<?php

namespace App\Http\Controllers;
use App\Models\sauce;
use Illuminate\Http\Request;

class SaucesController extends Controller
{
    // public
    public function index()
    {
        $sauces = sauce::paginate(10);
        return view('index', compact('sauces'));
    }
    
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'userID' => 'required',
            'name' => 'required',
            'manufacturer' => 'required',
            'description' => 'required',
            'mainPepper' => 'required',
            'imageUrl' => 'required',
            'heat' => 'required',
        ]);

        $requestD = $request->except(['imageUrl']);

        if ($request->hasFile('imageUrl')) {
            $image = $request->file('imageUrl');
            $imageName = time().'_'.$image->getClientOriginalName(); 
            $image->move(public_path('images'), $imageName);
            $requestD["imageUrl"] = 'images/' . $imageName;
        }

        $requestD["usersLiked"] = json_encode([]);
        $requestD["usersDisliked"] = json_encode([]);

        Sauce::create($requestD);

        return redirect()->route('sauces.index')->with('success', 'Sauce créée avec succès.');
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'manufacturer' => 'required',
            'description' => 'required',
            'mainPepper' => 'required',
            'heat' => 'required',
        ]);

        $requestD = $request->except(['imageUrl', '_token', '_method']);

        if ($request->hasFile('imageUrl')) {
            $image = $request->file('imageUrl');
            $imageName = time().'_'.$image->getClientOriginalName(); 
            $image->move(public_path('images'), $imageName);
            $requestD["imageUrl"] = 'images/' . $imageName;
        }

        $requestD["usersLiked"] = json_encode([]);
        $requestD["usersDisliked"] = json_encode([]);

        $sauce = sauce::where('idSauce', $id)->update($requestD);

        return redirect()->route('sauces.index')->with('success', 'Sauce modifiée avec succès.');
    }

    public function show($id)
    {
        $sauce = sauce::where('idSauce', $id)->firstOrFail();
        return view('show', ['sauce' => $sauce]);
    }

    public function edit($id)
    {
        $sauce = sauce::where('idSauce', $id)->firstOrFail();
        return view('edit', ['sauce' => $sauce]);
    }

    public function destroy(string $id)
    {
        sauce::where('idSauce', $id)->delete();
        return redirect()->route('sauces.index');
    }
}
