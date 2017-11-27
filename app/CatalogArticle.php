<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatalogArticle extends Model
{
    protected $table = "catalog_articles";

    protected $fillable = ['name', 'code', 'price', 'textile', 'description', 'category_id', 'user_id', 'thumb', 'status', 'slug'];

     public function category(){
    	return $this->belongsTo('App\CatalogCategory');
    }

     public function user(){
    	return $this->belongsTo('App\User');
    }

     public function images(){
    	return $this->hasMany('App\CatalogImage', 'article_id');
    }

    public function atribute1(){
    	return $this->belongsToMany('App\CatalogAtribute1');
    }

    public function tags(){
    	return $this->belongsToMany('App\CatalogTag');
    }

    public function scopeSearch($query, $title)
    {
        return $query->where('name', 'LIKE', "%$title%");
    }

}
