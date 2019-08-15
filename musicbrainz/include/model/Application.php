<?php
require_once "DBObject.php";

/********************************************
 * Application represents a table in musicbrainz 
 *
 * @author  megan
 * @version 190704
 ********************************************
 */
class Application extends DBObject
{    
    public $id=0;
    public $owner=0;
    public $name="";
    public $oauth_id="";
    public $oauth_secret="";
    public $oauth_redirect_uri="";



    /*****************************************************
     * Returns an HTTP parameter list for Application object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="id=".$this->id."&";
        $b.="owner=".$this->owner."&";
        $b.="name=".$this->name."&";
        $b.="oauth_id=".$this->oauth_id."&";
        $b.="oauth_secret=".$this->oauth_secret."&";
        $b.="oauth_redirect_uri=".$this->oauth_redirect_uri."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Application object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Application from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Application($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->id= $json['id'];
        $this->owner= $json['owner'];
        $this->name= $json['name'];
        $this->oauth_id= $json['oauth_id'];
        $this->oauth_secret= $json['oauth_secret'];
        $this->oauth_redirect_uri= $json['oauth_redirect_uri'];

        }
    }
}

?>
