<?php

use App\Models\HouseInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/info', function () {
    $houses = HouseInfo::all();
    return view('filter', compact('houses'));
});
Route::get('filter', function (Request $request) {
    $location = $request->location;
    $photo = $request->photo;
    $meterF = $request->meterF;
    $meterT = $request->meterT;
    $priceF = $request->priceF;
    $priceT = $request->priceT;
    if ($request->ajax()) {
        // $houses = HouseInfo::getHouse($location, $photo, $meterF, $meterT, $priceF, $priceT);
        $houses = HouseInfo::filter($request);
        return view('innerFilter', compact('houses'));
    }
});
