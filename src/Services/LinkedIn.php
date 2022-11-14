<?php

namespace App\Services;

final class LinkedIn implements SocialNetworkRule
{
    public const NAME = 'linkedin';

    public function getRegexRule(): string
    {
        return '/(?:(?:http|https):\/\/)?(?:www.)?linkedin.com/';
    }

    public function getName(): string
    {
        return self::NAME;
    }
}
