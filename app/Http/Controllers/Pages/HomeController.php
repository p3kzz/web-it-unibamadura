<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Content;

class HomeController extends Controller
{
    public function index()
    {
        $newsItems = Content::query()
            ->where('type', 'news')
            ->where('status', 'published')
            ->latest('published_at')
            ->latest('id')
            ->take(4)
            ->get();

        $announcementItems = Content::query()
            ->where('type', 'announcement')
            ->where('status', 'published')
            ->latest('published_at')
            ->latest('id')
            ->take(4)
            ->get();

        $agendaItems = Content::query()
            ->where('type', 'agenda')
            ->where('status', 'published')
            ->whereDate('event_date', '>=', today())
            ->orderBy('event_date')
            ->take(4)
            ->get();

        if ($agendaItems->isEmpty()) {
            $agendaItems = Content::query()
                ->where('type', 'agenda')
                ->where('status', 'published')
                ->orderByDesc('event_date')
                ->take(4)
                ->get();
        }

        return view('home', compact('newsItems', 'announcementItems', 'agendaItems'));
    }
}
