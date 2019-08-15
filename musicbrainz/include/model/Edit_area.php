<?php
require_once "DBObject.php";

/********************************************
 * Edit_area represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Edit_area extends DBObject
{    
    public $edit=0;
    public $area=0;



    /*****************************************************
     * Returns an HTTP parameter list for Edit_area object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="edit=".$this->edit."&";
        $b.="area=".$this->area."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Edit_area object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Edit_area from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Edit_area($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->edit= $json['edit'];
        $this->area= $json['area'];

        }
    }
}

?>
