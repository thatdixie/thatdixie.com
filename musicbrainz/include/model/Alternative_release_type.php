<?php
require_once "DBObject.php";

/********************************************
 * Alternative_release_type represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Alternative_release_type extends DBObject
{    
    public $id=0;
    public $name="";
    public $parent=0;
    public $child_order=0;
    public $description="";
    public $gid="";



    /*****************************************************
     * Returns an HTTP parameter list for Alternative_release_type object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="id=".$this->id."&";
        $b.="name=".$this->name."&";
        $b.="parent=".$this->parent."&";
        $b.="child_order=".$this->child_order."&";
        $b.="description=".$this->description."&";
        $b.="gid=".$this->gid."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Alternative_release_type object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Alternative_release_type from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Alternative_release_type($jsonString='')
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
        $this->parent= $json['parent'];
        $this->child_order= $json['child_order'];
        $this->description= $json['description'];
        $this->gid= $json['gid'];

        }
    }
}

?>
