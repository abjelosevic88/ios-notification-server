<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use App\Application;

class ApplicationTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test.
     */
    public function it_belongs_to_single_user()
    {
        $users = factory(User::class, 2)->create();
        $applications1 = factory(Application::class, 2)->create([ 'user_id' => $users[0]->id ]);
        $application2 = factory(Application::class)->create([ 'user_id' => $users[1]->id ]);

        $this->assertEquals($applications1[0]->user_id, $users[0]->id);
        $this->assertEquals($application2->user_id, $users[1]->id);
    }
}
