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
        $count = 1;
        for ($i = 0; $i < 24; $i++) {
            $card = new Card();
            $card->id = $count++;
            $card->back = 'back.png';
            $card->front = ($i % (24 / 2)) + 1 . '.png';
            $card->flipped = FALSE;

            $cards[] = $card;
        }
        shuffle($cards);
        return $cards;
    }

    public function displayBoard()
    {
        foreach ($_SESSION['gameOn'] as $card) {
            if (@$_GET['id'] == $card->id) {
                $card->flipped = TRUE;
                echo "<a href='game.php?id=$card->id'><button><img src='./img/$card->front'height=170 width=170></button></a>";
            } else {
                $card->flipped = FALSE;
                echo "<a href='game.php?id=$card->id'><button><img src='./img/$card->back' height=170 width=170></button></a>";
            }
        }
    }

    public function cardFlipped()
    {
        if (isset($_GET['id'])) {
            $_SESSION['cardflip'][] = $_GET['id'];
        }
    }

    public function matched()
    {
        foreach ($_SESSION['gameOn'] as $card) {
            if (isset($_GET['id'])) {
                if (($_GET['id']) == ($card->id)) {
                    $_SESSION['name'][] = $card->front;
                    if ((isset($_SESSION['name'])) && (count($_SESSION['name']) <= 2)) {
                        if (($_SESSION['name'][0]) === ($_SESSION['name'][1])) {
                            $card->flipped = TRUE;
                            $_SESSION['matches'][] = $card->flipped;
                            $card->back = $card->front;
                        }
                    }
                    if ((isset($_SESSION['name'])) && (count($_SESSION['name']) >= 2)) {
                        unset($_SESSION['name']);
                    }
                    if (count($_SESSION['matches']) >= 2) {
                        unset($_SESSION['matches']);
                    }
                }
            }
        }
    }

    public function static()
    {
        if ((isset($_SESSION['matches'])) && isset($_SESSION['name'])) {
            $card = $_SESSION['name'];
            if ($card->flipped === TRUE) {
                $card->back = $card->front;
            }
        }
    }
}
