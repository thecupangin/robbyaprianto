<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Page;

class SitemapController extends Controller
{
    public function index()
    {
    	$pages = Page::translated()->where('custom_tool_link', null)->where('post_status', true)->where('page_status', true)->where('tool_status', true)->orderBy('id', 'DESC')->get()->toArray();

		return response()->view('frontend.sitemap', [
		  'pages' => $pages
		])->header('Content-Type', 'text/xml');
    }
}
