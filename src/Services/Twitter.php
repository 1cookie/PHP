<?php

namespace App\Services;

final class Twitter implements SocialNetworkRule
{
    public const NAME = 'twitter';

    public function getRegexRule(): string
    {
        return '/(?:(?:http|https):\/\/)?(?:www.)?twitter.com/';
    }

    public function getName(): string
    {
        return self::NAME;
    }
}
