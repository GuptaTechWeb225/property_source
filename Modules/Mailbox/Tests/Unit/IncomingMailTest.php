<?php

namespace Modules\Mailbox\Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\Mail;
use Modules\Mailbox\Emails\TestMail;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class IncomingMailTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }
    public function setUp(): void
    {
        parent::setUp();

        config(['mail.driver' => 'log']);
    }

    function incoming_mail_is_saved_to_the_mails_table() {
        // Given: we have an e-mail﻿
        $email = new TestMail(
                $sender = 'sender@example.com',
                $subject = 'Test E-mail',
                $body = 'Some example text in the body'
            );
    
        // When: we receive that e-mail
        Mail::to('incoming@johnbraun.blog')->send($email);
    
        // Then: we assert the e-mails (meta)data was stored
        $this->assertCount(1, ReceivedMail::all());
    
        tap(ReceivedMail::first(), function ($mail) use ($sender, $subject, $body) {
            $this->assertEquals($sender, $mail->sender);    
            $this->assertEquals($subject, $mail->subject);    
            $this->assertStringContainsString($body, $mail->body);    
        });
      }
}
