<?php

namespace App\Admin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    use HasFactory;
    protected $fillable = [
        'logo',
        'product_image_sm',
        'product_image_md',
        'product_image_lg',
        'product_image_license',
        'product_image_type',
        'post_image_sm',
        'post_image_md',
        'post_image_lg',
        'post_image_license',
        'post_image_type',
        'email_general',
        'email_receive_order',
        'email_contact',
        'config_mail_mailer',
        'config_mail_host',
        'config_mail_port',
        'config_mail_username',
        'config_mail_password',
        'config_mail_encryption',
        'config_mail_from_name',
        'seo_title',
        'seo_keyword',
        'seo_description',
        'about_us',
        'contact_us',
    ];
}
