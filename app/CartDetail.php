<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cart;
use App\CatalogArticle;

class CartDetail extends Model
{
    protected $table = "cart_details";

    protected $fillable = ['cart_id', 'article_id', 'quantity', 'size', 'price', 'discount'];

    public function cart()
    {
    	return $this->belongsTo('App\Cart');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer', 'id');
    }

    public function article()
    {
        return $this->belongsTo('App\CatalogArticle', 'article_id');
    }
}
