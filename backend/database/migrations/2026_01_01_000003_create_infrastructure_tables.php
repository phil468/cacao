<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cache', fn (Blueprint $t) => [$t->string('key')->primary(), $t->mediumText('value'), $t->integer('expiration')]);
        Schema::create('cache_locks', fn (Blueprint $t) => [$t->string('key')->primary(), $t->string('owner'), $t->integer('expiration')]);
        Schema::create('jobs', fn (Blueprint $t) => [$t->id(), $t->string('queue')->index(), $t->longText('payload'), $t->unsignedTinyInteger('attempts'), $t->unsignedInteger('reserved_at')->nullable(), $t->unsignedInteger('available_at'), $t->unsignedInteger('created_at')]);
        Schema::create('failed_jobs', fn (Blueprint $t) => [$t->id(), $t->string('uuid')->unique(), $t->text('connection'), $t->text('queue'), $t->longText('payload'), $t->longText('exception'), $t->timestamp('failed_at')->useCurrent()]);
    }

    public function down(): void
    {
        foreach (['failed_jobs', 'jobs', 'cache_locks', 'cache'] as $t) {
            Schema::dropIfExists($t);
        }
    }
};
