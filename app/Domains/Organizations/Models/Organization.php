<?php


namespace App\Domains\Organizations\Models;


use App\Models\Team;
use App\Traits\CreatedBy;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use CreatedBy;

    protected $with = ['verifications'];

    public function isVerified()
    {
        return (bool)optional($this->verifications->latest()->first())->status;
    }

    public function teams()
    {
        return $this->hasMany(Team::class,'organization_id','id');
    }

    public function vendors()
    {
        return $this->hasMany(Organization::class,'sent_to','id')->where('status',1);
    }

    public function invitees()
    {
        return $this->hasMany(Organization::class,'sent_to','id')->where('status',0);
    }

    public function branches()
    {
        return $this->hasMany(Branch::class);
    }

    public function verifications()
    {
        return $this->hasMany(OrganizationVerification::class);
    }

}
