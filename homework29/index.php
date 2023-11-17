<?php
/*Придумайте 3 массива для имен, фамилий и отчеств. 
Опишите класс людей Human как объектов с совокупностью трех свойств 
(name, surname, patronymic). Собрать массив из 20 людей со случайным набором ФИО.
 */

class Human
{
    public string $surname;
    public string $name;
    public string $patronymic;

    public function __construct($surname, $name, $patronymic)
    {
        $this->surname = $surname;
        $this->name = $name;
        $this->patronymic = $patronymic;
    }

}


$names = ["Андрей", "Артем", "Богдан", "Владислав", "Даниил", "Давид", "Дмитрий", "Матвей", "Марк", "Максим", "Назар", "Александр", "Тимофей", "Ярослав"];
$patronymics = ["Андреевич", "Артемович", "Богданович", "Владиславович", "Даниилович", "Давидович", "Дмитриевич", "Матвеевич", "Маркович", "Максимович", "Назарович", "Александрович", "Тимофеевич", "Ярославович"];
$surnames = ["Мельник", "Шевченко", "Бондаренко", "Коваленко", "Бойко", "Ткаченко", "Кравченко", "Ковальчук", "Коваль", "Олейник"];

function randomValue($arr) 
{
    return $arr[rand(0, count($arr)-1)];
}

$people = [];
for($i = 0; $i < 20; $i++) {
    $people[] = new Human(randomValue($surnames), randomValue($names), randomValue($patronymics));
}
var_dump($people);


/*Игра больше меньше между двумя игроками. 
При каждой партии игроки загадывают числа от 0 до 9999. 
Один из игроков выносит догадку о том, что его число больше или меньше загаданного числа соперника. 
Если он отгадал, то к его счету добавляется 1 балл. Разыграть 5 партий. 
Вывести имя победителя. Игроки отгадывают по очереди. */

class Player
{
    var $number;
    var $score = 0;

    function getNumber()
    {
        return $this->number;
    }

    function getScore()
    {
        return $this->score;
    }

    function setNumber($number)
    {
        $this->number = $number;
    }

    function setScore()
    {
        $this->score += 1;
    }
    function isGuessed($opponent)
    {
        if($this->compare($opponent) == $this->hypothesis()) {
            $this->setScore();
        }
        echo "score = " . $this->getScore() . "<br>";
    }

    function hypothesis()
    {
        $comparisons = ["<", ">"];
        $choice = rand(0, 1);

        echo "I'm guessing it's " . $comparisons[$choice] . "<br>";
        return $comparisons[$choice];
    }

    function compare($opponent)
    {
        if($this->getNumber() > $opponent->getNumber()) {
            echo "My number is " . $this->getNumber() . "<br>";
            return ">";
        } else if($this->getNumber() < $opponent->getNumber()) {
            echo "My number is " . $this->getNumber() . "<br>";
            return "<";
        } else return "=";
    }

}

class Game
{
    var $player1;
    var $player2;

    function __construct($player1, $player2)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
        
    }

    public function round()
    {
        $this->player1->setNumber(rand(0, 9999));
        $this->player2->setNumber(rand(0, 9999));
        $this->player1->isGuessed($this->player2);
        $this->player2->isGuessed($this->player1);
        echo "---------------------------------- <br>";
    }

    public function game()
    {
        for($i = 0; $i < 5; $i++){
            echo "<b>" . $i . " round:" . "</b>". "<br>";
            $this->round();
        }
        echo "First player score = " . $this->player1->getScore() . "<br>";
        echo "Second player score = " . $this->player2->getScore() . "<br>";
        if($this->player1->getScore() > $this->player2->getScore()) {
            echo "<b>" . "First player win" . "</b>";
        } else {
            echo "<b>" . "Second player win!" . "</b>";
        }
    }

}

$player1 = new Player();
$player2 = new Player();

$game1 = new Game($player1, $player2);

$game1->game(); 

echo "<br>" . "----------------------------------------" . "<br>";

/*Есть колода из 36 игральных карт (от 6 до тузов). 
Перемешать колоду карт и раздать на четырех игроков. 
Вывести на экран козырь. И ФИО игрока у кого больше шансов выиграть. */

$ranks = ["6", "7", "8", "9", "10", "Jack", "Queen", "King", "Ace"];
$suits = ["\u{2665}", "\u{2666}", "\u{2663}", "\u{2660}"];

class Card
{
    public $rank;
    public $suit;
    public $isTrump;

    function __construct(string $rank, string $suit)
    {
        $this->rank = $rank;
        $this->suit = $suit;
        $this->isTrump = false;
    }
}


$cards = [];
foreach($suits as $suit) {
    foreach($ranks as $rank) {
        $cards[] = [new Card($rank, $suit)];
    }
}

class CardGame
{
    public $trump;
    public $playersList = [];
    public $deck = [];

    function __construct(array $playersList, array $deck)
    {
        shuffle($deck);
        $this->playersList = $playersList;
        $this->deck = $deck;
    }

    public function getTrump()
    {
        return $this->trump;
    }

    function dealCards()
    {
        foreach($this->playersList as $player) {
            //for($j = 0; $j < count($this->deck); $j+=6){
            $player->setInHand(array_slice($this->deck, 0, 6));
            $this->deck = array_slice($this->deck, 6);      
        }

        $this->trump = $this->deck[count($this->deck)-1][0]->suit;
    }

    function potentialWinner()
    {
        $winner = $this->playersList[0];
        foreach($this->playersList as $player) {
            if ($player->score > $winner->score) {
                $winner = $player;
            }
        }
        return $winner->name;
    }

} 

class CardPlayer
{
    public $name;
    public $inHand = [];
    
    public $score;

    function __construct(string $name)
    {
        $this->name = $name;
    }

    function setInHand(array $inHand)
    {
        $this->inHand = $inHand;
    }

    function checkTrumps($trump)
    {
        foreach($this->inHand as $card) {
            if ($card[0]->suit == $trump) {
                $card[0]->isTrump = true;
            }
        }
    }

    function setScore()
    {
        foreach($this->inHand as $card) {
            switch($card[0]->rank) {
                case "6":
                    $this->score+=6;
                    break;
                case "7": 
                    $this->score+=7;
                    break;
                case "8": 
                    $this->score+=8;
                    break;
                case "9": 
                    $this->score+=9;
                    break;
                case "10": 
                    $this->score+=10;
                    break;
                case "Jack":
                    $this->score+=11;
                    break;
                case "Queen": 
                    $this->score+=12;
                    break;
                case "King": 
                    $this->score+=13;
                    break;
                case "Ace": 
                    $this->score+=14;
                    break;     
            }
            if($card[0]->isTrump) {
                $this->score+=9; 
            }
        }
    }

}

$playersList = [new CardPlayer("Anna"), new CardPlayer("Tom"), new CardPlayer("Sam"), new CardPlayer("Bob")];
$cardGame1 = new CardGame($playersList, $cards);
$cardGame1->dealCards();
$trump = $cardGame1->getTrump();
echo "Card game started! Trump: " . $trump . "<br>";

foreach($playersList as $player) {
    echo "<b>" . "Player " . $player->name . "<br>" . "</b>";
    $player->checkTrumps($trump);
    echo "cards on hands: ";
    var_dump($player->inHand);
    $player->setScore();
    echo "Player score: " . ($player->score);
    echo "<br>" . "--------------------------" . "<br>";
}

echo "Our potential winner is " . ($cardGame1->potentialWinner());