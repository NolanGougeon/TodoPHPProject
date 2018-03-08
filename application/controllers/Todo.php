<?php

/** @property TodoModel $TodoModel */
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Todo
 *
 * @author adminSio
 */
class Todo extends CI_Controller {
    //put your code here
    public function __Construct(){
        parent:: __Construct();
        $this->load->model('TodoModel');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }
    
    public function index(){
        $all_todo=$this->TodoModel->get_all();
        $data=[];
        $data['lesTodos']=$all_todo;
        $data['compte']=0;
        $data['title']="Liste de mes travaux";
        $this->load->view('TodoView',$data);
    }
    
    public function fait($id){
        $params = array('completed'=>1);
        $this->TodoModel->update($id,$params);
        redirect(base_url('Todo/index'));
    }
    
    public function aFaire($id){
        $params = array('completed'=>0);
        $this->TodoModel->update($id,$params);
        redirect(base_url('Todo/index'));
    }
    
    public function ajouter(){
        $this->form_validation->set_rules('ordre','ordre','required|numeric');
        $this->form_validation->set_rules('task','tâche','required|max_length[66]');
        if ($this->form_validation->run()==TRUE) {
            $task=$this->input->post('task');
            $ordre=$this->input->post('ordre');
            $params=array('task'=>$task,'ordre'=>$ordre,'completed'=>0);
            $this->TodoModel->add($params);
            redirect(base_url('Todo/index'));
        }
        else{
            $this->load->view("TodoAdd");
        }
    }
    
    public function modifier($id){
        $this->form_validation->set_rules('ordre','ordre','required|numeric');
        $this->form_validation->set_rules('task','tâche','required|max_length[66]');
        if ($this->form_validation->run()==TRUE) {
            $task=$this->input->post('task');
            $ordre=$this->input->post('ordre');
            $params=array('task'=>$task,'ordre'=>$ordre);
            $this->TodoModel->update($id,$params);
            redirect(base_url('Todo/index'));
        }
        else{
            $tablId=[];
            $tablId['id']=$id;
            $occurence=$this->TodoModel->get_by_id($id);
            $tache=$occurence['task'];
            $ordre=$occurence['ordre'];
            $tablId['task']=$tache;
            $tablId['ordre']=$ordre;
            $this->load->view('TodoUpdate',$tablId);
        }
    }
    public function supprimer($id){
        $this->TodoModel->delete($id);
        redirect(base_url('Todo/index'));
    }
    
    public function reordonner(){
        $all_todo=$this->TodoModel->get_all();
        foreach($all_todo  as $todo):
            $this->form_validation->set_rules('ordre[]','ordre','required|numeric');
        endforeach;
        if ($this->form_validation->run()==TRUE) {
        $nouvelOrdre=$this->input->post('ordre[]');
        $i =0;
        foreach($all_todo  as $todo):
            $params=array('ordre'=>$nouvelOrdre[$i]);
            $this->TodoModel->update($todo['id'],$params);
            $i=$i+1;
        endforeach;
        Redirect(base_url('Todo/Index'));
        }
        else{
        $data=[];
        $data['lesTodos']=$all_todo;
        $data['titre']="Reordeonner mes tâches";
        $this->load->view('todoReordonner',$data);
        }
    }
    
    public function modifierOrdre($id,$nouvelOrdre){
        
    }
}