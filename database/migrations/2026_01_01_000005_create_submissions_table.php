<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
 public function up(): void {
  Schema::create('submissions', function(Blueprint $t){
   $t->id(); $t->string('tracking_token',100)->unique(); $t->string('submitter_name',150); $t->string('email',190)->nullable(); $t->string('phone',50)->nullable();
   $t->string('book_name',300); $t->string('author_name',250)->nullable(); $t->string('subject',250)->nullable();
   $t->text('short_intro')->nullable(); $t->longText('description')->nullable(); $t->string('language_code',10); $t->string('publication_year',20)->nullable();
   $t->string('file_path',1000)->nullable(); $t->string('external_url',1000)->nullable(); $t->string('cover_path',1000)->nullable(); $t->string('source',300)->nullable();
   $t->string('copyright_status',100)->nullable(); $t->string('status',40)->default('pending'); $t->text('admin_note')->nullable(); $t->timestamps();
   $t->index(['status','created_at']);
  });
 }
 public function down(): void { Schema::dropIfExists('submissions'); }
};
