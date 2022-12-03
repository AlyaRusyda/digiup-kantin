<?php
require_once 'Base_model.php';

class Menu_model extends Base_Model
{
    //nama tabel
    var $table = "menu";

    public function find_all()
    {
        return $this->db->query("SELECT menu.*,kantin.nama as nama
            FROM menu
            INNER JOIN kantin ON kantin.id = menu.id_kantin")->result_array();
    }
    public function find_by_id($id)
    {
        return $this->db->query("SELECT menu.*,kantin.nama as nama
            FROM menu
            INNER JOIN kantin ON kantin.id = menu.id_kantin
            WHERE menu.id='$id'")->row_array();
    }
    public function pagination($limit, $start)
    {

        return $this->db->query("SELECT menu.*,kantin.nama as nama
        FROM menu
        INNER JOIN kantin ON kantin.id = menu.id_kantin LIMIT $start,$limit")->result_array();
    }
    public function search($kw, $limit, $start)
    {
        if ($kw != '') {
            return $this->db->query("SELECT menu.*,kantin.nama as nama
        FROM menu
        INNER JOIN kantin ON kantin.id = menu.id_kantin WHERE menu.nama_menu LIKE '%$kw%' LIMIT
        
        $start,$limit")->result_array();
        }
        return $this->pagination($limit, $start);
    }
    public function get_total_search($kw)
    {
        $rows = $this->db->query("SELECT menu.*,kantin.nama as nama
        FROM menu
        INNER JOIN kantin ON kantin.id = menu.id_kantin WHERE menu.nama_menu LIKE '%$kw%'")->result_array();

        return count($rows);
    }
}
