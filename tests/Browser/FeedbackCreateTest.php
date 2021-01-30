<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class FeedbackCreateTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_feedbackEdit1()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/feedback/3/edit')
                ->assertSee('Редактировать запись');
        });
    }
    public function test_feedbackEdit2Example()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/feedback/3/edit')
                ->type('email','test@test.ru')
                ->press('save')
                ->assertSee('Обращение обновлено');
        });
    }
}
