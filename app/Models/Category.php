<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model {
    protected $fillable = ['parent_id','section','name','slug','description','is_active','sort_order'];
    protected $casts = ['is_active'=>'boolean'];
    public function parent(): BelongsTo { return $this->belongsTo(Category::class,'parent_id'); }
    public function children() { return $this->hasMany(Category::class,'parent_id')->orderBy('sort_order'); }
    public function books(): BelongsToMany { return $this->belongsToMany(Book::class); }
}
