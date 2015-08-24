<?php

class SupportControllerTest extends TestCase
{
    public function tearDown()
    {
        Mockery::close();
    }

    public function test_displays_form_to_submit_support_request()
    {
        $this->call('GET', 'support/create');
        $this->assertResponseOk();
    }

    public function test_submits_support_request_upon_form_submission()
    {
        $postData = [
            'email' => 'john@example.com',
            'body' => 'lorem ipsum'
        ];

        $this->call('POST', 'support/store', $postData);
    }
}