<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Ticket;

class TicketCrudTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_ticket()
    {
        $response = $this->post('/tickets', [
            'title' => 'Test Ticket',
            'description' => 'Test Description',
            'status' => 'open',
        ]);
        $response->assertRedirect();
        $this->assertDatabaseHas('tickets', ['title' => 'Test Ticket']);
    }

    /** @test */
    public function user_can_view_ticket_detail()
    {
        $ticket = Ticket::factory()->create();
        $response = $this->get('/tickets/' . $ticket->id);
        $response->assertStatus(200);
        $response->assertSee($ticket->title);
    }

    /** @test */
    public function user_can_update_ticket()
    {
        $ticket = Ticket::factory()->create();
        $response = $this->put('/tickets/' . $ticket->id, [
            'title' => 'Updated Title',
            'description' => 'Updated Description',
            'status' => 'closed',
        ]);
        $response->assertRedirect();
        $this->assertDatabaseHas('tickets', ['title' => 'Updated Title', 'status' => 'closed']);
    }

    /** @test */
    public function user_can_delete_ticket()
    {
        $ticket = Ticket::factory()->create();
        $response = $this->delete('/tickets/' . $ticket->id);
        $response->assertRedirect();
        $this->assertDatabaseMissing('tickets', ['id' => $ticket->id]);
    }
}
