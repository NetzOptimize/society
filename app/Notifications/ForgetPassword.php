<?php

namespace App\Notifications;

use App\Models\PasswordResetToken;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use ILLuminate\Support\Str;

class ForgetPassword extends Notification
{
    use Queueable;
    private $user;

    /**
     * Create a new notification instance.
     */
    public function __construct($user)
    {
        $this->user =$user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        $token = Str::random(60);
        $passwordReset = PasswordResetToken::where('email', $this->user->email)->first();
        if($passwordReset){
            $passwordReset->token = $token;
            $passwordReset->expires_at = Carbon::now('Asia/Kolkata')->format('Y-m-d H:i:s');
            $passwordReset->save();
        }else{
            $passwordReset = new PasswordResetToken();
            $passwordReset->email = $this->user->email;
            $passwordReset->token = $token;
            $passwordReset->expires_at = Carbon::now('Asia/Kolkata')->addDay()->format('Y-m-d H:i:s');
            $passwordReset->save();
        }
        return (new MailMessage)
            ->line($this->user->name.' Click On The Following Link To Reset Your Password :')
            ->action('Reset Password', route('forget', $token))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
