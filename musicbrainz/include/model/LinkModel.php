<?php
require_once "MusicbrainzDB.php";
require      "Link.php";

/********************************************************************
 * LinkModel inherits MusicbrainzDB and provides functions to
 * map Link class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class LinkModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Link by id
     *
     * @return link
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "link_type,".
                      "begin_date_year,".
                      "begin_date_month,".
                      "begin_date_day,".
                      "end_date_year,".
                      "end_date_month,".
                      "end_date_day,".
                      "attribute_count,".
                      "created,".
                      "ended ".                      		               
	       "FROM link ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Link"));
    }

    /*********************************************************
     * Insert a new Link into musicbrainz database
     *
     * @param $link
     * @return n/a
     *********************************************************
     */
    public function insert($link)
    {
        $query="INSERT INTO link ( ".
	              "id,".
                      "link_type,".
                      "begin_date_year,".
                      "begin_date_month,".
                      "begin_date_day,".
                      "end_date_year,".
                      "end_date_month,".
                      "end_date_day,".
                      "attribute_count,".
                      "created,".
                      "ended ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$link->link_type." ,".
                      " ".$link->begin_date_year." ,".
                      " ".$link->begin_date_month." ,".
                      " ".$link->begin_date_day." ,".
                      " ".$link->end_date_year." ,".
                      " ".$link->end_date_month." ,".
                      " ".$link->end_date_day." ,".
                      " ".$link->attribute_count." ,".
                      "'".$this->sqlSafe($link->created)."',".
                      "'".$this->sqlSafe($link->ended)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Link into musicbrainz database
     * and return a Link with new autoincrement
     * primary key
     *
     * @param  $link
     * @return $link
     *********************************************************
     */
    public function insert2($link)
    {
        $query="INSERT INTO link ( ".
	              "id,".
                      "link_type,".
                      "begin_date_year,".
                      "begin_date_month,".
                      "begin_date_day,".
                      "end_date_year,".
                      "end_date_month,".
                      "end_date_day,".
                      "attribute_count,".
                      "created,".
                      "ended ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$link->link_type." ,".
                      " ".$link->begin_date_year." ,".
                      " ".$link->begin_date_month." ,".
                      " ".$link->begin_date_day." ,".
                      " ".$link->end_date_year." ,".
                      " ".$link->end_date_month." ,".
                      " ".$link->end_date_day." ,".
                      " ".$link->attribute_count." ,".
                      "'".$this->sqlSafe($link->created)."',".
                      "'".$this->sqlSafe($link->ended)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $link->id = $id;
	    return($link);	
    }


    /*********************************************************
     * Update a Link in musicbrainz database
     *
     * @param $link
     * @return n/a
     *********************************************************
     */
    public function update($link)
    {
        $query="UPDATE  link ".
	          "SET ".
                      "id= ".$link->id." ,".
                      "link_type= ".$link->link_type." ,".
                      "begin_date_year= ".$link->begin_date_year." ,".
                      "begin_date_month= ".$link->begin_date_month." ,".
                      "begin_date_day= ".$link->begin_date_day." ,".
                      "end_date_year= ".$link->end_date_year." ,".
                      "end_date_month= ".$link->end_date_month." ,".
                      "end_date_day= ".$link->end_date_day." ,".
                      "attribute_count= ".$link->attribute_count." ,".
                      "created='".$this->sqlSafe($link->created)."',".
                      "ended='".$this->sqlSafe($link->ended)."' ".                      
	          "WHERE id=".$link->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Link by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM link WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>