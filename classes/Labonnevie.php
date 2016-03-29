<?php
class Labonnevie extends Restaurant{

    public $url = "http://labonnevie.se/dagens-meny";
    public $daysSv = ["måndag", "tisdag", "onsdag", "torsdag", "fredag", "lördag", "söndag"];
    public $name = "La Bonne Vie";

    public function getWeekMenu(){
        $page = file_get_html($this->url);
        $json = new ArrayObject();
        
        $lunch = explode("\n", $page->find('.p1')[0]->plaintext);
        $fish = explode("\n", $page->find('.p1')[1]->plaintext);
        $soup = explode("\n", $page->find('.p1')[2]->plaintext);

        for($i = 0; $i < 5; $i++){
            $json[$this->days[$i]]["Dagens rätt"] = $this->createDish($lunch);
            $json[$this->days[$i]]["Veckans fisk"] = $this->createDish($fish);
            $json[$this->days[$i]]["Veckans soppa"] = $this->createDish($soup);
        }
        // Prints the lunch menu in JSON
        return json_encode($json);
    }

    public function getDayMenu(){
        $page = file_get_html($this->url);
        $json = new ArrayObject();
        
        $lunch = explode("\n", $page->find('.p1')[0]->plaintext);
        $fish = explode("\n", $page->find('.p1')[1]->plaintext);
        $soup = explode("\n", $page->find('.p1')[2]->plaintext);
        
        if(date("N") <= 5){
            $json["Dagens rätt"] = $this->createDish($lunch);
            $json["Veckans fisk"] = $this->createDish($fish);
            $json["Veckans soppa"] = $this->createDish($soup);
        }
                
        // Prints the lunch menu in JSON
        return json_encode($json);
    }
    
    private function createDish($title){
        $food = new ArrayObject();
        $food["title"] = $title[1];
        $food["price"] = filter_var(explode(" ", $title[0])[sizeof(explode(" ", $title[0]))-2], FILTER_SANITIZE_NUMBER_INT);
        return $food;
    }
}