<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// $question->answers will first look in table for column name if not it finds it in model relationship method
class Question extends Model
{
    protected $fillable = ['title', 'body'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function answers() {
        return $this->hasMany(Answer::class);
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
        return route("questions.show", $this->slug);
    }

    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function getAnswerStatusAttribute() {

        $status = "";

        if ($this->answers_count <= 0) {
            $status = "unanswered";
        } else {
            if (is_null($this->best_answer_id)) {
                $status = "answered";
            } else {
                $status = "answer-accepted";
            }
        }

        return $status;
    }

    public function getBodyHtmlAttribute() {

        return \Parsedown::instance()->text($this->body);

    }

    public function getBodyForIndexAttribute() {

        return \Parsedown::instance()->setMarkupEscaped(true)->text($this->body);

    }
}
