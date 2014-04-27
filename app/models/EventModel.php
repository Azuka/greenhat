<?php

class EventModel extends Eloquent {

    protected $table = 'events';
    public $timestamps = true;
    public $softdelete = true;
    
	public function user()
	{
		return $this->belongsTo('User');
	}
    
}
