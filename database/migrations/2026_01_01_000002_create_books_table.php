<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
 public function up(): void {
  Schema::create('books', function(Blueprint $t){
   $t->id(); $t->string('title',300); $t->string('slug',330)->unique();
   $t->string('language_code',10)->default('ar'); $t->text('short_intro')->nullable(); $t->longText('description')->nullable();
   $t->string('subject',250)->nullable(); $t->string('publisher',250)->nullable(); $t->string('publication_year',20)->nullable();
   $t->string('source_name',250)->nullable(); $t->string('source_url',1000)->nullable(); $t->string('external_download_url',1000)->nullable();
   $t->string('cover_path',1000)->nullable(); $t->string('status',30)->default('draft');
   $t->boolean('is_featured')->default(false); $t->integer('featured_order')->default(0); $t->boolean('is_my_book')->default(false);
   $t->unsignedBigInteger('views')->default(0); $t->unsignedBigInteger('downloads')->default(0);
   $t->unsignedInteger('pages')->nullable(); $t->unsignedInteger('volumes_count')->default(1); $t->timestamps();
   $t->index(['status','is_featured']); $t->index('title');
  });
 }
 public function down(): void { Schema::dropIfExists('books'); }
};
