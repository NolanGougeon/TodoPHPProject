
<!--
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 -->
 <?php 
echo validation_errors();
echo form_open(base_url('Todo/reordonner/'));
$compte = 10;?>
 
<h1> <?php echo $titre; ?></h1>
<?php foreach($lesTodos as $todo):
    echo form_input('ordre[]',set_value('ordre[]',$compte));
    echo form_label(set_value('task',$todo['task']));
    $compte += 10; ?>  </br>
<?php endforeach; 
echo form_submit('Reordonner','Reordonner');?>
