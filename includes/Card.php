<?php

class Card
{

    public $id;
    public $back;
    public $front;
    public $flipped;



    public function shuffle()
    {
        $cards = [];
        for ($i = 0; $i < 24; $i++) {
            $card = new Card();
            $card->id = $i;
            $card->back = 'back.png';
            $card->front = ($i % (24 / 2)) + 1 . '.png';
            $card->flipped = FALSE;

            $cards[] = $card;
        }
        shuffle($cards);
        return $cards;
        var_dump($cards);
    }

    // // function qui change d'état en fonction du clic ou non
    // public function isFlipped()
    // {
    //     if (isset($_GET['submit'])) {
    //         return TRUE;
    //     } else {
    //         return FALSE;
    //     }
    // }


    public function displayBoard()
    {
        foreach ($_SESSION['gameOn'] as $card) {
            if ($card->flipped == FALSE) {
                echo "<img src='./img/$card->back'>" ;
            } elseif (isset($_GET['id'])) {
                $card->flipped == TRUE;
                echo $card->front;
            }
        }
    }
}
