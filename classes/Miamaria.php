<?php
class Miamaria extends Restaurant{

    public $url = "http://www.miamarias.nu/dagens-2/";
    public $name = "Mia Maria";

    public function getWeekMenu(){
        $page = file_get_html($this->url);
        $json = new ArrayObject();

        // Every day is a class
        foreach($page->find('.et_slidecontent') as $index => $element){
            foreach($element->find('table tr') as $tr){
                // [0] => Category: Fish, [1] => Dish: Fish, [2] => Category: Meat, [3] => Dish: Meat, [4] => Category: Vegetarian, [5] => Dish: Vegetarian
                if(sizeof($tr->find("td strong")) > 0){
                    $category = $tr->find("td strong")[0]->plaintext;
                    if(array_key_exists(1, $tr->find("td strong"))){
                        $price = $tr->find("td strong")[1]->plaintext;
                    }else{
                        $price = "";
                    }
                }
                if(sizeof($tr->find("td")) > 0){
                    if($index < 5 and $tr->find("td")[0]->plaintext != ""){
                        $json[$this->days[$index]][$category] = $this->createDish($tr->find("td")[0]->plaintext, $price);
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

        // Every day is a class
        foreach($page->find('.et_slidecontent') as $index => $element){
            foreach($element->find('table tr') as $tr){
                // [0] => Category: Fish, [1] => Dish: Fish, [2] => Category: Meat, [3] => Dish: Meat, [4] => Category: Vegetarian, [5] => Dish: Vegetarian
                if(sizeof($tr->find("td strong")) > 0){
                    $category = $tr->find("td strong")[0]->plaintext;
                    if(array_key_exists(1, $tr->find("td strong"))){
                        $price = $tr->find("td strong")[1]->plaintext;
                    }else{
                        $price = "";
                    }
                }
                if(sizeof($tr->find("td")) > 0){
                    if($index < 5 and $tr->find("td")[0]->plaintext != ""){
                        if(date("N")-1 == $index){
                            $json[$category] = $this->createDish($tr->find("td")[0]->plaintext, $price);
                        }
                    }
                }
            }
        }
        // Prints the lunch menu in JSON
        return json_encode($json);
    }
    
    private function createDish($title, $price){
        $food = new ArrayObject();
        $food["title"] = $title;
        $food["price"] = filter_var($price, FILTER_SANITIZE_NUMBER_INT);
        return $food;
    }
}