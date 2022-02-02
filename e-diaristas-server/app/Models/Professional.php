<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professional extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'document',
        'email',
        'phone',
        'address',
        'number',
        'neighborhood',
        'complement',
        'zip_code',
        'city',
        'state',
        'ibge_code',
        'avatar'
    ];

    protected $visible = ['full_name', 'city', 'avatar', 'rating'];

    protected $appends = ['rating'];

    public function getAvatarAttribute(string $avatar)
    {
        return config('app.url') . '/' . $avatar;
    }

    public function getRatingAttribute($rating)
    {
        return mt_rand(1, 5);
    }

    static public function searchForIbgeCode(int $ibge)
    {
        return self::where('ibge_code', $ibge)->limit(6)->get();
    }

    static public function restResultsForIbgeCode(int $ibge)
    {
        $count_results = self::where('ibge_code', $ibge)->count();

        return $count_results > 6 ? $count_results - 6 : 0;
    }
}
