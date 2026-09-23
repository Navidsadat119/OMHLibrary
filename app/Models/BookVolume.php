<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BookVolume extends Model {
    protected $fillable = ['book_id','volume_number','title','file_path','file_size','pages','download_count'];
    public function book(): BelongsTo { return $this->belongsTo(Book::class); }
}
