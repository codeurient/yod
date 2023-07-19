<?php

namespace App\Http\Controllers;

use App\Jobs\CreateSiteMap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\Sitemap\SitemapGenerator;

class SeoController extends Controller
{
    public function getSiteMap(){
        return response()->file('storage/sitemap.xml');
    }
}
