<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use App\Application;
use App\Message;

class MessageTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     */
    public function it_belongs_to_single_application()
    {
        $user = factory(User::class)->create();
        $app = factory(Application::class)->create([ 'user_id' => $user->id ]);

        $messages = factory(Message::class, 3)->create([ 'application_id' => $app->id ]);

        $this->assertEquals($messages[0]->application_id, $app->id);
        $this->assertEquals($messages[1]->application_id, $app->id);
    }
}
