<?php

namespace App\Console\Commands;

use App\Models\Tag;
use Illuminate\Console\Command;

class CountArticlesCommand extends Command
{
    protected $signature = 'tag:count {id}'; 

    public function handle()
    {
        $tagId = $this->argument('id');

        $tag = Tag::find($tagId);

        if (!$tag) {
            throw new \InvalidArgumentException("Tag with ID {$tagId} not found.");
        }

        $articleCount = $tag->articles()->count();

        $this->info("Number of articles attached to tag with ID {$tagId}: {$articleCount}");
    }
