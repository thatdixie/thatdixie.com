<?php
require_once "DBObject.php";

/********************************************
 * Editor_collection_deleted_entity represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Editor_collection_deleted_entity extends DBObject
{    
    public $collection=0;
    public $gid="";



    /*****************************************************
     * Returns an HTTP parameter list for Editor_collection_deleted_entity object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="collection=".$this->collection."&";
        $b.="gid=".$this->gid."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Editor_collection_deleted_entity object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Editor_collection_deleted_entity from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Editor_collection_deleted_entity($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->collection= $json['collection'];
        $this->gid= $json['gid'];

        }
    }
}

?>
