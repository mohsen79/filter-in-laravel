<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HouseInfo extends Model
{
    use HasFactory;
    protected $fillable = ['location', 'price', 'photo', 'meter'];

    public function scopeFilter($query, $request)
    {
        return $query->when($request->photo == 1, function ($query) use ($request) {
            $query->where('photo', $request->photo);
        })
            ->when($request->meterF, function ($query) use ($request) {
                $query->whereBetween('meter', [$request->meterF, $request->meterT]);
            })
            ->when($request->priceF, function ($query) use ($request) {
                $query->whereBetween('price', [$request->priceF, $request->priceT]);
            })
            ->when($request->location, function ($query) use ($request) {
                $query->where('location', $request->location);
            })->paginate(30);
    }
    
    public static function getHouse($location, $photo, $meterF, $meterT, $priceF, $priceT)
    {
        $houses = DB::table('house_infos');
        if ($location) {
            $houses = $houses->where('house_infos.location', $location);
        }
        if ($photo) {
            $houses = $houses->where('house_infos.photo', $photo);
        }
        if ($meterF && $meterT) {
            $houses = $houses->whereBetween('meter', [$meterF, $meterT]);
        }
        if ($priceF && $priceT) {
            $houses = $houses->whereBetween('price', [$priceF, $priceT]);
        }
        return $houses->paginate(30);
    }
}
