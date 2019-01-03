<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\CanResetPassword;
use App\Notifications\PayOverdueNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','contact_number','address','membership_type_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];
    
    public function bookissues()
    {
        return $this->hasMany('App\BookIssue','borrower_id','id');
    }

    public function membership()
    {
        return $this->belongsTo('App\MembershipType', 'membership_type_id', 'id');  
    }

    //function that calculates fine for not returning book on time
    public function fine()
    {
            $fine=0;
            foreach($this->bookissues as $user_bookissue)
            {
                if($user_bookissue->return_date==null && $user_bookissue->approved==1)
                {
                    $issue_date=Carbon::parse($user_bookissue->created_at);
                    $expiry_date=Carbon::parse($user_bookissue->expiry_date);
                    $days_between=$issue_date->diffInDays($expiry_date,false);

                    if($days_between<0)
                    {
                        $fine=$fine+3; // 3$ fine for every book that is not returned of time
                    }
                    else{
                        $fine=$fine;
                    }
                }
            }

            User::where('id',$this->id)->update([
                'fine' => $fine
            ]);
                
            return $fine;
    }
    
}
