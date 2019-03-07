<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['title', 'body'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    // Mutators
    // Modify data after attribute is set.
    public function setTitleAttribute($value) {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }

    // Accessor
    // Create new attribute that doesnt exist in db
    // get { AttributeName } Attribute
    // use: User::first()->url
    public function getUrlAttribute()
    {
        return route("questions.show", $this->id);
    }

    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }
}
