<?php

namespace App\Enums;

enum PostStatus: string
{
    case PENDING = 'pending';
    case ACCEPTED = 'active';
    case REJECTED = 'rejected';
}
