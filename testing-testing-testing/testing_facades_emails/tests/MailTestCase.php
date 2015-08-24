<?php

use GuzzleHttp\Psr7\Response;

class MailTestCase extends TestCase
{
    protected $mailcatcher;

    function __construct()
    {
        $this->mailcatcher = new \GuzzleHttp\Client(['base_uri' => 'http://localhost:1080']);
    }

    public function getAllEmails()
    {
        $emails = (json_decode((string)$this->mailcatcher->get('/messages')->getBody()));

        if (empty($emails)) {
            $this->fail('No messages');
        }

        return $emails;
    }

    public function deleteAllEmails()
    {
        $this->mailcatcher->delete('/messages');
    }

    public function getLastEmail()
    {
        $emailId = last($this->getAllEmails())->id;

        return $this->mailcatcher->get("/messages/{$emailId}.json");
    }

    public function assertEmailBodyContains($body, Response $email)
    {
        $this->assertEquals($body, (string)$email->getBody());
    }

    public function assertNotEmailBodyContains($body, Response $email)
    {
        $this->assertNotEquals($body, (string)$email->getBody());
    }

    public function assertEmailWasSentTo($recipient, Response $email)
    {
        $recipients = (json_decode((string)$email->getBody()));

        $recipients = $recipients->recipients;

        $this->assertContains("<{$recipient}>", $recipients);
    }

    public function assertNotEmailWasSentTo($recipient, Response $email)
    {
        $recipients = (json_decode((string)$email->getBody()));

        $recipients = $recipients->recipients;

        $this->assertNotContains("<{$recipient}>", $recipients);
    }
}
