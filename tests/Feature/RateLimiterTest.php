<?php


use App\Models\User;

describe('Rate limiter', function () {
    it('limits requests', function (string $type, int $limit, string $route) {
        $user = User::factory()->create();

        for ($i = 0; $i < $limit; $i++) {
            $this
                ->actingAs($user)
                ->get($route)
                ->assertOk();
        }

        $this
            ->actingAs($user)
            ->get($route)
            ->assertStatus(429);
    })->with([
        ['api', 60, '/api/user'],
        ['web', 20, '/'],
    ]);
});
