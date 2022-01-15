<?php

namespace App\Http\Controllers;

use App\Models\DeletedLinks;
use App\Models\Links;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
  /**
   * Show the home.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {
    $data['title'] = 'Beranda';
    return view('welcome', $data);
  }

  /**
   * Shorting Action
   *
   * @return \Illuminate\Support\Facades\Response
   */
  public function shorting(Request $request)
  {
    $short   = new Links();
    $str     = new Str();
    $url     = htmlspecialchars(strip_tags($request->url));

    $request->validate([
      'url' => 'required|url',
    ]);

    // Execute if pass the validation
    try {

      $store = $short->create([
        'short'   => $str->random(7),
        'url'     => $url,
        'author'  => auth()->user() ? auth()->user()->username : 'anonymous',
        'ip'      => $request->ip(),
      ]);

      return response([
        'status'   => 'success',
        'code'     => 200,
        'data'     => $store,
        'error'    => false,
        'success'  => true,
        'message'  => 'Tautan berhasil dibuat',
      ], 200);

    } catch (\Illuminate\Database\QueryException $exception) {

      return response([
        'status'   => 'fatal',
        'code'     => 500,
        'debug'    => $exception->errorInfo,
        'error'    => true,
        'success'  => false,
        'response' => $request->all(),
        'message'  => 'Tautan gagal dibuat, karena ada beberapa kesalahan dari server. Periksa konsol peramban anda!'
      ], 500);

    }
  }

  /**
   * Redirect the shortlink
   *
   * @return \Illuminate\Support\Facades\Response
   */
  public function source($link, Visitor $visit, Links $links, Request $request)
  {
    $check = $links->where('short', $link);
    if($check->count() > 0) :
      $data = $check->first();

      $visit->create([
        'id_link' => $data->short,
        'ip'      => $request->ip(),
        'browser' => $request->header('User-Agent'),
      ]);

      return redirect($data->url, 302);
    endif;

    return redirect()->route('home')->with('error', 'ID penyingkat tidak ditemukan!');
  }

  /**
   * Show the statistic data
   *
   * @return \Illuminate\Support\Facades\Response::json
   */
  public function statistic()
  {
    $carbon   = new Carbon();
    $links    = new Links();
    $visit    = new Visitor();
    $delete   = new DeletedLinks();

    $sWeek    = $carbon->now()->startOfWeek();
    $eWeek    = $carbon->now()->endOfWeek();

    $visitor  = $visit->whereBetween('created_at', array($sWeek, $eWeek))->count() / 7;
    $links    = $links->all()->count();
    $deleted  = $delete->all()->count();

    return response()->json([
      'status'  => 'success',
      'error'   => false,
      'success' => true,
      'data'    => [
        round($visitor, 0), $links, $deleted
      ]
    ]);
  }
}
