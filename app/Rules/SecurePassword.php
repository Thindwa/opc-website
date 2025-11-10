<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class SecurePassword implements Rule
{
    private $message = '';

    /**
     * Determine if the validation rule passes.
     */
    public function passes($attribute, $value): bool
    {
        $password = $value;
        $config = config('security.password');

        // Check minimum length
        if (strlen($password) < $config['min_length']) {
            $this->message = "Password must be at least {$config['min_length']} characters long.";
            return false;
        }

        // Check for uppercase letter
        if ($config['require_uppercase'] && !preg_match('/[A-Z]/', $password)) {
            $this->message = 'Password must contain at least one uppercase letter.';
            return false;
        }

        // Check for lowercase letter
        if ($config['require_lowercase'] && !preg_match('/[a-z]/', $password)) {
            $this->message = 'Password must contain at least one lowercase letter.';
            return false;
        }

        // Check for number
        if ($config['require_numbers'] && !preg_match('/[0-9]/', $password)) {
            $this->message = 'Password must contain at least one number.';
            return false;
        }

        // Check for special character
        if ($config['require_symbols'] && !preg_match('/[^A-Za-z0-9]/', $password)) {
            $this->message = 'Password must contain at least one special character.';
            return false;
        }

        // Check for common passwords
        $commonPasswords = [
            'password', '123456', 'password123', 'admin', 'qwerty',
            'letmein', 'welcome', 'monkey', '1234567890', 'abc123'
        ];

        if (in_array(strtolower($password), $commonPasswords)) {
            $this->message = 'Password is too common. Please choose a more secure password.';
            return false;
        }

        // Check for repeated characters
        if (preg_match('/(.)\1{2,}/', $password)) {
            $this->message = 'Password cannot contain more than 2 consecutive identical characters.';
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return $this->message;
    }
}
