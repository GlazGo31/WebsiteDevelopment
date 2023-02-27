<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackRequest;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class FeedbackController extends Controller
{
    public function create(FeedbackRequest $request)
    {
        $apiToken = "5815703161:AAG-6IHmkFi6op18o4WT9ETDEOqupwCRUwc";

        $text = "Новая заявка с сайта:";
        $text .= PHP_EOL . "Имя: {$request->name}";
        $text .= PHP_EOL . "Телефон: {$request->phone}";
        $text .= PHP_EOL . "Email: {$request->email}";
        $text .= PHP_EOL . "Сообщение: {$request->comment}";

        $data = [
            'chat_id' => '-1001649515967',
            'text' => $text
        ];

        $params = http_build_query($data);

        $client = new Client();

        $client->get("https://api.telegram.org/bot$apiToken/sendMessage?{$params}");

        return Response::noContent(200);
    }
}
