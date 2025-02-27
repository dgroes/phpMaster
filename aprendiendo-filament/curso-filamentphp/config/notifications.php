<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Notification Channels
    |--------------------------------------------------------------------------
    |
    | Here you may configure the default channels that will be used for sending
    | notifications to your users. By default, Laravel uses mail and database
    | channels, but you may add others like SMS, Slack, etc.
    |
    */

    'channels' => [
        'mail' => [
            'driver' => 'mail',
        ],

        'database' => [
            'driver' => 'database',
        ],

        // Otros canales que puedas necesitar
    ],

];
