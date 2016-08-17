<?php
require "simple_html_dom.php";

class Restaurant{

    public $days = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday");
    public $daysSv = array("Måndag", "Tisdag", "Onsdag", "Torsdag", "Fredag");

    public static function restaurants(){
        // return ["Niagara", "Miamaria", "Valfarden", "Lillakoket", "Labonnevie", "Mhmatsalar"];
		return ["Niagara", "Miamaria", "Lillakoket", "Labonnevie", "Mhmatsalar"]; // Removed Välfärden
    }

}
?>
