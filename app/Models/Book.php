<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model {
    protected $fillable = [
        'title','slug','language_code','short_intro','description','subject','publisher',
        'publication_year','source_name','source_url','external_download_url',
        'cover_path','status','is_featured','featured_order','is_my_book',
        'views','downloads','pages','volumes_count'
    ];
    protected $casts = ['is_featured'=>'boolean','is_my_book'=>'boolean'];
    public function authors(): BelongsToMany { return $this->belongsToMany(Author::class); }
    public function categories(): BelongsToMany { return $this->belongsToMany(Category::class); }
    public function volumes(): HasMany { return $this->hasMany(BookVolume::class)->orderBy('volume_number'); }
    public function relatedCommentaries() { return $this->belongsToMany(Book::class,'book_relations','base_book_id','related_book_id')->withPivot('relation_type'); }
    public function baseWorks() { return $this->belongsToMany(Book::class,'book_relations','related_book_id','base_book_id')->withPivot('relation_type'); }
}
