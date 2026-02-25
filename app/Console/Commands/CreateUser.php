<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->ask('What is your name?');
        $family = $this->ask('What is your family?');
        $mobile = $this->ask('What is your mobile number?');
        $username = $this->ask('What is your username?');
        $password = $this->secret('What is your password?');

        $user = User::create([
            'name' => $name,
            'family' => $family,
            'mobile' => $mobile,
            'username' => $username,
            'password' => Hash::make($password),
        ]);

        $this->info("User {$user->name} created successfully!");
    }
}
