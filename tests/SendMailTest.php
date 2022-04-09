<?php

namespace App\Testsl;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SendMailTest extends WebTestCase {
    public function emails_are_sent_correctly(){
        $client = static::createClient();
        $client->request('GET','/email');
        
    }
}

?>