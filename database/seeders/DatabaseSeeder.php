<?php

use App\Models\User;

User::factory(1)->create(
[
    'name' => 'Luke Skywalker',
    'email' => 'luke@jedi.com',
]
);
