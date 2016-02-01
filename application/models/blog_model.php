<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class blog_model extends CI_Model
{

  function searchBlog($title){
        $query=$this->db->query("SELECT `id`,`name` as 'title',`image` as 'coverimage',`description` as 'content' from `selftables_blog` where `name` like '$title%'")->result();

   return $query;

  }


  function popularPost(){
        $query=$this->db->query("SELECT `id`,`name` as 'title',`image` as 'coverimage',`description` as 'content' from `selftables_blog` order by `views` desc")->result();
   return $query;

  }

  function getViews($id){
        $query=$this->db->query("SELECT  max(views) as 'views' from `selftables_blog` where id=$id")->row();
   return $query;

  }



public function create($name,$image,$description,$posted_by,$dateofposting,$tags)
{

$data=array("name" => $name,"image" => $image,"description" => $description,"posted_by" => $posted_by);
$query=$this->db->insert( "selftables_blog", $data );
$id=$this->db->insert_id();
foreach($tags as $tag)
{
$query=$this->db->query("insert into tagsblog(tag,blog) values($tag,$id)");
//  return $query;
}
if(!$query)
{
  return  0;
}

else
{
  return  $id;


}


}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("selftables_blog")->row();
$gettags= $this->db->query("select tag from tagsblog where blog=$id")->result();
return $query;
// foreach($gettags as $tag)
// {
//   echo $tag;
//   $q="SELECT * FROM `tags`  where id =$tag";
//   echo $q;
//   $query=$this->db->query($q)->result();
//   $return=array(
//   );
//   foreach($query as $row)
//   {
//     $return[$row->id]=$row->name;
//   }
//
//   return $return;
// }

}
function getsingleblog($id){
$this->db->where("id",$id);
$query=$this->db->get("selftables_blog")->row();
return $query;
}
public function edit($id,$name,$image,$description,$posted_by,$dateofposting)
{

$data=array("name" => $name,"description" => $description,"posted_by" => $posted_by,"dateofposting" => $dateofposting);
if($image != "")
  $data['image']=$image;
$this->db->where( "id", $id );
$query=$this->db->update( "selftables_blog", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `selftables_blog` WHERE `id`='$id'");
return $query;
}
public function getimagebyid($id)
{
$query=$this->db->query("SELECT `image` FROM `selftables_blog` WHERE `id`='$id'")->row();
return $query;
}
public function getdropdown()
{
$query=$this->db->query("SELECT * FROM `selftables_blog` ORDER BY `id`
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
}
?>
