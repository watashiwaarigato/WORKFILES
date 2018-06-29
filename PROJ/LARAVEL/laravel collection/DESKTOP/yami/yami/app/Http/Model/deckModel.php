<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class deckModel extends Model
{
	protected $table = 'deck';
	protected $fillable = array('user_id', 'user_name', 'deck_name', 'card_id');
}
