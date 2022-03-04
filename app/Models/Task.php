<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Task extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tasks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['category_id', 'title', 'body', 'start_date', 'end_date'];

    /**
     * Set the Task's title
     *
     * @param  string  $value
     * @return void
     */
    public function setTitleAttribute($value)
    {
        return $this->attributes['title'] = Str::lower($value);
    }

    /**
     * Get the Task's title
     *
     * @param  string  $value
     * @return string
     */
    public function getTitleAttribute($value)
    {
        return Str::ucfirst($value);
    }

    /**
     * Set the Task's body.
     *
     * @param  string  $value
     * @return void
     */
    public function setBodyAttribute($value)
    {
        return $this->attributes['body'] = Str::lower($value);
    }

    /**
     * Get the User which is being relationed with the task.
     *
     * @param  string  $value
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

     /**
     * Get the Category which is being relationed with the task.
     *
     * @param  string  $value
     * @return void
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
