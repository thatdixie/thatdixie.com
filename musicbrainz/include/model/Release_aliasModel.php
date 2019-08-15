<?php
require_once "MusicbrainzDB.php";
require      "Release_alias.php";

/********************************************************************
 * Release_aliasModel inherits MusicbrainzDB and provides functions to
 * map Release_alias class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class Release_aliasModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Release_alias by id
     *
     * @return release_alias
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "release,".
                      "name,".
                      "locale,".
                      "edits_pending,".
                      "last_updated,".
                      "type,".
                      "sort_name,".
                      "begin_date_year,".
                      "begin_date_month,".
                      "begin_date_day,".
                      "end_date_year,".
                      "end_date_month,".
                      "end_date_day,".
                      "primary_for_locale,".
                      "ended ".                      		               
	       "FROM release_alias ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Release_alias"));
    }

    /*********************************************************
     * Insert a new Release_alias into musicbrainz database
     *
     * @param $release_alias
     * @return n/a
     *********************************************************
     */
    public function insert($release_alias)
    {
        $query="INSERT INTO release_alias ( ".
	              "id,".
                      "release,".
                      "name,".
                      "locale,".
                      "edits_pending,".
                      "last_updated,".
                      "type,".
                      "sort_name,".
                      "begin_date_year,".
                      "begin_date_month,".
                      "begin_date_day,".
                      "end_date_year,".
                      "end_date_month,".
                      "end_date_day,".
                      "primary_for_locale,".
                      "ended ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$release_alias->release." ,".
                      "'".$this->sqlSafe($release_alias->name)."',".
                      "'".$this->sqlSafe($release_alias->locale)."',".
                      " ".$release_alias->edits_pending." ,".
                      "'".$this->sqlSafe($release_alias->last_updated)."',".
                      " ".$release_alias->type." ,".
                      "'".$this->sqlSafe($release_alias->sort_name)."',".
                      " ".$release_alias->begin_date_year." ,".
                      " ".$release_alias->begin_date_month." ,".
                      " ".$release_alias->begin_date_day." ,".
                      " ".$release_alias->end_date_year." ,".
                      " ".$release_alias->end_date_month." ,".
                      " ".$release_alias->end_date_day." ,".
                      "'".$this->sqlSafe($release_alias->primary_for_locale)."',".
                      "'".$this->sqlSafe($release_alias->ended)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Release_alias into musicbrainz database
     * and return a Release_alias with new autoincrement
     * primary key
     *
     * @param  $release_alias
     * @return $release_alias
     *********************************************************
     */
    public function insert2($release_alias)
    {
        $query="INSERT INTO release_alias ( ".
	              "id,".
                      "release,".
                      "name,".
                      "locale,".
                      "edits_pending,".
                      "last_updated,".
                      "type,".
                      "sort_name,".
                      "begin_date_year,".
                      "begin_date_month,".
                      "begin_date_day,".
                      "end_date_year,".
                      "end_date_month,".
                      "end_date_day,".
                      "primary_for_locale,".
                      "ended ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$release_alias->release." ,".
                      "'".$this->sqlSafe($release_alias->name)."',".
                      "'".$this->sqlSafe($release_alias->locale)."',".
                      " ".$release_alias->edits_pending." ,".
                      "'".$this->sqlSafe($release_alias->last_updated)."',".
                      " ".$release_alias->type." ,".
                      "'".$this->sqlSafe($release_alias->sort_name)."',".
                      " ".$release_alias->begin_date_year." ,".
                      " ".$release_alias->begin_date_month." ,".
                      " ".$release_alias->begin_date_day." ,".
                      " ".$release_alias->end_date_year." ,".
                      " ".$release_alias->end_date_month." ,".
                      " ".$release_alias->end_date_day." ,".
                      "'".$this->sqlSafe($release_alias->primary_for_locale)."',".
                      "'".$this->sqlSafe($release_alias->ended)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $release_alias->id = $id;
	    return($release_alias);	
    }


    /*********************************************************
     * Update a Release_alias in musicbrainz database
     *
     * @param $release_alias
     * @return n/a
     *********************************************************
     */
    public function update($release_alias)
    {
        $query="UPDATE  release_alias ".
	          "SET ".
                      "id= ".$release_alias->id." ,".
                      "release= ".$release_alias->release." ,".
                      "name='".$this->sqlSafe($release_alias->name)."',".
                      "locale='".$this->sqlSafe($release_alias->locale)."',".
                      "edits_pending= ".$release_alias->edits_pending." ,".
                      "last_updated='".$this->sqlSafe($release_alias->last_updated)."',".
                      "type= ".$release_alias->type." ,".
                      "sort_name='".$this->sqlSafe($release_alias->sort_name)."',".
                      "begin_date_year= ".$release_alias->begin_date_year." ,".
                      "begin_date_month= ".$release_alias->begin_date_month." ,".
                      "begin_date_day= ".$release_alias->begin_date_day." ,".
                      "end_date_year= ".$release_alias->end_date_year." ,".
                      "end_date_month= ".$release_alias->end_date_month." ,".
                      "end_date_day= ".$release_alias->end_date_day." ,".
                      "primary_for_locale='".$this->sqlSafe($release_alias->primary_for_locale)."',".
                      "ended='".$this->sqlSafe($release_alias->ended)."' ".                      
	          "WHERE id=".$release_alias->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Release_alias by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM release_alias WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>