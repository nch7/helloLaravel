	<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Watson\Validating\ValidatingTrait;
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;

class User extends Eloquent implements UserInterface, RemindableInterface,StaplerableInterface {
	use UserTrait, RemindableTrait, SoftDeletingTrait, ValidatingTrait, EloquentTrait;


	protected $table = 'users';
	protected $hidden = array('password', 'remember_token');
	protected $fillable = ['avatar','firstname', 'lastname', 'email','gender','github_token'];
	protected $throwValidationExceptions = true;
	protected $rules = [
        'username'   => 'required',
        'firstname'  => 'required',
        'lastname'   => 'required',
        'avatar'	=> ''
    ];

    public function __construct(array $attributes = array()) {
        $this->hasAttachedFile('avatar', [
            'styles' => [
                'thumbnail' => [
			        'dimensions' => '50x50#',
			        'convert_options' => ['jpeg_quality' => 100]
			    ]
            ]
        ]);

        parent::__construct($attributes);
    }

	public function integrations()
	{
		return $this->hasMany('Integration');
	}

	public function phones()
	{
		return $this->hasMany('Phone');
	}

	public function comment()
    {
        return $this->hasMany('Comment');
    }

	public function skills()
	{
		return $this->belongsToMany('Skill');
	}

	public function courses()
	{
		return $this->belongsToMany('Course','course_user')->withPivot('score');
	}

	public function offers(){
		return $this->hasMany('Offer');
	}

	public function projects(){
		return $this->hasMany('Project');
	}

	public function getGenderText() {
		if($this->attributes['gender']==1) {
			return 'Male';
		}
		return 'Female';
	}

	public function isAdmin(){
		if($this->type==2){
			return true;
		}

		return false;
	}

	public function isFreelancer(){
	if($this->type==1){
			return true;
		}

		return false;
	}

}
