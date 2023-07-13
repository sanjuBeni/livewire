<div>
    {{-- {{ $newComment }} --}}
    @if (session()->has('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif
    @error('newComment')
        <span style="color: red">{{ $message }}</span><br />
    @enderror
    <input type="text" wire:model.debounce.500ms="newComment">
    <button wire:click="addCommet">Comment</button>

    <div>
        {{-- <form action="" wire:submit.prevent="myFun"></form> --}}
        @foreach ($comments as $comment)
            <div>
                <div>
                    <span class="comment-author">
                        {{-- {{ $comment- }} --}}
                    </span>
                    <span class="comment-date">
                        {{ $comment->created_at }}
                    </span>
                    <span class="comment-content">
                        {{ $comment->body }}
                    </span>
                    <button wire:click="remove({{ $comment->id }})">Delete</button>
                </div>
            </div>
        @endforeach
    </div>

    {{ $comments->links('livewire.comments.custom_pagination') }}

</div>
