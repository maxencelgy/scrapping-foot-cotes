<?php

namespace App\Http\Controllers;

use Goutte\Client;
use Illuminate\Http\Request;
use Symfony\Component\DomCrawler\Crawler;

class HomeController extends Controller
{
  public function index()
  {
      $client = new Client();
      $url = 'https://www.sportytrader.com/resultat-direct/';
      $page = $client->request('GET', $url);

      return $page->filter('section main')->each(function (Crawler $node) {
          return $node->filter('a')->attr('href');
      });



    return view('home.index', [
        'title' => 'Home Page',
    ]);
  }
}
