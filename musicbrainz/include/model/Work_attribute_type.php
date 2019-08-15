<?php
require_once "DBObject.php";

/********************************************
 * Work_attribute_type represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Work_attribute_type extends DBObject
{    
    public $id=0;
    public $name="";
    public $comment="";
    public $free_text="";
    public $parent=0;
    public $child_order=0;
    public $description="";
    public $gid="";



    /*****************************************************
     * Returns an HTTP parameter list for Work_attribute_type object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="id=".$this->id."&";
        $b.="name=".$this->name."&";
        $b.="comment=".$this->comment."&";
        $b.="free_text=".$this->free_text."&";
        $b.="parent=".$this->parent."&";
        $b.="child_order=".$this->child_order."&";
        $b.="description=".$this->description."&";
        $b.="gid=".$this->gid."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Work_attribute_type object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Work_attribute_type from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Work_attribute_type($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->id= $json['id'];
        $this->name= $json['name'];
        $this->comment= $json['comment'];
        $this->free_text= $json['free_text'];
        $this->parent= $json['parent'];
        $this->child_order= $json['child_order'];
        $this->description= $json['description'];
        $this->gid= $json['gid'];

        }
    }
}

?>
