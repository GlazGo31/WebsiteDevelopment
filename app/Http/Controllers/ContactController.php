<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $contacts = Contact::query()
            ->offset($request->offset)
            ->limit($request->limit)
            ->when($search, function ($builder) use($search) {
                $builder
                    ->where('name', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('url', 'like', "%{$search}%");
            })
            ->orderBy('status')
            ->get();

        $totalContacts = Contact::query()->count();

        return Response::json([
            'data' => $contacts,
            'total' => $totalContacts,
        ]);
    }

    public function create(Request $request)
    {
        $phone = str_replace(Contact::BAD_LETTERS, '', $request->phone);
        $url = str_replace(Contact::BAD_URLS, '', $request->url);

        if($url) $url = "https://{$url}";

        Contact::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $phone,
            'url' => $url,
            'desc' => $request->desc,
            'status' => $request->status ?? 0,
        ]);

        return Response::noContent(200);
    }

    public function show(Contact $contact)
    {
        return Response::json($contact);
    }

    public function edit(Contact $contact, Request $request)
    {
        $phone = str_replace(Contact::BAD_LETTERS, '', $request->phone);
        $url = str_replace(Contact::BAD_URLS, '', $request->url);

        if($url) $url = "https://{$url}";

        $contact->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $phone,
            'url' => $url,
            'desc' => $request->desc,
            'status' => $request->status,
        ]);

        return Response::noContent(200);
    }

    public function delete(Contact $contact)
    {
        $contact->delete();

        return Response::noContent(200);
    }
}
