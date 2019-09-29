<div class="container">
    <div class="center font-1-2/3 mb-30">Comment Section</div>
    <form method="post" action="{{ route('comments.store', $article->slug) }}">
        @csrf
        <div class="flex">
            <textarea class="card-inner w-full" rows="6" name="body" placeholder="Leave a comment" autofocus></textarea>
            <input type="hidden" value="{{ $article->id }}" name="article_id">
        </div>
        <div class="flex">
            <button type="submit" class="btn-create mr-0 mt-11">Save Comment</button>
        </div>
    </form>

    <div class="mb-30"><br/></div>

    <div>
        @foreach($article->comments->reverse() as $comment)
        <div class="mb-30">
            <div class="flex space-between">
                <div class="flex">
                    <div class="mr-20"><img src="/storage/{{ $comment->user->avatar() }}" style="width:64px;height:64px;" alt="No Image"></div>
                    <div class="font-1-1/3">{{ $comment->user->name }}</div>
                </div>

                <div class="z-100">
                    @if(Auth::id() == $comment->user_id)
                    <form method="post" action="{{ route('comment.delete',$comment->id) }}">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <div style="margin-top:-3px;"><button type="submit" class="btn-red">delete comment</button></div>
                    </form>
                    @endif
                </div>

            </div>
                    @if(Auth::id() == $comment->user_id)
                    <div class="card-outer-textarea">
                        <form method="post" action="{{ route('comment.update',$comment->id) }}">
                            @csrf
                            @method('PATCH')
                            <textarea name="body" rows="4" class="card-inner-textarea">{{ $comment->body }}</textarea>
                            <input type="hidden" value="{{ $article->id }}" name="article_id">
                            <button class="btn-edit ml-80 mt-4" type="submit">save edit</button>
                        </form>
                    </div>
                    @else
                            <div class="card-inner-body nl2br">{{ $comment->body }}</div>
                    @endif


        </div>
        @endforeach
    </div>
</div>
