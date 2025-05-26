<?php
return [
    'link_max_days' => env('LINK_MAX_DAYS', 7),
    'last_count_game' => env('LAST_COUNT_GAME', 3),

    'cache_keys' => [
        'history_games_prefix' => 'history_games_',
    ],
];
