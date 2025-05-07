<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function show(Tag $tag)
    {
        $jobs = $tag->jobs()
            ->with(['tags', 'company'])
            ->latest()
            ->paginate(12);

        return view('tags.show', compact('tag', 'jobs'));
    }
}
