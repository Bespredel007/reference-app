<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
public function up(): void {
// новини
Schema::create('news', function (Blueprint $table) {
$table->id();
$table->timestamps();
});

// переклади
Schema::create('news_translations', function (Blueprint $table) {
$table->id();
$table->foreignId('news_id')->constrained('news')->cascadeOnDelete();
$table->string('locale', 5)->index(); // 'uk', 'en'
$table->string('title');
$table->text('content');
$table->unique(['news_id', 'locale']);
});
}

public function down(): void {
Schema::dropIfExists('news_translations');
Schema::dropIfExists('news');
}
};
