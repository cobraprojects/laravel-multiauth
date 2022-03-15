<?php

namespace CobraProjects\Multiauth\Tests\Feature;

use CobraProjects\Multiauth\Tests\TestCase;

class RedirectTest extends TestCase
{
    /** @test */
    public function it_will_redirect_after_login_to_route_define_in_config()
    {
        app()['config']->set('multiauth.redirect_after_login', '/newPath');

        $admin = $this->createAdmin();
        $res   = $this->post(route('admin.login'), ['email' => $admin->email, 'password' => 'secret']);
        $res->assertRedirect('/newPath');
    }
}
