<?php
require_once "DBObject.php";

/********************************************
 * Link_attribute_type represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Link_attribute_type extends DBObject
{    
    public $id=0;
    public $parent=0;
    public $root=0;
    public $child_order=0;
    public $gid="";
    public $name="";
    public $description="";
    public $last_updated="";



    /*****************************************************
     * Returns an HTTP parameter list for Link_attribute_type object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="id=".$this->id."&";
        $b.="parent=".$this->parent."&";
        $b.="root=".$this->root."&";
        $b.="child_order=".$this->child_order."&";
        $b.="gid=".$this->gid."&";
        $b.="name=".$this->name."&";
        $b.="description=".$this->description."&";
        $b.="last_updated=".$this->last_updated."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Link_attribute_type object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Link_attribute_type from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Link_attribute_type($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->id= $json['id'];
        $this->parent= $json['parent'];
        $this->root= $json['root'];
        $this->child_order= $json['child_order'];
        $this->gid= $json['gid'];
        $this->name= $json['name'];
        $this->description= $json['description'];
        $this->last_updated= $json['last_updated'];

        }
    }
}

?>
