<?php
/** @property CI_db $db 
 * 
 */

/**
 * Description of TodoModel
 *
 * @author adminSio
 */
class TodoModel extends CI_Model {
    //put your code here
    public function __Construct(){
        parent::__construct();
    }
    
    public function get_By_Id($id){
    return $this->db->get_where('todo',array('id'=>$id))->row_array();
    }
    
    public function get_all(){
        $this->db->select('*');
        $this->db->from('todo');
        $this->db->order_by('ordre');
        return $this->db->get()->result_array();        
    }
    
    public function add($params){
        $this->db->insert('todo',$params);
        return $this->db->insert_id();
    }
    
    public  function delete($id){
        $this->db->delete('todo',array('id'=>$id));
    }
    
    public function update($id,$params){
        $this->db->where('id',$id);
        $this->db->update('todo',$params);
    }
    
}
