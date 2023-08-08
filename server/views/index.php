<h1>home</h1>

<?php
$things = ['hello', 'world']
?>

<?php
if (count($things)){
    foreach($things as $thing){
        include __DIR__.'/../components/card.php';
    }
}
?>