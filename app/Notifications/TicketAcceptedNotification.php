<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TicketAcceptedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    private $ticket;

    public function __construct($ticket)
    {
        $this->ticket = $ticket;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
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
    public function databaseType(object $notifiable): string
    {
        return 'accepté-ticket';
    }
    public function toDatabase($notifiable){
        return [
            'Message' =>  'Votre Ticket a été accepté par '. $this->ticket->Technom.' '. $this->ticket->Techprenom,
            'ticket_id' => $this->ticket->id,
            'data'=>$this->ticket->toArray()
        
        ];
    }
}
