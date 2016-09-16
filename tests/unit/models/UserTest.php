<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use App\Application;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test.
     */
    public function it_can_have_applications()
    {
        $users = factory(User::class, 2)->create();
        factory(Application::class, 3)->create([ 'user_id' => $users[0]->id ]);

        $this->assertCount(3, $users[0]->applications()->get());
        $this->assertCount(0, $users[1]->applications()->get());

        $application = factory(Application::class)->create([ 'user_id' => $users[1]->id ]);

        $this->assertCount(1, $users[1]->applications);
        $this->assertEquals($application->user_id, $users[1]->id);
    }
}
