<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAudit extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeGetWithFilter($query, $from = false, $to = false)
    {
        if ($from && $to) {
            return $query->whereBetween('changed_at', [$from, $to])->get();
        } elseif ($from) {
            return $query->whereDate('changed_at', '>=', $from)->get();
        } elseif ($to) {
            return $query->whereDate('changed_at', '<=', $to)->get();
        } else {
            return $query->get();
        }
    }
}
