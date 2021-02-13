<div class=" mt-5">

    <h1>Данные из формы</h1>

    <?php

    foreach ($vars as $var => $val) { ?>

        <p><?= $var . ': ' . htmlentities($val);  ?></p>

    <?php

    }

    ?>

</div>