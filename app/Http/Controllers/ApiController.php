<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\ApiKey;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    public function index() 
    {

      $user = request()->user();
      $apikeys = $user->apikeys;

      return Inertia::render('Apikey/Index', 
      ['apikeys' => $apikeys]);
    }

    public function create() {
      return Inertia::render('Apikey/Create');

    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => ['string', 'required', 'max:255'],
        ]);

        // Generate a random key
        $apiKey = bin2hex(random_bytes(16));

        // Create a new ApiKey
        ApiKey::create([
            'user_id' => $request->user()->id,
            'uuid' => 'trk-' . Str::uuid(),
            'name' => $request->name,
            'key' => $apiKey,
        ]);

        return redirect()->route('apikey.index');
    }

}
