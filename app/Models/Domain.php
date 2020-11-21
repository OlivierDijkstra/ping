<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory;

    protected $fillable = [
        'host',
    ];

    public function pings()
    {
        return $this->hasMany(Ping::class);
    }

    public function uptime()
    {
        $totalPings = $this->pings()->count();
        $goodPings = $this->pings()->whereStatus(200)->count();

        return round($goodPings / $totalPings * 100, 2);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
