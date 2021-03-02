<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Tweet;

use Livewire\WithPagination;

class ShowTweets extends Component
{

    use WithPagination;

    public $content = 'Tweet Content'; 

    protected $rules = [
        'content' => 'required|min:3|max:255'
    ];

    public function render()
    {

        $tweets = Tweet::with('user')->paginate(3); // assim vai ser uma consulta mais otimizada, por estar pegando os usuários já nessa consulta e não consultando posteriormente um usuário para cada tweet 
        // no segundo caso será feito o número de consultas referente ao número de tweets no banco, pois há um usuário por tweet
        // dessa forma foi feita apenas duas consultas

        return view('livewire.show-tweets', [
            'tweets' => $tweets,
        ]);
    }

    public function create(){

        $this->validate(); // vai executar as validações de rules

        Tweet::create([ // cria um novo tweet
            'content' => $this->content,
            'user_id' => 1    
        ]);

        $this->content = ''; // reseta o input com  o valor content
    }
}
