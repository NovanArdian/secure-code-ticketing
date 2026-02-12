?<?php
use Illuminate\Support\Facades\Route;

Route::get('/vulnerable/search', function (\Illuminate\Http\Request $request) {
    $query = $request->input('q');
    return view('vulnerable.search', compact('query'));
});
    // Komentar aman
    Route::post('/vulnerable/comment', function (\Illuminate\Http\Request $request) {
        $validated = $request->validate([
            'comment' => 'required|string|max:500',
        ]);
        // Sanitize HTML
        $comment = strip_tags($validated['comment']);
        return view('vulnerable.comment', compact('comment'));
    });

use App\Http\Controllers\TicketController;

Route::resource('tickets', TicketController::class);
Route::get('/', function () {
    return view('welcome');
});
