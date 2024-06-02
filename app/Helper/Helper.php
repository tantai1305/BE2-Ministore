<?php

namespace   App\Helper;

class Helper {
    public static function active($active = 0) {
        return $active == 0 ? '<span>Không</span>' : '<span>Có</span>';
    }
}

