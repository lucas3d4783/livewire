<div class="container"> 
    Show Tweets

    <p>{{$message}}</p>

    <form action="" method="post" wire:submit.prevent="create"> {{-- usa o prevent para não atualizar a página --}}
        <input type="text" name="message" id="message" wire:model="message">
        <button type="submit">Criar</button>
    </form>

    <hr>

    @foreach ($tweets as $tweet)
        {{$tweet->user->name}} - {{$tweet->content}}
        <hr>
    @endforeach

</div>
