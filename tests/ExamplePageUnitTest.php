<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ExamplePageUnitTest extends WebTestCase
{
    public function testSomething(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/example');

        $this->assertResponseIsSuccessful(); // Tests connection
        $this->assertSelectorTextContains('h1', 'ExampleController'); //Tests the existance not the exact content
    }
}

// https://symfony.com/doc/current/testing.html
// https://docs.phpunit.de/en/12.1/