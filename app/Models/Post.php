<?php
/**
 * Created by PhpStorm.
 * User: GideonST
 * Date: 12/28/2017
 * Time: 9:59 AM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = ['title', 'body'];
}