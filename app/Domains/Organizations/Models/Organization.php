<?php


namespace App\Domains\Organizations\Models;


use App\Models\Team;
use App\Models\User;
use App\Traits\CreatedBy;
use App\Traits\HasFiles;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use CreatedBy, HasFiles;

    protected $with = ['verifications'];

    public function isVerified()
    {
        return (bool)optional($this->verifications->latest()->first())->status;
    }

    public function teams()
    {
        return $this->hasMany(Team::class, 'organization_id', 'id');
    }

    public function members()
    {
        return $this->hasManyThrough(User::class,);
    }

    public function vendors()
    {
        return $this->hasMany(Organization::class, 'sent_to', 'id')->where('status', 1);
    }

    public function invitees()
    {
        return $this->hasMany(Organization::class, 'sent_to', 'id')->where('status', 0);
    }

    public function branches()
    {
        return $this->hasMany(Branch::class);
    }

    public function verifications()
    {
        return $this->hasMany(OrganizationVerification::class);
    }

    public function offerings()
    {
        return $this->hasMany(Offerings::class, 'organization_id', 'id');
    }

    public function products()
    {
        return $this->offerings()->where('type', 'Product');
    }

    public function services()
    {
        return $this->offerings()->where('type', 'Service');
    }

}
