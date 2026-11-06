<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class News extends Model {
    protected $fillable = ['created_at'];

    public function translations() {
        return $this->hasMany(NewsTranslation::class);
    }
    public function translate($field, $locale = 'uk') {

        $translation = $this->translations->firstWhere('locale', $locale);

        if (!$translation) {
            $translation = $this->translations->firstWhere('locale', 'uk');
        }

        return $translation ? $translation->{$field} : '';
    }
}
