<?php

namespace App\Livewire\Admin;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostManager extends Component
{
    use WithPagination, WithFileUploads;

    public $isOpen = false;
    public $postId = null;
    public $title, $slug, $excerpt, $body, $is_published = true;
    public $image, $existingImage;

    protected $rules = [
        'title' => 'required|min:3|max:255',
        'excerpt' => 'nullable|max:500',
        'body' => 'required',
        'image' => 'nullable|image|max:2048',
    ];

    public function render()
    {
        return view('livewire.admin.post-manager', [
            'posts' => Post::with('user')->latest()->paginate(10)
        ]);
    }

    public function create()
    {
        $this->resetInput();
        $this->isOpen = true;
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $this->postId = $post->id;
        $this->title = $post->title;
        $this->slug = $post->slug;
        $this->excerpt = $post->excerpt;
        $this->body = $post->body;
        $this->existingImage = $post->featured_image;
        $this->is_published = $post->is_published;
        $this->isOpen = true;
    }

    public function save()
    {
        $this->validate();

        $imagePath = $this->existingImage;
        if ($this->image) {
            if ($this->existingImage) {
                Storage::disk('public')->delete($this->existingImage);
            }
            $imagePath = $this->image->store('posts', 'public');
        }

        Post::updateOrCreate(
            ['id' => $this->postId],
            [
                'user_id' => auth()->id(),
                'title' => $this->title,
                'slug' => Str::slug($this->title),
                'excerpt' => $this->excerpt ?? Str::limit(strip_tags($this->body), 150),
                'body' => $this->body,
                'featured_image' => $imagePath,
                'is_published' => $this->is_published,
                'published_at' => $this->is_published ? now() : null,
            ]
        );

        session()->flash('message', 'Post saved successfully!');
        $this->closeModal();
    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);
        if ($post->featured_image) {
            Storage::disk('public')->delete($post->featured_image);
        }
        $post->delete();
        session()->flash('message', 'Post deleted.');
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->resetInput();
    }

    private function resetInput()
    {
        $this->reset(['postId', 'title', 'slug', 'excerpt', 'body', 'image', 'existingImage', 'is_published']);
    }
}