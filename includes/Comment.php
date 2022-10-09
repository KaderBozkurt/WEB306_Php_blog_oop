<?php

class Comment{
    private $id;
    private $blog_id;
    private $date;
    private $name;
    private $comment;

    /*
     * Find records and return an assoc. array of comment objects.
     * @param  $sql
     * @param null $bindval
     * @return array
     */

    public static function find ($sql, $binVal= null){
        global $dbc;
        $comments = $dbc -> fetchArray($sql, $binVal);
        if (!$comments){
            return [];
        }

        foreach ($comments as $comment){
            $commentObjArray[]= new self ($comment['id'],
            $comment['blog_id'], $comment['date'], $comment['name'], $comment['comment']);
        }
        return $commentObjArray;

    }

    public function __construct($id,$blogId,$date,$name,$comment){

        $this->id = $id;
        $this->blogId = $blogId;
        $this->date = $date;
        $this->name = $name;
        $this->comment = $comment;

    }

    public function create(){
        global $dbc;

        $sql = "INSERT INTO `comments`".
            "(blog_id,date,name,comment) ".
            "VALUES (:blog_id, NOW(), :name, :comment);";

        $bindVal = ['blog_id' => $this->blogId,
                    'name' =>$this->name,
                    'comment'=>$this->comment];

        return $dbc->sqlQuery($sql, $bindVal);

    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getBlogId()
    {
        return $this->blog_id;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param mixed $blog_id
     */
    public function setBlogId($blog_id)
    {
        $this->blog_id = $blog_id;
        return $this;
    }

    /**
     * @param mixed $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
        return $this;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
        return$this;
    }




}


?>