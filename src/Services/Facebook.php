<?php

namespace App\Services;

final class Facebook implements SocialNetworkRule
{
    public const NAME = 'facebook';

    public function getRegexRule(): string
    {
        return '/(?:(?:http|https):\/\/)?(?:www.)?facebook.com/';
    }

    public function getName(): string
    {
        return self::NAME;
    }
}
