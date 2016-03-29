<?php
class Mhmatsalar extends Restaurant{

    public $url = "http://www.mhmatsalar.se/";
    public $name = "MH Matsalar";

    public function getWeekMenu(){
        $page = file_get_html($this->url);
        $json = new ArrayObject();
        $day = null;
        // Every day is a table on the HTML-page
        foreach($page->find('#orkanen > div > div > p') as $index => $element){
            if($element->plaintext == "ORKANEN"){
                break;
            }

            if(array_search($element->plaintext, $this->daysSv)){
                $day = $this->days[array_search($element->plaintext, $this->daysSv)];
            }else if($element->plaintext == "Måndag"){
                $day = $this->days[0];
            }

            if($day != null){
                if(!in_array($element->plaintext, $this->daysSv)) {
                    $dish = explode("\n", $element->plaintext);
                    if(sizeof($dish) > 1){
                        $json[$day]["Dagens"] = $this->createDish($dish[0]);
                        $json[$day]["Vegitariskt"] = $this->createDish($dish[1]);
                    }else{
                        $json[$day]["Dagens"] = $this->createDish($element->plaintext);
                    }
                }
            }
        }
        // Prints the lunch menu in JSON
        return json_encode($json);
    }

    public function getDayMenu(){
        $page = file_get_html($this->url);
        $json = new ArrayObject();
        $day = null;
        foreach($page->find('#orkanen > div > div > p') as $index => $element){
            if($element->plaintext == "ORKANEN"){
                break;
            }

            if(array_search($element->plaintext, $this->daysSv)){
                $dayNr = array_search($element->plaintext, $this->daysSv);
                $day = $this->days[array_search($element->plaintext, $this->daysSv)];
            }else if($element->plaintext == "Måndag"){
                $dayNr = array_search($element->plaintext, $this->daysSv);
                $day = $this->days[0];
            }

            if($day != null){
                if(!in_array($element->plaintext, $this->daysSv)) {
                    if(date("N")-1 == $dayNr){
                        $dish = explode("\n", $element->plaintext);
                        if(sizeof($dish) > 1){
                            $json[$day]["Dagens"] = $this->createDish($dish[0]);
                            $json[$day]["Vegitariskt"] = $this->createDish($dish[1]);
                        }else{
                            $json[$day]["Dagens"] = $this->createDish($element->plaintext);
                        }
                    }
                }
            }
        }
        // Prints the lunch menu in JSON
        return json_encode($json);
    }

    private function createDish($title){
        $food = new ArrayObject();
        $food["title"] = $title;
        $food["price"] = "73";
        return $food;
    }
}
