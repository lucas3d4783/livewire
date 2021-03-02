<div class="container"> 
    Show Tweets

    <p>{{$content}}</p>

    <form action="" method="post" wire:submit.prevent="create"> {{-- usa o prevent para não atualizar a página --}}
        <input type="text" name="content" id="content" wire:model="content">
        @error('content') {{$message}} @enderror
        <button type="submit">Criar</button>
    </form>

    <hr>

    @foreach ($tweets as $tweet)
        {{$tweet->user->name}} - {{$tweet->content}}
        <hr>
    @endforeach

    <div class="pagination">
        {{$tweets->links()}}
    </div>
</div>
