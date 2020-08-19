<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ContactControllerTest extends WebTestCase
{
    public function testWeCanContact()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/contact');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorExists("#contact_email");
        $this->assertSelectorExists("#contact_message");
    }
}
