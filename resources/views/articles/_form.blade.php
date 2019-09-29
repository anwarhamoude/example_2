<form method="POST" action="{{ $action }}">
    @csrf
    @isset($article->id)
        {{ method_field('patch')}}
    @endisset
    <div class="flex">
        <input id="title" type="text" class="card-inner w-full @error('title') is-invalid @enderror" name="title" value="{{ $article->title ?? '' }}" autocomplete="title" autofocus placeholder="enter article title...">
    </div>

    @error('title')
    <span class="invalid-feedback ml-31.6%" role="alert"><strong>{{ $message }}</strong></span>
    @enderror

    <div class="flex mt-11">
        <textarea id="content" class="card-inner w-full @error('content') is-invalid @enderror" name="content" rows="30" autocomplete="content" placeholder="compose a lyrical masterpiece...">{{ $article->content ?? '' }}</textarea>
    </div>

    @error('content')
    <span class="invalid-feedback ml-31.6%" role="alert"><strong>{{ $message }}</strong></span>
    @enderror

    <div class="flex flex-center mt-11">
        <button type="submit" class="btn-login">{{ __('enter article data') }}</button>

        @empty($article->id)
        <a href="{{ route('articles.index') }}" class="btn-cancel ml-20">cancel</a>
        @endempty
    </div>
</form>

        @isset($article->id)
        <div class="flex">
            <a href="{{ route('articles.show',[$article->slug]) }}" class="btn-cancel ml-0">cancel</a>
            <div>
                <form method="post" action="{{ route('articles.delete',[$article->slug]) }}">
                @csrf
                @method('delete')
                <button class="button-red">delete</button>
                </form>
            </div>
        </div>
        @endisset

<div class="mb-100"><br/></div>



