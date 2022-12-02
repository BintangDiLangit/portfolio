<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return response()->json([
            'message' => 'List All Clients',
            'data' => $clients,
        ], Response::HTTP_OK);
    }
}