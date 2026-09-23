<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
 public function up(): void {
  Schema::create('authors', function(Blueprint $t){
   $t->id(); $t->string('name',250); $t->string('slug',280)->unique(); $t->string('full_name',300)->nullable();
   $t->string('birth_year',30)->nullable(); $t->string('death_year',30)->nullable(); $t->string('location',250)->nullable();
   $t->longText('biography')->nullable(); $t->longText('teachers')->nullable(); $t->longText('students')->nullable(); $t->longText('works')->nullable(); $t->timestamps();
  });
 }
 public function down(): void { Schema::dropIfExists('authors'); }
};
