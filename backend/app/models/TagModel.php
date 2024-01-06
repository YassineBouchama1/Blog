<?php

require 'BaseModel.php';

class TagModel extends BaseModel
{
    private $id;
    private $name;

    // Setter for id
    public function setId($id)
    {
        $this->id = $id;
    }

    // Setter for name
    public function setName($name)
    {
        $this->name = $name;
    }



    // Get all categories ordered by desc
    public static function latest()
    {
        return static::database()->query('SELECT * FROM tags ORDER BY tag_id DESC')
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get category by id
    public static function find($tagId)
    {
        return static::database()->query("SELECT * FROM tags WHERE tag_id = $tagId")
            ->fetch(PDO::FETCH_ASSOC);
    }

    // Create a new category
    public function create()
    {
        $sqlState = static::database()->prepare("INSERT INTO tags (tag_name) VALUES (?)");
        return $sqlState->execute([$this->name]);
    }


    // Update category
    public function update()
    {
        // Pre SQL query
        $sql = "UPDATE tags SET tag_name = ? WHERE tag_id=?";

        $sqlState = static::database()->prepare($sql);

        return $sqlState->execute([$this->id, $this->name]);
    }


    // Remove category
    public static function destroy($tagId)
    {


         // Then, delete the post tag
         $sqlState = static::database()->prepare("DELETE FROM post_tag WHERE tag_id = ?");
         return $sqlState->execute([$tagId]);

        //remove all posts belong this tag
        $archivPosts = self::database()->prepare("DELETE FROM tags WHERE tag_id = ?");
        $archivPosts->execute([$tagId]);
        
       
    }
}
