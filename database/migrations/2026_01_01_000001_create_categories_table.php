<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
 public function up(): void {
  Schema::create('categories', function(Blueprint $t){
   $t->id(); $t->foreignId('parent_id')->nullable()->constrained('categories')->nullOnDelete();
   $t->string('section',40); $t->string('name',200); $t->string('slug',220)->unique();
   $t->text('description')->nullable(); $t->boolean('is_active')->default(true); $t->integer('sort_order')->default(0); $t->timestamps();
   $t->index(['section','is_active']);
  });
 }
 public function down(): void { Schema::dropIfExists('categories'); }
};
