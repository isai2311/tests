<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BMenu extends Model
{
    use HasFactory;

    protected $table = 'tbMenu';
    protected $primaryKey = 'cFolioMenu';
    public $timestamps = false;

    protected $fillable = [
        'cIdMenu',
        'cItemMenu',
        'cParentIdMenu',
        'cUrlMenu',
        'cNivelUsuarioMenu',
        'cChildMenu',
        'cNewMenu',
        'cNomIcoMenu'
    ];

    public function menu_padre()
    {
        return $this->belongsToMany(Menu::class, 'cParentIdMenu', 'cIdMenu')->where('cParentIdMenu', 0);
    }

    public function scopePadre($query)
    {
        return $query->where('cParentIdMenu', 0);
    }

    public function scopeHijos($query)
    {
        return $query->where('cParentIdMenu', '<>', 0);
    }

    public function menu_hijo()
    {
        return $this->belongsToMany(Menu::class, 'cParentIdMenu', 'cIdMenu')->where('cParentIdMenu', '<>', 0);
    }
}
