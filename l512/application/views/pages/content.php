<?php
/**
 * @var \application\View $this
 */
?>

<h1><?php echo $this->getModel()->getData()['title']; ?></h1>
<p><?php echo $this->getModel()->getData()['text']; ?></p>