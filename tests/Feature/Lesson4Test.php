<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class Lesson4Test extends TestCase
{
    public function test1()
    {
        $response = $this->get('/feedback/create');
        $response->assertStatus(200);
    }
    public function test2()
    {
        $response = $this->get('/feedback');
        $response->assertStatus(200);
    }
    public function test3()
    {
        $response = $this->post(route('feedback.store'),['category_id' => 1, 'email' => 'ee@tt.ru', 'title' => 'title','description' => 'desc']);
        $response->assertRedirect(route('feedback.index',['status' => 1]));
    }
    public function test4()
    {
        $response = $this->view('feedback.index',['status' => 1]);
        $response->assertSee('Обращение создано');
    }
    public function test5()
    {
        $response = $this->view('feedback.index',['status' => 0]);
        $response->assertDontSee('Обращение создано');
    }
    public function test6()
    {
        $response = $this->get('/admin/news');
        $response->assertStatus(200);
    }
    public function test7()
    {
        $response = $this->get('/admin/news/create');
        $response->assertStatus(200);
    }
    public function test8()
    {
        $response = $this->post(route('news.store'),['category_id' => 1, 'title' => 'title','description' => 'desc']);
        $response->assertRedirect(route('news.index'));
    }

}
