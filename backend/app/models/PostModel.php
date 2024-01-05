<?php

require 'BaseModel.php';

use PDO;

class PostModel extends BaseModel
{
    private $post_id;
    private $user_id;
    private $category_id;
    private $title;
    private $content;
    private $image;
    private $views;
    private $archived;

    public function setPostId($post_id)
    {
        $this->post_id = $post_id;
    }

    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function setViews($views)
    {
        $this->views = $views;
    }



    public function setArchived($archived)
    {
        $this->archived = $archived;
    }


    public static function latest()
    {
        return static::database()->query('SELECT * FROM posts ORDER BY post_id DESC')
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($post_id)
    {
        return static::database()->query("SELECT * FROM posts WHERE post_id =  $post_id")
            ->fetchAll(PDO::FETCH_ASSOC);
    }



    public function create()
    {
        $sqlState = static::database()->prepare("INSERT INTO posts (user_id, category_id, title, content, image, views) VALUES (?, ?, ?, ?, ?, ?)");
        return $sqlState->execute([$this->user_id, $this->category_id, $this->title, $this->content, $this->image, $this->views]);
    }



    public function update()
    {
        $sql = "UPDATE posts SET ";
        $params = [];


        // if  equal null thats mean won't update that column
        if ($this->user_id !== null) {
            $sql .= "user_id=?, ";
            $params[] = $this->user_id;
        }

        if ($this->category_id !== null) {
            $sql .= "category_id=?, ";
            $params[] = $this->category_id;
        }

        if ($this->title !== null) {
            $sql .= "title=?, ";
            $params[] = $this->title;
        }

        if ($this->content !== null) {
            $sql .= "content=?, ";
            $params[] = $this->content;
        }

        if ($this->image !== null) {
            $sql .= "image=?, ";
            $params[] = $this->image;
        }

        if ($this->views !== null) {
            $sql .= "views=?, ";
            $params[] = $this->views;
        }


        if ($this->archived !== null) {
            $sql .= "archived=?, ";
            $params[] = $this->archived;
        }

        // Remove the trailing comma and space from the SQL string
        $sql = rtrim($sql, ", ");

        $sql .= " WHERE post_id=?";
        $params[] = $this->post_id;

        $sqlState = static::database()->prepare($sql);

        return $sqlState->execute($params);
    }



    //archived all post
    public static function archived($post_id)
    {
        $archivPosts = self::database()->prepare("UPDATE posts SET archived = 0 WHERE post_id = ?");
        $archivPosts->execute([$post_id]);
    }


    //remove post 
    public static function destroy($post_id)
    {
        $sqlState = self::database()->prepare("DELETE FROM posts WHERE post_id = ?");
        return $sqlState->execute([$post_id]);
    }
}
