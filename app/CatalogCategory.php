<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatalogCategory extends Model
{
    protected $table = "catalog_categories";

    protected $fillable = ['name'];

    public function article()
    {
    	return $this->hasMany('App\CatalogArticle', 'article_id');
    }

    public function scopeSearchCategory($query, $name)
    {
    	return $query->where('name','=', $name);
    }
    
    public function scopeSearchname($query, $name)
    {
        return $query->where('name','LIKE', "%$name%");
    }
}
