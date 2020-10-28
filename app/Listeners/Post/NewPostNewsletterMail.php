<?php

namespace App\Listeners\Post;

use App\Events\Post\PostCreated;
use App\Mail\Post\NewPostMail;
use App\Models\Newsletter\Newsletter;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class NewPostNewsletterMail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PostCreated  $event
     * @return void
     */
    public function handle(PostCreated $event)
    {
        $newsletters = Newsletter::pluck('email');

        Mail::to($newsletters)->queue(new NewPostMail($event->post));
    }
}
