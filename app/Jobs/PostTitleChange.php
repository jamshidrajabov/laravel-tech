<?php

namespace App\Jobs;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class PostTitleChange implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $post;
    /**
     * Create a new job instance.
     *
     * @
    /**
     * Create a new job instance.
     */
    public function __construct(Post $post)
    {
        $this->post=$post;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        info('job is working');
        $this->post->title='qqqqqqq';
        $this->post->save();
    }
}
