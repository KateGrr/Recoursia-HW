<?php

/*
Интерфейсы кукольного театра:
PerformInterface - все объекты реализующие данный интерфейс умеют выступать

Субъекты кукольного театра: 

Кукла:
интерфейсы: PerformInterface
характеристики: тип, пол, возраст, цвет, текст.
умеет: выступать - проговаривает собственный текст.

Кукловод:
интерфейсы: PerformInterface
характеристики: пол, тип голоса, талант (1-10), куклы (2 шт). 
умеет: выступать - запускает выступление каждой куклы поочереди.

Актер:
интерфейсы: PerformInterface
характеристики: пол, возраст, текст.
умеет: выступать - проговаривает собственный текст.

Постановка
характеристики: очередь (массив) из объектов PerformInterface (Актеры, Кукловоды)
умеет:  добавлять к очереди объект PerformInterface, запускать выступление.

Зритель:
характеристики: реакция (текст описывающий эмоцию: Браво! На бис! И т.д.)
умеет: аплодировать.

Театр:
характеристики: Постановка, Зрители
умеет: запускать театр (сначала Постановка, потом реакция Зрителей) 
*/

interface PerformInterface
{
    public function perform();
}

class Puppet implements PerformInterface
{
    private $type;
    private $gender;
    private $age;
    private $color;
    private $text;

    public function __construct($type, $gender, $age, $color, $text)
    {
        $this->type = $type;
        $this->gender = $gender;
        $this->age = $age;
        $this->color = $color;
        $this->text = $text;
    }

    public function perform()
    {
        echo $this->text  . '<br>';
    }

    public function setText($text)
    {
        $this->text = $text;
    }
}

class Puppeteer implements PerformInterface
{
    private $gender;
    private $voiceType;
    private $talent;
    private $puppet1;
    private $puppet2;

    public function __construct($gender, $voiceType, $puppet1, $puppet2)
    {
        $this->gender = $gender;
        $this->voiceType = $voiceType;
        $this->talent = rand(1, 10);
        $this->puppet1 = $puppet1;
        $this->puppet2 = $puppet2;
    }

    public function perform()
    {
        $this->puppet1->perform();
        $this->puppet2->perform();
    }
}

class Actor implements PerformInterface
{
    private $gender;
    private $age;
    private $text;

    public function __construct($gender, $age, $text)
    {
        $this->gender = $gender;
        $this->age = $age;
        $this->text = $text;
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    public function perform()
    {
        echo $this->text . '<br>';
    }
}


class Perform implements PerformInterface
{
    private $performers = [];


	public function getPerformers() {
		return $this->performers;
	}
	
	public function setPerformer($performer): self {
        $this->performers[] = $performer;
		return $this;
	}

    public function addPerformer(PerformInterface $performer)
    {
        $this->getPerformers()[] = $this->setPerformer($performer);
    }

    public function perform()
    {
        foreach($this->performers as $performer)
        {
            $performer->perform();
        }
    }
}

class TheatreGoer 
{
    private $text = 'Браво!';

    public function __construct($text)
    {
        $this->text = $text;
    }

    public function applaud()
    {
        echo $this-> getText() . '<br>';
    }

	public function getText() {
		return $this->text;
	}

	public function setText($text): self {
		$this->text = $text;
		return $this;
	}
}

class Theatre
{
    private $perform;
    private $theatreGoers = [];

    public function __construct($perform, $theatreGoers)
    {
        $this->perform = $perform;
        $this->theatreGoers = $theatreGoers;
    }

    public function act()
    {
        $this->perform->perform();
        foreach($this->theatreGoers as $goer){
            $goer->applaud();
        }
    }
}


$actor1 = new Actor('female', 65, 'Катится колобок, а навстречу ему волк');
$puppet1 = new Puppet('колобок', 'neutral', 0, 'yellow', 'Я румяный колобок, по сусекам метен, на сметане мешен, на окошке стужен.');
$puppet2 = new Puppet('волк', 'male', 5, 'grey', 'Колобок-колобок, я тебя съем!');
$puppeteer1 = new Puppeteer('male', 'баритон', $puppet1, $puppet2);
$puppet3 = new Puppet('лиса', 'female', 3, 'red', 'Сядь ко мне на носок да пропой еще разок');
$puppeteer2 = new Puppeteer('female', 'сопрано', $puppet1, $puppet3);

$perform1 = new Perform();
$perform1->addPerformer($actor1);
$perform1->addPerformer($puppeteer1);
$perform1->addPerformer($puppeteer2);

$theatre = new Theatre($perform1, [new TheatreGoer('Браво!'), new TheatreGoer('Бис!'), new TheatreGoer('Браво!'), new TheatreGoer('Perfect!')]);
$theatre->act();