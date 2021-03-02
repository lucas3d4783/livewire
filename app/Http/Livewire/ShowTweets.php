<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Tweet;

class ShowTweets extends Component
{

    public $message = 'Apenas um Teste 3'; 

    public function render()
    {

        $tweets = Tweet::with('user')->get(); // assim vai ser uma consulta mais otimizada, por estar pegando os usuários já nessa consulta e não consultando posteriormente um usuário para cada tweet 
        // no segundo caso será feito o número de consultas referente ao número de tweets no banco, pois há um usuário por tweet
        // dessa forma foi feita apenas duas consultas

        return view('livewire.show-tweets', [
            'tweets' => $tweets,
        ]);
    }

    public function create(){
        Tweet::create([ // cria um novo tweet
            'content' => $this->message,
            'user_id' => 1    
        ]);

        $this->message = ''; // reseta o input com  o valor message
    }
}
