<?php

namespace App\Tests\Services;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Doctrine\ORM\EntityManager;

class RegistrationTest extends WebTestCase
{
    private $client;
    private ?EntityManager $entityManager;

    public function setUp(): void
    {
        $this->client = static::createClient();

        $this->entityManager = $this->client->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    public function tearDown(): void
    {
        parent::tearDown();
        
        $user = $this->entityManager->getRepository(User::class)->findOneBy(['email' => 'newuser@example.com']);
        
        if($user){
            $this->entityManager->remove($user);
            $this->entityManager->flush();
        }
        
        $this->client = null;
        $this->entityManager->close();
        $this->entityManager = null;
    }

    public function testRenderRegisterPage()
    {
        
        $crawler = $this->client->request('GET', '/register');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Register');
    }

    public function testSuccessfulRegister()
    {
        $crawler = $this->client->request('GET', '/register');

        $form = $crawler->selectButton('Register')->form([
            'registration_form[firstname]' => 'newuser',
            'registration_form[lastname]' => 'newuser',
            'registration_form[email]' => 'newuser@example.com',
            'registration_form[plainPassword]' => 'password',
        ]);

        $this->client->submit($form);
        $this->assertResponseRedirects('/login');
        $this->client->followRedirect();

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Please sign in');

        $user = $this->entityManager->getRepository(User::class)->findOneBy(['email' => 'newuser@example.com']);
        $this->assertNotNull($user);
        $this->assertEquals('newuser', $user->getFirstname());
        $this->assertEquals('newuser', $user->getLastname());
        $this->assertEquals('newuser@example.com', $user->getEmail());
        $this->assertNotNull($user->getPassword());
    }
}
