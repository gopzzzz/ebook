<?php

return [

    'driver' => 'bcrypt',

    'bcrypt' => [
        'rounds' => 10,
        'verify' => false, // ✅ VERY IMPORTANT (fix error)
    ],

    'argon' => [
        'memory' => 65536,
        'threads' => 1,
        'time' => 4,
    ],

];