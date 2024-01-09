<?php

require 'BaseModel.php';


class FilterModel extends BaseModel
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





    // all posts under tag
    //bring alll dposts for user id
    public static function findPostsByTag($tag)
    {
        return static::database()->query("SELECT
            posts.*,
            categories.category_name AS category,
            GROUP_CONCAT(tags.tag_name) AS tags,
            users.username,
            users.image AS image_author
        FROM
            posts
        LEFT JOIN
            categories ON categories.category_id = posts.category_id
        LEFT JOIN
            post_tags ON post_tags.post_id = posts.post_id
        LEFT JOIN
            tags ON tags.tag_id = post_tags.tag_id
        LEFT JOIN 
            users ON users.user_id = posts.user_id
        WHERE tags.tag_name = '$tag' 
        GROUP BY posts.post_id")
            ->fetchAll(PDO::FETCH_ASSOC);
    }



    // all posts under category name
    public static function findPostsByCategory($category)
    {
        return static::database()->query("SELECT
            posts.*,
            categories.category_name AS category,
            GROUP_CONCAT(tags.tag_name) AS tags,
            users.username,
            users.image AS image_author
        FROM
            posts
        LEFT JOIN
            categories ON categories.category_id = posts.category_id
        LEFT JOIN
            post_tags ON post_tags.post_id = posts.post_id
        LEFT JOIN
            tags ON tags.tag_id = post_tags.tag_id
        LEFT JOIN 
            users ON users.user_id = posts.user_id
        WHERE categories.category_name = '$category' 
        GROUP BY posts.post_id")
            ->fetchAll(PDO::FETCH_ASSOC);
    }


    public static function searchPosts($word)
    {
        $query = "SELECT
            posts.*,
            categories.category_name AS category,
            GROUP_CONCAT(tags.tag_name) AS tags,
            users.username,
            users.image AS image_author
        FROM
            posts
        LEFT JOIN
            categories ON categories.category_id = posts.category_id
        LEFT JOIN
            post_tags ON post_tags.post_id = posts.post_id
        LEFT JOIN
            tags ON tags.tag_id = post_tags.tag_id
        LEFT JOIN 
            users ON users.user_id = posts.user_id
        WHERE 
            categories.category_name LIKE '%$word%'
            OR posts.title LIKE '%$word%'
            OR tags.tag_name LIKE '%$word%'
        GROUP BY posts.post_id";

        return static::database()->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }
}
