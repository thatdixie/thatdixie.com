<?php
require_once "DBObject.php";

/********************************************
 * Edit_recording represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Edit_recording extends DBObject
{    
    public $edit=0;
    public $recording=0;



    /*****************************************************
     * Returns an HTTP parameter list for Edit_recording object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="edit=".$this->edit."&";
        $b.="recording=".$this->recording."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Edit_recording object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Edit_recording from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Edit_recording($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->edit= $json['edit'];
        $this->recording= $json['recording'];

        }
    }
}

?>
