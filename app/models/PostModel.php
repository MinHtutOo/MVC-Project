<?php
 
class PostModel 
{
    private $db;

    public function __construct()
    {
       $this->db = new Database(); 
    }

    public function getCat($id) 
    {
        // print_r($id);
        $this->db->query("SELECT * FROM posts WHERE cat_id=:id ORDER BY id DESC");
        $this->db->bind(":id", $id);
        return $this->db->multiSet();
    }

    public function getAllPost()
    {
        $this->db->query("SELECT * FROM posts");
        return $this->db->multiSet();

    }

    public function insertPost($cat_id, $title, $desc, $image, $content)
    {
        $this->db->query("INSERT INTO posts (cat_id,title,description,image,content)
        VALUES (:cat_id,:title,:description,:image,:content)");
        $this->db->bind(":cat_id", $cat_id);
        $this->db->bind(":title", $title);
        $this->db->bind(":description", $desc);
        $this->db->bind(":image", $image);
        $this->db->bind(":content", $content);
        return $this->db->execute();
    }

    public function getPostById($id)
    {
        $this->db->query("SELECT * FROM posts WHERE id=:id ");
        $this->db->bind(":id", $id);
        return $this->db->singleSet();
    }

    public function updateData($id,$cat_id, $title, $desc, $image, $content)
    {
        $this->db->query("UPDATE posts SET cat_id=:cat_id,title=:title,description=:description,
        image=:image,content=:content WHERE id=:id");
        $this->db->bind(":cat_id", $cat_id);
        $this->db->bind(":title", $title);
        $this->db->bind(":description", $desc);
        $this->db->bind(":image", $image);
        $this->db->bind(":content", $content);
        $this->db->bind(":id", $id);
        return $this->db->execute();
    }

    public function deletePost($id)
    {
        $this->db->query("DELETE FROM posts WHERE id=:id");
        $this->db->bind(":id", $id);
        return $this->db->execute();
    }
}

?>