<?php

namespace App\Http\Livewire\Comments;

use App\Models\Comments;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Comment extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $newComment;
    // public $comments;

    public function mount()
    {
        // $initialComment = Comments::with('creator')->latest()->limit(2)->get();
        // $initialComment = Comments::with('cobine')->latest()->limit(2)->get();
        // echo '<pre>';
        // print_r($initialComment->toArray());
        // die;
        // $this->comments = $initialComment;
    }

    public function addCommet()
    {

        $this->validate([
            'newComment' => "required|max:255"
        ]);

        $comment = new Comments;
        $comment->body = $this->newComment;
        $comment->user_id = 1;
        $comment->save();

        // $this->comments = $this->comments->prepend($comment);
        // $this->comments = Comments::with('creator')->latest()->limit(2)->get();
        $this->newComment = "";
    }

    public function remove($id)
    {
        // $this->comments = $this->comments->where('id', '!=', $id);
        $comment = Comments::find($id);
        if ($comment) {
            $comment->delete();
        }
        // $this->comments = Comments::with('creator')->latest()->limit(2)->get();
        session()->flash('success', 'Your comment has been removed');
    }

    public function render()
    {
        $comments = Comments::with('creator')->latest()->paginate(2);
        return view('livewire.comments.comment', compact('comments'));
    }
}
