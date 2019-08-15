<?php
require_once "DBObject.php";

/********************************************
 * Editor_collection_release represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Editor_collection_release extends DBObject
{    
    public $collection=0;
    public $release=0;



    /*****************************************************
     * Returns an HTTP parameter list for Editor_collection_release object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="collection=".$this->collection."&";
        $b.="release=".$this->release."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Editor_collection_release object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Editor_collection_release from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Editor_collection_release($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->collection= $json['collection'];
        $this->release= $json['release'];

        }
    }
}

?>
