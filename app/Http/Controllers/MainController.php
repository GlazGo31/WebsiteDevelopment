<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Services\Placeholder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class MainController extends Controller
{
    const BELGOROD = 80;

    public function index(Request  $request)
    {
        $projects = [1, 2, 3, 4, 5, 6, 7, 8];

        $city = City::query()->find(self::BELGOROD);

        $domain = $request->root();

        if(config('app.env') != 'local' && !str_contains($domain, '.tech')) return redirect(config('app.url'), 301);

        return view('client.index', compact('city', 'projects'));
    }

    public function city(City $city, Request $request)
    {
        $domain = $request->root();

        if(config('app.env') != 'local' && !str_contains($domain, '.tech')) {
            $host = config('app.url');
            $slug = strtolower($city->slug);
            return redirect("{$host}/{$slug}", 301);
        }

        return view('client.index', compact('city'));
    }

    public function aboutUs()
    {
        $city = City::query()->find(self::BELGOROD);

        return view('client.about-us', compact('city'));
    }

    public function services()
    {
        $city = City::query()->find(self::BELGOROD);

        return view('client.services', compact('city'));
    }

    public function contacts()
    {
        $city = City::query()->find(self::BELGOROD);

        return view('client.contacts', compact('city'));
    }

    public function projects()
    {
        $city = City::query()->find(self::BELGOROD);

        return view('client.projects', compact('city'));
    }

    public function placeholder($width, $height)
    {
        $img = Placeholder::generate($width, $height);

        return Response::file($img)->deleteFileAfterSend();
    }
}
