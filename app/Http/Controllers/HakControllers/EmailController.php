<?php

namespace App\Http\Controllers\HakControllers;

use App\Http\Controllers\Controller;
use App\Mail\UserEmailVerificationMail;
use App\Models\HakModels\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class EmailController extends Controller
{
    public function resendEmailVerification($id, Request $request)
    {
        try {
            // Decrypt the ID
            $userId = decrypt($id);

            // Find the user by ID
            $user = User::findOrFail($userId);

            // Check if the email is already verified
            if ($user->hasVerifiedEmail()) {

                return back()->with(
                    [
                        'message_info' => 'This user has already verified their email address.'
                    ]
                );
            }
            $userName = $user->name;
            // Send the email verification notification
            $verificationUrl = URL::temporarySignedRoute(
                'verification.verify',
                now()->addMinutes(60),
                // ['id' => encrypt($user->id), 'hash' => sha1($user->email)]
                ['id' => $user->id, 'hash' => sha1($user->email)]
            );
            Mail::to($user->email)->send(new UserEmailVerificationMail($verificationUrl, $userName));
            return back()->with(
                [
                    'message_success' => 'Verification email sent successfully!'
                ]
            );
        } catch (\Exception $e) {
            // Handle any exceptions
            return back()->with(
                [
                    'message_error' => 'An error occurred while sending the verification email.'
                ]
            );
        }
    }
}
