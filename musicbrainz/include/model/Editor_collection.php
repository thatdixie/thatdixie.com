<?php
require_once "DBObject.php";

/********************************************
 * Editor_collection represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Editor_collection extends DBObject
{    
    public $id=0;
    public $gid="";
    public $editor=0;
    public $name="";
    public $public="";
    public $description="";
    public $type=0;



    /*****************************************************
     * Returns an HTTP parameter list for Editor_collection object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="id=".$this->id."&";
        $b.="gid=".$this->gid."&";
        $b.="editor=".$this->editor."&";
        $b.="name=".$this->name."&";
        $b.="public=".$this->public."&";
        $b.="description=".$this->description."&";
        $b.="type=".$this->type."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Editor_collection object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Editor_collection from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Editor_collection($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->id= $json['id'];
        $this->gid= $json['gid'];
        $this->editor= $json['editor'];
        $this->name= $json['name'];
        $this->public= $json['public'];
        $this->description= $json['description'];
        $this->type= $json['type'];

        }
    }
}

?>
