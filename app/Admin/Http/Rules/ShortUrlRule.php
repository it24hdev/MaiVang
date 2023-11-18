<?php

namespace App\Admin\Http\Rules;

use App\Admin\Models\ShortUrl;
use Illuminate\Contracts\Validation\Rule;

class ShortUrlRule implements Rule
{
    protected $id;
    protected $type;

    public function __construct($id = null, $type = null)
    {
        $this->id = $id;
        $this->type = $type;
    }

    public function passes($attribute, $value)
    {
        if (!$this->id) {
            // It's a new record, check if url_key exists in ShortUrl table
            $exists = ShortUrl::where('url_key', $value)->exists();
            return !$exists;
        }

        // It's an existing record, check if url_key exists for records with type not equal to $this->type
        $exists = ShortUrl::where('url_key', $value)->where('type', '<>', $this->type)->exists();
        return !$exists;
    }

    public function message()
    {
        return 'Đường dẫn đã được sử dụng';
    }
}


