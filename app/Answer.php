<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['body', "question_id"];

    public function question() {
        return $this->belongsTo(Question::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getBodyHtmlAttribute() {

        return \Parsedown::instance()->text($this->body);

    }

    public function getCreatedDateAttribute() {
        return $this->created_at->diffForHumans();
    }

    public static function boot() {
        parent::boot();

        // laravel Eloquent Events
        // created -> an Event that will be fired after new data is saved in db
        static::created(function ($answer) {
            $answer->question->increment('answers_count');
        });

        static::deleted(function ($answer) {
            $answer->question->decrement('answers_count');
        });
    }
}
