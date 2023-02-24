<?php

declare(strict_types=1);

namespace Tests;

use NotificationFailure\Model;
use NotificationFailure\Notification as NotificationFailure;
use NotificationFailure\LogLevel;
use Illuminate\Support\Facades\Notification;

class DispatchTest extends \Orchestra\Testbench\TestCase
{
    public function testDispatch() : void
    {
        Notification::fake();

        $model = new Model(
            [
                'logLevel' => LogLevel::info->value,
                'problem' => 'There is a problem',
                'data' => ['key' => 'value']
			]
		);

        $user = User::factory()->create();

        Notification::assertNothingSent();

        /** @phpstan-ignore-next-line */
        $user->notify(new NotificationFailure($model));

        Notification::assertSentTo(
            [$user],
            NotificationFailure::class
        );
    }

    protected function defineDatabaseMigrations()
	{
		$this->loadLaravelMigrations();
	}
}
