<?php
class Lillakoket extends Restaurant{

    public $url = "http://lillakoket.com/?post_type=menu_item";
    public $name = "Lilla Köket";

    public function getWeekMenu(){
        $page = file_get_html($this->url);
        $json = new ArrayObject();

        // Every day is a table on the HTML-page
        foreach($page->find('.menu_category > article > p') as $index => $element){
            if($index < 5){
                // Every dish is a row in the table
                $counter = 0;
                //echo "<hr>".$element->outertext;
                $dish = explode("<br />", $element->outertext);
                foreach($dish as $d){
                    $json[$this->days[$index]][$counter+1] = $this->createDish(strip_tags($d));
                    $counter++;
                }
            }
        }
        // Prints the lunch menu in JSON
        return json_encode($json);
    }

    public function getDayMenu(){
        $page = file_get_html($this->url);
        $json = new ArrayObject();

        // Every day is a table on the HTML-page
        foreach($page->find('.menu_category > article > p') as $index => $element){
            if($index < 5){
                // Every dish is a row in the table
                $counter = 0;
                //echo "<hr>".$element->outertext;
                $dish = explode("<br />", $element->outertext);
                foreach($dish as $d){
                    if(date("N")-1 == $index){
                        $json[$counter+1] = $this->createDish(strip_tags($d));
                    }
                    $counter++;
                }
            }
        }

        // Prints the lunch menu in JSON
        return json_encode($json);
    }

    private function createDish($title){
        $food = new ArrayObject();
        $food["title"] = $title;
        $food["price"] = "";
        return $food;
    }
}
