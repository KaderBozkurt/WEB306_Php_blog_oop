<?php

class Entry{
private $id;
private $catId;
private $date;
private $subject;
private $body;
public static function find($sql,$bindVal=null){
    global $dbc;
    $entries = $dbc -> fetchArray($sql, $bindVal);
    if (!$entries){
        return [];
    }
    foreach ($entries as $entry ){
        $entryObjArray[]= new self ($entry['id'],
        $entry['cat_id'],
        $entry['date'],
        $entry['subject'],
        $entry['body']);
        }

    return $entryObjArray;

}
public function __construct($id,$catId, $date,$subject,$body){
    $this->id = $id;
   $this->catId = $catId;
    $this->date = $date;
    $this->subject = $subject;
    $this->body = $body;
}
    public function create(){
        global $dbc;
        $sql="INSERT INTO `entries`" ."(cat_id,date,subject,body) ".
            "VALUES(:cat_id,NOW(), :subject, :body);";
        $bindVal=['cat_id'=>$this->catId,
            'subject'=>$this->subject,
            'body'=>$this->body];
        return $dbc->sqlQuery($sql,$bindVal);

}
public function update(){
    global $dbc;
    $sql= "UPDATE entries Set cat_id=:catId,".
        "subject = :subject,".
        "body = :body WHERE id = :id";
    $bindVal = ['catId'=>$this->catId,
        'subject'=>$this ->subject,
        'body' =>$this ->body,
        'id'=>$this->id];
    return $dbc ->sqlQuery($sql,$bindVal);

}
public function getId(){
    return $this->id;

}

    /**
     * @return mixed
     */
    public function getCatId()
    {
        return $this->catId;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {

        return $this->body;
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
     * @param mixed $catId
     */
    public function setCatId($catId)
    {
        $this->catId = $catId;
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
     * @param mixed $body
     */
    public function setBody($body)
    {

        $this->body = $body;
        return $this;
    }

    /**
     * @param mixed $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
        return $this;
    }



}

?>