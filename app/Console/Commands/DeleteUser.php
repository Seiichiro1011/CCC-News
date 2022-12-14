<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class DeleteUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'account:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'account delete';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::where(
            'deleted_at',
            '<=',
            now()->subDays(30)->toDateTimeString()
        )->get();

        $users->each->forceDelete();
    }
}
