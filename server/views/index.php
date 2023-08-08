<main>
    <h1>home</h1>

    <?php
        class Thing {
            public $name;
        }

        $thing1 = new Thing();
        $thing1->name = 'hello';

        $thing2 = new Thing();
        $thing2->name = 'world';

        $things = [$thing1, $thing2];
    ?>

    <?php
        if (count($things)){
            foreach($things as $thing){
                include __DIR__.'/../components/textBlock.php';
            }
        }
    ?>
</main>