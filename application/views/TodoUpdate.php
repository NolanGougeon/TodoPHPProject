<?php
echo validation_errors();
echo form_open(base_url('Todo/modifier/'.$id));
echo form_label('ordre :','ordre');
echo form_input('ordre',set_value('ordre',$ordre));
echo form_label('tâche :','task');
echo form_input('task',set_value('task',$task));
echo form_submit('Ajouter','Ajouter');
echo form_close();