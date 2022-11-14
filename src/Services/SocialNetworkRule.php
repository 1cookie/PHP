<?php

namespace App\Services;

interface SocialNetworkRule
{
    public function getRegexRule(): string;
    public function getName(): string;
}
