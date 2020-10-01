<?php

class Comment extends \Eloquent {
	protected $fillable = array('email', 'name', 'product_id', 'comment');
	
 	public function product() {
        return $this->belongsTo('Product','id');
    }
		 
	public function user() {
	        return $this->belongsTo('User','id');
	    }
	
}