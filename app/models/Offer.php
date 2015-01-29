<?php

class Offer extends \Eloquent {
	protected $fillable = ['message','price','currency','project_id','user_id'];

	public function Project(){
        return $this->belongsTo('Project'); 
    }

    public function User(){
        return $this->belongsTo('User'); 
    }
    
    public function currencyText(){
    	switch ($this->attributes['currency']) {
    		case '1':
    			return 'USD';
    			break;
    		case '2':
    			return 'GEL';
    			break;

    		case '3':
    			return 'EURO';
    			break;
    	}

    	return 'NO_CURRENCY';
    }
}