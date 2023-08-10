<?php 

// todo - database

class Thing {
    public $name;
    public $id;
}

$things = [];

for ($index = 0; $index < 30; $index++){
    $newThing = new Thing();
    $newThing->name = 'thing '.strval($index);
    $newThing->id = strval($index);
    $things[$index] = $newThing;
}

function getThingById($id){
    global $things;
    
    foreach($things as $thing){
        if ($thing->id === $id){
            return $thing;
        }
    }
}