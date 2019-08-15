
<?php
require_once "DBConstants.php";

/********************************************************************
 * MusicbrainzDB is the base class for musicbrainz access.
 *
 * @author  megan
 * @version 190704
 ********************************************************************
 */
class MusicbrainzDB implements DBConstants
{
    public $conn = null;    //our DB connection

    /********************************************************
     * Returns a connection object for a musicbrainz connection
     *
     * @return $conn
     *********************************************************
     */
    public function connectDB()
    {
        //--------------------------------------
	    // Construct Data Source Name (DSN)
	    // username and password for PDO object
	    //--------------------------------------
        $dsn =""        .MusicbrainzDB::DBDRIVER.  ":";
        $dsn.="host="   .MusicbrainzDB::DBSERVER.  ";";
        $dsn.="dbname=" .MusicbrainzDB::DBNAME.    ";";
        $dsn.="port="   .MusicbrainzDB::DBPORT.    ";";
        $dsn.="charset=".MusicbrainzDB::DBCHARSET;
	    $username       =MusicbrainzDB::DBUSER;
	    $password       =MusicbrainzDB::DBPASSWORD;

        return(new PDO($dsn,$username,$password));
    }

    /********************************************************
     * Returns an array of resulting rows for an objecct
     *
     * @param $query
     * @param $class
     *
     * @return $results
     *********************************************************
     */
    public function selectDB($query, $class )
    {
        $this->conn = $this->connectDB();

        $result = $this->conn->query($query);
	    $result->setFetchMode(PDO::FETCH_CLASS, $class);

        for($i=0; $f=$result->fetch(); $i++)
	    if($f !=0)
	        $r[$i] = $f;
		
        $this->conn = null;
        return($r);
    }


    /********************************************************
     * executeQuery
     *
     * @param $query
     * @return n/a
     *********************************************************
     */
    public function executeQuery($query)
    {
        $this->conn = $this->connectDB();
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
        $this->conn->exec($query);
        $this->conn = null;
    }


    /********************************************************
     * executeInsert
     *
     * @param  $query
     * @return $id
     *********************************************************
     */
    public function executeInsert($query)
    {
        $this->conn = $this->connectDB();
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
        $this->conn->exec($query);
        $id   = $this->conn->lastInsertId();
        $this->conn = null;
	    return($id);
    }

    /********************************************************
     * sqlSafe -- 100% sql injection proof sanitizer
     *            USE UTF8 CHARSET!
     *
     * @param  $attr
     * @return $attr
     *********************************************************
     */
    public function sqlSafe($attr)
    {
	    return(addslashes($attr));
    }
}

?>