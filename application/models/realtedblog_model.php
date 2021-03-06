<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class realtedblog_model extends CI_Model
{
public function create($relatedblog,$blog)
{
$data=array("blog" => $blog,"relatedblog" => $relatedblog);
$query=$this->db->insert( "selftables_realtedblog", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("selftables_realtedblog")->row();
return $query;
}
function getsinglerealtedblog($id){
$this->db->where("id",$id);
$query=$this->db->get("selftables_realtedblog")->row();
return $query;
}
public function edit($id,$relatedblog,$blog)
{

$data=array("relatedblog" => $relatedblog);
$this->db->where( "id", $id );
$query=$this->db->update( "selftables_realtedblog", $data );

return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `selftables_realtedblog` WHERE `id`='$id'");
return $query;
}
public function getimagebyid($id)
{
$query=$this->db->query("SELECT `image` FROM `selftables_realtedblog` WHERE `id`='$id'")->row();
return $query;
}
public function getdropdown()
{
$query=$this->db->query("SELECT * FROM `selftables_realtedblog` ORDER BY `id`
                    ASC")->row();
$return=array(
"" => "Select Option"
);
foreach($query as $row)
{
$return[$row->id]=$row->name;
}
return $return;
}

public function getblogdropdown()
{
$query=$this->db->query("SELECT * FROM `selftables_blog`  ORDER BY `id` ASC")->result();
$return=array(
"" => "Choose an option"
);
foreach($query as $row)
{
$return[$row->id]=$row->name;
}

return $return;
}
}
?>
