<?php

/**
 * Employees finder
 *
 * Author: Student Name
 * Company: BrainAcademy
 * Date: some date
 */

$employees = [
    [
        'name' => 'Clark Kent',
        'age' => 22,
        'skills' => ['PHP', 'Java', 'C#']
    ],
    [
        'name' => 'Steve Stifler',
        'age' => 21,
        'skills' => ['PHP', 'JS', 'CSS', 'HTML']
    ],
    [
        'name' => 'Bruce Wayne',
        'age' => 35,
        'skills' => ['PHP', 'PHP Unit', 'XDebug', 'JS']
    ],
    [
        'name' => 'Peter Parker',
        'age' => 18,
        'skills' => ['PHP', 'C', 'Pascal']
    ]
];
//trying to get needed skills
if(isset($argv[1])){
    $strSkill = trim($argv[1]);
}else{
    exit('Please input into command line skill we searching for!');
}

//searching in the array

foreach ($employees as $cur_empl){
    if(in_array($strSkill, $cur_empl['skills'])){
        echo"Finded ".$cur_empl['name']." age ".$cur_empl['age'];
        foreach ($cur_empl['skills'] as $cur_skill){
            echo ' '.$cur_skill;
        }
        echo PHP_EOL;
    }
}
