<?php
require_once "DBObject.php";

/********************************************
 * Edit_release_group represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Edit_release_group extends DBObject
{    
    public $edit=0;
    public $release_group=0;



    /*****************************************************
     * Returns an HTTP parameter list for Edit_release_group object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="edit=".$this->edit."&";
        $b.="release_group=".$this->release_group."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Edit_release_group object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Edit_release_group from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Edit_release_group($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->edit= $json['edit'];
        $this->release_group= $json['release_group'];

        }
    }
}

?>
