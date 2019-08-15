<?php
require_once "DBObject.php";

/********************************************
 * Release_group_annotation represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Release_group_annotation extends DBObject
{    
    public $release_group=0;
    public $annotation=0;



    /*****************************************************
     * Returns an HTTP parameter list for Release_group_annotation object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="release_group=".$this->release_group."&";
        $b.="annotation=".$this->annotation."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Release_group_annotation object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Release_group_annotation from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Release_group_annotation($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->release_group= $json['release_group'];
        $this->annotation= $json['annotation'];

        }
    }
}

?>
