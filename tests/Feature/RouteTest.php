<?php

namespace CobraProjects\Multiauth\Tests\Feature;

use CobraProjects\Multiauth\Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RouteTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function an_invalid_route_return_with_404()
    {
        $this->withExceptionHandling();
        $this->logInAdmin();
        $this->get('/admin/home')->assertOk();
        $this->get('/admin/invalidRoute')->assertStatus(404);
    }
}
