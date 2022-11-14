<?php

namespace App\Services;

use App\Services\Twitter;
use App\Services\Facebook;
use App\Services\SocialNetworkRule;

final class SocialUrlParser
{
    private array $socialNetworks = [];

    public function setSocialNetworks(SocialNetworkRule ...$socialNetworks): void
    {
        $this->socialNetworks = $socialNetworks;
    }

    public function getType(string $url): string
    {
        /** @var SocialNetworkRule $socialNetwork */
        foreach ($this->socialNetworks as $socialNetwork) {
            $regex = $socialNetwork->getRegexRule();
            if (preg_match($regex, $url)) {
                return $socialNetwork->getName();
            }
        }

        throw new \RuntimeException('invalid_social_network_url');
    }
}
