<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Services\Pages\Content\ContentPageQueryService;

class HomeController extends Controller
{
    public function __construct(
        private readonly ContentPageQueryService $contentQuery
    ) {}

    public function index()
    {
        $newsItems = $this->contentQuery->getLatestByType('news');
        $announcementItems = $this->contentQuery->getLatestByType('announcement');
        $agendaItems = $this->contentQuery->getUpcomingAgenda();

        return view('home', compact('newsItems', 'announcementItems', 'agendaItems'));
    }
}
