<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Contact extends Model
{
    use HasFactory;
    use softDeletes;
    public $timestapms = true;
    protected $table = "contact";

    protected $fillable = ["first_name", "middle_name", "last_name", "status", "referral_source", "position_title", "industry",
    "project_type", "company", "project_description", "description", "budget", "website", "linkedin",
    "address_street", "address_city", "address_state", "address_country", "address_zipcode", "created_by_id",
    "modified_by_id", "assigned_user_id"];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    public function modifiedBy()
    {
        return $this->belongsTo(User::class, 'modified_by_id');
    }

    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_user_id');
    }

    public function getStatus()
    {
        return $this->belongsTo(ContactStatus::class, 'status');
    }

    public function documents()
    {
        return $this->belongsToMany(Document::class, 'contact_document', 'contact_id', 'document_id');
    }

    public function emails()
    {
        return $this->hasMany(ContactEmail::class, 'contact_id');
    }

    public function phones()
    {
        return $this->hasMany(ContactPhone::class, 'contact_id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, 'contact_id');
    }

    public function getName()
    {
        return $this->first_name . (!empty($this->middle_name)?" " . $this->middle_name . " ":"") . (!empty($this->last_name)?" " . $this->last_name:"");
    }

}
