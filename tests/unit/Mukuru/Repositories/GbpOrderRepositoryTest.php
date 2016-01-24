<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Mockery as m;

class GbpOrderRepositoryTest extends TestCase
{
    public function test_postSave_returns_true_if_notification_email_is_sent()
    {
        $order = new \Mukuru\Models\Order();

        $guzzle = new \GuzzleHttp\Psr7\Response(200);

        $mailer = m::mock('\Illuminate\Mail\Mailer');
        $mailer->shouldReceive('send')
            ->andReturn($guzzle)
            ->getMock();

        $repo = new \Mukuru\Repositories\GbpOrderRepository($order, $mailer);

        $return = $repo->postSave();

        $this->assertTrue($return);
    }

    public function test_postSave_returns_false_if_notification_email_fails()
    {
        $order = new \Mukuru\Models\Order();

        $guzzle = new \GuzzleHttp\Psr7\Response(400);

        $mailer = m::mock('\Illuminate\Mail\Mailer');
        $mailer->shouldReceive('send')
            ->andReturn($guzzle);

        $repo = new \Mukuru\Repositories\GbpOrderRepository($order, $mailer);

        $return = $repo->postSave();

        $this->assertFalse($return);
    }

}
