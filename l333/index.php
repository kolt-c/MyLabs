<?php

require_once(__DIR__ . '/Template.php');
$content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam egestas iaculis leo, vitae tincidunt quam accumsan quis. Phasellus eu auctor justo, ac varius mauris. Curabitur rutrum tincidunt turpis vitae hendrerit. Morbi fermentum nulla sed tincidunt pharetra. Curabitur sapien felis, condimentum eu auctor in, pellentesque sed elit. Duis et turpis ante. Curabitur ullamcorper velit ac dui aliquam, id gravida ex tempus. Sed dignissim, ex non elementum placerat, tellus justo varius mi, posuere tempor risus ante sit amet diam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Quisque mollis pulvinar felis consectetur hendrerit. Etiam id orci egestas.';

(new Template())->render(__DIR__ . '/page.html', [
    '{$title}' => 'Test title',
    '{$content}' => $content
]);
