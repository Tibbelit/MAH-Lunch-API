<?php
class Niagara extends Restaurant{

    public $url = "http://restaurangniagara.se/lunch/";
    public $name = "Restaurang Niagara";

    public function getWeekMenu(){
        $page = file_get_html($this->url);
        $json = new ArrayObject();

        // Every day is a table on the HTML-page
        foreach($page->find('.lunch > table, .lunch > h3') as $index => $element){
            if($element->tag == "h3"){
                $day = array_search($element->plaintext, $this->daysSv);
            }else{
                // Every dish is a row in the table
                foreach($element->find('tr') as $tr){
                    // Columns is in order [0] => category, [1] => title, [2] => price
                    $category = $tr->find('td')[0]->plaintext;
                    $json[$this->days[$day]][$category] = $this->createDish($tr);
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
        foreach($page->find('.lunch > table, .lunch > h3') as $index => $element){
            if($element->tag == "h3"){
                $day = array_search($element->plaintext, $this->daysSv);
            }else{
                // Every dish is a row in the table
                foreach($element->find('tr') as $tr){
                    // Columns is in order [0] => category, [1] => title, [2] => price
                    $category = $tr->find('td')[0]->plaintext;
                    if(date("N")-1 == $day){
                        $json[$category] = $this->createDish($tr);
                    }
                }
            }
        }
        // Prints the lunch menu in JSON
        return json_encode($json);
    }

    private function createDish($tr){
        $food = new ArrayObject();
        $food["title"] = $tr->find('td')[1]->plaintext;
        $food["price"] = filter_var($tr->find('td')[2]->plaintext, FILTER_SANITIZE_NUMBER_INT);
        return $food;
    }
}
