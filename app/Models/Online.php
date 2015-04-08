<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Session;
use Auth;

class Online extends Model {

    /**
     * {@inheritDoc}
     */
    public $table = 'sessions';

    /**
     * {@inheritDoc}
     */
    public $timestamps = false;

    /**
     * Returns all the guest users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeGuests($query)
    {
        return $query->whereNull('user_id');
    }

    /**
     * Returns all the registered users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeRegistered($query)
    {
        return $query->whereNotNull('user_id')->groupBy('user_id')->with('user');
    }

    /**
     * Updates the session of the current user.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUpdateCurrent($query)
    {
	    if(Auth::guest()){
		    return $query->where('id', Session::getId())->update(array(
	            'user_id' => null
	        ));
	    }else{
		    $session = $query->where('id', Session::getId())->first();
		    if($session!=null){
				if($session->user_id==null){
				    $session->user_id = Auth::user()->id;
					$session->save();
				}else if($session->forced_logout){
					$session->forced_logout = null;
					$session->user_id = null;
					$session->save();
				    Auth::logout();
				    return redirect('/');
				}
		    }
			return $session;
	    }

	    return $session->update(array(
            'user_id' => !Auth::guest() ? Auth::user()->id : null
        ));
        
/*
        return $query->where('id', Session::getId())->update(array(
            'user_id' => Sentry::check() ? Sentry::getUser()->id : null
        ));
*/
    }

    /**
     * Returns the user that belongs to this entry.
     *
     * @return \Cartalyst\Sentry\Users\EloquentUser
     */
    public function user()
    {
	    return $this->belongsTo('App\Models\User');
        //return $this->belongsTo('Cartalyst\Sentry\Users\EloquentUser'); # Sentry 3
        // return $this->belongsTo('Cartalyst\Sentry\Users\Eloquent\User'); # Sentry 2
    }

}