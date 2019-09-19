<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Resources\Contact as ContactResource;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        $data = request()->validate([
            'searchTerm' => 'required',
        ]);

        $contacts = Contact::search($data['searchTerm'])
            ->where('user_id', request()->user()->id)
            ->get();

        return ContactResource::collection($contacts);
    }

    public function news()
    {
        $json = json_decode(file_get_contents('https://newsapi.org/v2/top-headlines?country=za&apiKey=0a0d427e72d749de9464065e9396f846'), true);
        return $json;
    }
}
