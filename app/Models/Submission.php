<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model {
    protected $fillable = [
        'tracking_token','submitter_name','email','phone','book_name','author_name',
        'subject','short_intro','description','language_code','publication_year',
        'file_path','external_url','cover_path','source','copyright_status',
        'status','admin_note'
    ];
}
