<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

class RejectCourse extends Notification
{
    use Queueable;
    public $course;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($course)
    {
        $this->course = $course;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Curso Rechazado')
                    ->greeting('Hola '.$this->course->teacher->name)
                    ->line(new HtmlString('Recibes este correo para notificarte que tu curso <strong>' . $this->course->title . '</strong> fue rechazado'))
                    ->line('Motivos del rechazo')
                    ->line(new HtmlString($this->course->observation->body))
                    ->action('Modificar curso', route('instructor.courses.edit', $this->course))
                    ->line('Gracias por apoyar a la comunidad.');

    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
