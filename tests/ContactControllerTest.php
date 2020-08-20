<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ContactControllerTest extends WebTestCase
{
    public function testWeCanContact()
    {
        $client = static::createClient();
        $client->request('GET', '/contact');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorExists("#contact_email");
        $this->assertSelectorExists("#contact_message");
        $client->submitForm('Contacter', [
            'contact[email]' => 'test@smile.fr',
            'contact[message]' => 'test',
              ]);

        $this->assertResponseRedirects();
        $client->followRedirect();

        $this->assertSelectorTextContains('div.alert-success', 'Merci d\'avoir pris contact');
    }

    /**
     * Sad path / Unhappy path
     */
    public function testTheContactFormDisplaysErrors()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/contact');

        $email = $crawler->filter('#contact_email');
        $message = $crawler->filter('#contact_message');

        $this->assertCount(1, $email);
        $this->assertCount(1, $message);
    }

}
