<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailLog extends Model
{
    use HasFactory;

    protected $fillable = ['from_email', 'to_email', 'subject', 'mail_body', 'date_sent'];
}   
