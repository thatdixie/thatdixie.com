<?php
require_once "DBObject.php";

/********************************************
 * Edit_artist represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Edit_artist extends DBObject
{    
    public $edit=0;
    public $artist=0;
    public $status=0;



    /*****************************************************
     * Returns an HTTP parameter list for Edit_artist object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="edit=".$this->edit."&";
        $b.="artist=".$this->artist."&";
        $b.="status=".$this->status."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Edit_artist object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Edit_artist from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Edit_artist($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->edit= $json['edit'];
        $this->artist= $json['artist'];
        $this->status= $json['status'];

        }
    }
}

?>
