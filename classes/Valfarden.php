<?php
class Valfarden extends Restaurant{

    public $url = "http://valfarden.nu/dagens-lunch/";
    public $daysSv = ["Måndag", "Tisdag", "Onsdag", "Torsdag", "Fredag", "Lördag"];
    public $name = "Välfärden";

    public function getWeekMenu(){
        $page = file_get_html($this->url);
        $json = new ArrayObject();
		
        // Every day is a paragraph (Dööhhh!), collecting dishses
        $dishes = [];
        $day = 0;
        $cat = 0;
        foreach($page->find('.single_inside_content > p') as $index => $element){
            // Every dish is a row in the table
            if(strpos($element->plaintext, $this->daysSv[$day]) !== false or strpos($element->plaintext, strtolower($this->daysSv[$day])) !== false) {
                if($day <= 4){
                    $day++;
                }
                $cat = 0;

                $dish =  explode("\n", $element->plaintext);
                if(sizeof($dish) > 1){
                    $cat++;
                    if($cat <= 2){
                        $json[$this->days[$day-1]][$cat] = $this->createDish($dish[1]);
                    }
                }
            }else{
                if($element->plaintext != "" and $element->plaintext != "&nbsp;" and $day <= 5 and $day >= 1){
                    $cat++;
                    if($cat <= 2){
                        $json[$this->days[$day-1]][$cat] = $this->createDish($element->plaintext);
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

        // Every day is a paragraph (Dööhhh!), collecting dishses
        $dishes = [];
        $day = 0;
        $cat = 0;
        foreach($page->find('.single_inside_content > p') as $index => $element){
            // Every dish is a row in the table
            if(strpos($element->plaintext, $this->daysSv[$day]) !== false or strpos($element->plaintext, strtolower($this->daysSv[$day])) !== false) {
                if($day <= 4){
                    $day++;
                }
                $cat = 0;

                $dish =  explode("\n", $element->plaintext);
                if(sizeof($dish) > 1){
                    $cat++;
                    if($cat <= 2){
                        if(date("N") == $day){
                            $json[$cat] = $this->createDish($dish[1]);
                        }
                    }
                }
            }else{
                if($element->plaintext != "" and $element->plaintext != "&nbsp;" and $day <= 5 and $day >= 1){
                    $cat++;
                    if($cat <= 2){
                        if(date("N") == $day){
                            $json[$cat] = $this->createDish($element->plaintext);
                        }
                    }
                }
            }
        }

        // Prints the lunch menu in JSON
        return json_encode($json);
    }

    private function createDish($element){
        $food = new ArrayObject();
        $food["title"] = $element;
        $food["price"] = "95";
        return $food;
    }
}
