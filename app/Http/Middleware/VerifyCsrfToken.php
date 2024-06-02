<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'upload', // Đường dẫn cho việc tải lên ảnh đại diện
        'uploads', // Đường dẫn cho việc tải lên nhiều ảnh sản phẩm
    ];
}
