<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title ?></title>
    </head>
    <body>
        <h1><?php echo $title ?></h1>
        <?php foreach($lesTodos as $todo):
                if ($todo['completed']==1) {
                /*echo $compte,' ';*/ ?>
                <s><?php echo $todo['task'];?></s>
                <a href="<?php echo base_url('Todo/aFaire/'.$todo['id']);?>">Fait</a>
                <?php } 
                else{
                    /*echo $compte,' ';*/?>
                    <?php echo $todo['task']; ?>
                    <a href="<?php echo base_url('Todo/fait/'.$todo['id']);?>">a Faire</a>
                <?php } ?>
                <a href="<?php echo base_url('Todo/modifier/'.$todo['id']);?>"> Modifier</a>
                <a href="<?php echo base_url('Todo/supprimer/'.$todo['id']);?>"> Supprimer</a><br>
                <?php $compte=$compte+10; ?>
        <?php endforeach; ?>
            <a href="<?php echo base_url('Todo/ajouter') ?>"> Ajouter</a>
            <a href="<?php echo base_url('Todo/reordonner') ?>">Reordonner les tâches</a>
    </body>
</html>