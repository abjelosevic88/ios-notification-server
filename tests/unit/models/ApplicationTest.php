<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use App\Application;
use App\Message;

class ApplicationTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     */
    public function it_belongs_to_single_user()
    {
        $users = factory(User::class, 2)->create();
        $applications1 = factory(Application::class, 2)->create([ 'user_id' => $users[0]->id ]);
        $application2 = factory(Application::class)->create([ 'user_id' => $users[1]->id ]);

        $this->assertEquals($applications1[0]->user_id, $users[0]->id);
        $this->assertEquals($application2->user_id, $users[1]->id);
    }

    /**
     * @test
     */
    public function it_can_have_messages()
    {
        $user = factory(User::class)->create();
        $apps = factory(Application::class, 2)->create([ 'user_id' => $user->id ]);

        $messages = factory(Message::class, 3)->create([ 'application_id' => $apps[0]->id ]);

        $this->assertCount(3, $apps[0]->messages()->get());
        $this->assertCount(0, $apps[1]->messages()->get());
        $this->assertEquals($apps[0]->id, $messages[0]->application_id);
    }
}
