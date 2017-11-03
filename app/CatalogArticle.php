<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatalogArticle extends Model
{
    protected $table = "catalog_articles";

    protected $fillable = ['title', 'content', 'category_id', 'user_id', 'status', 'slug'];

     public function category(){
    	return $this->belongsTo('App\CatalogCategory', 'category_id');
    }

     public function user(){
    	return $this->belongsTo('App\User');
    }

     public function images(){
    	return $this->hasMany('App\CatalogImage', 'article_id');
    }

     public function tags(){
    	return $this->belongsToMany('App\CatalogTag');
    }

    public function scopeSearch($query, $title)
    {
        return $query->where('title', 'LIKE', "%$title%");
    }

    public function scopeSearchtitle($query, $title)
    {
        return $query->where('title', 'LIKE', "%$title%");
    }

}
