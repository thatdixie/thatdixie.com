<?php
require_once "MusicbrainzDB.php";
require      "Language.php";

/********************************************************************
 * LanguageModel inherits MusicbrainzDB and provides functions to
 * map Language class to musicbrainz.
 *
 * @author  megan
 * @version 190704
 *********************************************************************
 */
class LanguageModel extends MusicbrainzDB
{
    /*********************************************************
     * Returns a Language by id
     *
     * @return language
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT id,".
                      "iso_code_2t,".
                      "iso_code_2b,".
                      "iso_code_1,".
                      "name,".
                      "frequency,".
                      "iso_code_3 ".                      		               
	       "FROM language ".
	       "WHERE id=".$id;

        return($this->selectDB($query, "Language"));
    }

    /*********************************************************
     * Insert a new Language into musicbrainz database
     *
     * @param $language
     * @return n/a
     *********************************************************
     */
    public function insert($language)
    {
        $query="INSERT INTO language ( ".
	              "id,".
                      "iso_code_2t,".
                      "iso_code_2b,".
                      "iso_code_1,".
                      "name,".
                      "frequency,".
                      "iso_code_3 ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($language->iso_code_2t)."',".
                      "'".$this->sqlSafe($language->iso_code_2b)."',".
                      "'".$this->sqlSafe($language->iso_code_1)."',".
                      "'".$this->sqlSafe($language->name)."',".
                      " ".$language->frequency." ,".
                      "'".$this->sqlSafe($language->iso_code_3)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Language into musicbrainz database
     * and return a Language with new autoincrement
     * primary key
     *
     * @param  $language
     * @return $language
     *********************************************************
     */
    public function insert2($language)
    {
        $query="INSERT INTO language ( ".
	              "id,".
                      "iso_code_2t,".
                      "iso_code_2b,".
                      "iso_code_1,".
                      "name,".
                      "frequency,".
                      "iso_code_3 ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($language->iso_code_2t)."',".
                      "'".$this->sqlSafe($language->iso_code_2b)."',".
                      "'".$this->sqlSafe($language->iso_code_1)."',".
                      "'".$this->sqlSafe($language->name)."',".
                      " ".$language->frequency." ,".
                      "'".$this->sqlSafe($language->iso_code_3)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $language->id = $id;
	    return($language);	
    }


    /*********************************************************
     * Update a Language in musicbrainz database
     *
     * @param $language
     * @return n/a
     *********************************************************
     */
    public function update($language)
    {
        $query="UPDATE  language ".
	          "SET ".
                      "id= ".$language->id." ,".
                      "iso_code_2t='".$this->sqlSafe($language->iso_code_2t)."',".
                      "iso_code_2b='".$this->sqlSafe($language->iso_code_2b)."',".
                      "iso_code_1='".$this->sqlSafe($language->iso_code_1)."',".
                      "name='".$this->sqlSafe($language->name)."',".
                      "frequency= ".$language->frequency." ,".
                      "iso_code_3='".$this->sqlSafe($language->iso_code_3)."' ".                      
	          "WHERE id=".$language->id;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Language by id
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM language WHERE id=".$id;

        $this->executeQuery($query);
    }
}

?>