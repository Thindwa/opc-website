<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class TestLogin extends Command
{
    protected $signature = 'test:login';
    protected $description = 'Test login functionality';

    public function handle()
    {
        $this->info('Testing login functionality...');

        // Test 1: Check if user exists
        $user = User::first();
        if (!$user) {
            $this->error('No user found!');
            return;
        }

        $this->info("User found: {$user->email}");

        // Test 2: Check password
        $password = '12345678';
        $isValidPassword = Hash::check($password, $user->password);
        $this->info("Password check: " . ($isValidPassword ? 'PASS' : 'FAIL'));

        // Test 3: Test authentication
        $credentials = ['email' => $user->email, 'password' => $password];
        $authResult = Auth::attempt($credentials);
        $this->info("Auth attempt: " . ($authResult ? 'SUCCESS' : 'FAILED'));

        if ($authResult) {
            $this->info("Authenticated user: " . Auth::user()->email);
            Auth::logout();
        }

        // Test 4: Check user attributes
        $this->info("Email verified: " . ($user->email_verified_at ? 'YES' : 'NO'));
        $this->info("User ID: {$user->id}");
        $this->info("Created: {$user->created_at}");

        // Test 5: Check roles
        $roles = $user->roles;
        $this->info("Roles count: " . $roles->count());
        foreach ($roles as $role) {
            $this->info("Role: {$role->name}");
        }

        // Test 6: Create a fresh user for testing
        $this->info("\nCreating a fresh test user...");
        $testUser = User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password123'),
            'email_verified_at' => now(),
        ]);

        $this->info("Test user created: {$testUser->email}");

        // Test login with new user
        $testCredentials = ['email' => 'test@example.com', 'password' => 'password123'];
        $testAuthResult = Auth::attempt($testCredentials);
        $this->info("Test user auth: " . ($testAuthResult ? 'SUCCESS' : 'FAILED'));

        if ($testAuthResult) {
            Auth::logout();
        }

        $this->info("\nLogin test completed!");
    }
}
