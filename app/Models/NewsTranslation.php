<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class NewsTranslation extends Model {
public $timestamps = false;
protected $fillable = ['news_id', 'locale', 'title', 'content'];
}
