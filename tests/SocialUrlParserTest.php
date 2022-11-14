<?php declare(strict_types=1);

namespace App\Tests;

use App\Services\Facebook;
use App\Services\LinkedIn;
use App\Services\Twitter;
use PHPUnit\Framework\TestCase;
use App\Services\SocialUrlParser;

final class SocialUrlParserTest extends TestCase
{
    /**
     * @dataProvider socialNetworkProvider
     */
    public function testItReturnsCorrectType(string $url, ?string $expectedType): void
    {
        $socialNetworks = [
            new Facebook(),
            new Twitter(),
            new LinkedIn()
        ];
        $parser = new SocialUrlParser();
        $parser->setSocialNetworks(...$socialNetworks);

        $this->assertSame($expectedType, $parser->getType($url));
    }

    public function testItThrowsExceptionForInvalidUrl(): void
    {
        $socialNetworks = [
            new Facebook(),
            new Twitter(),
            new LinkedIn()
        ];
        $parser = new SocialUrlParser();
        $parser->setSocialNetworks(...$socialNetworks);

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('invalid_social_network_url');

        $parser->getType('https://q.agency');
    }

    public function socialNetworkProvider(): array
    {
        return [
            ['https://www.facebook.com/teste...', Facebook::NAME],
            ['https://www.linkedin.com/in/te...', LinkedIn::NAME],
            ['https://twitter.com/tester', Twitter::NAME],
        ];
    }
}
