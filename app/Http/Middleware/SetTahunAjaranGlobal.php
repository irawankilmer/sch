<?php

namespace App\Http\Middleware;

use App\Models\Master\TahunAjaran;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class SetTahunAjaranGlobal
{
  /**
   * Handle an incoming request.
   *
   * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
   */
  public function handle(Request $request, Closure $next): Response
  {
    $tahunAktif = TahunAjaran::with(['semester' => function($q) {
      $q->where('status', true);
    }])->where('status', true)->first();

    View::share('tahunAktifGlobal', $tahunAktif);
    app()->instance('tahunAktifGlobal', $tahunAktif);
    return $next($request);
  }
}
