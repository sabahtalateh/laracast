<?php

use Illuminate\Support\Debug\Dumper;
use Illuminate\Support\Facades\Mail;

class MailTest extends MailTestCase
{
    /** @test */
    function it_sends_an_email()
    {
        $this->call('GET', 'emailtest');

        $email = $this->getLastEmail();

//        $this->assertEmailBodyContains('OOPPP!!!
//', $email);
        $this->assertEmailWasSentTo('sabahtalateh@gmail.com', $email);

    }
}
