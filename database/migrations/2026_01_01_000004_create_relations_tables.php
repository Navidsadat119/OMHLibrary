<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
 public function up(): void {
  Schema::create('author_book', function(Blueprint $t){$t->foreignId('author_id')->constrained()->cascadeOnDelete();$t->foreignId('book_id')->constrained()->cascadeOnDelete();$t->primary(['author_id','book_id']);});
  Schema::create('book_category', function(Blueprint $t){$t->foreignId('book_id')->constrained()->cascadeOnDelete();$t->foreignId('category_id')->constrained()->cascadeOnDelete();$t->primary(['book_id','category_id']);});
  Schema::create('book_volumes', function(Blueprint $t){$t->id();$t->foreignId('book_id')->constrained()->cascadeOnDelete();$t->unsignedInteger('volume_number');$t->string('title')->nullable();$t->string('file_path',1000)->nullable();$t->unsignedBigInteger('file_size')->nullable();$t->unsignedInteger('pages')->nullable();$t->unsignedBigInteger('download_count')->default(0);$t->timestamps();$t->unique(['book_id','volume_number']);});
  Schema::create('book_relations', function(Blueprint $t){$t->id();$t->foreignId('base_book_id')->constrained('books')->cascadeOnDelete();$t->foreignId('related_book_id')->constrained('books')->cascadeOnDelete();$t->string('relation_type',50);$t->timestamps();$t->unique(['base_book_id','related_book_id','relation_type']);});
 }
 public function down(): void { foreach(['book_relations','book_volumes','book_category','author_book'] as $t) Schema::dropIfExists($t); }
};
