<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Author extends Model {
    protected $fillable = ['name','slug','full_name','birth_year','death_year','location','biography','teachers','students','works'];
    public function books(): BelongsToMany { return $this->belongsToMany(Book::class); }
}
