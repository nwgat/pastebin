<?php

class Database {

        var $db;
        
        function Database( $db, $host, $user, $pass )
        {
                $this->db = new mysqli($host, $user, $pass, $db);
                
        }
        
        function SanitizeString( $string )
        {
                if(get_magic_quotes_gpc())
                {
                        $string = stripslashes( $string );
                }

                return mysqli_real_escape_string($this->db, $string );
        }
        
        function Query( $query )
        {
                $q = mysqli_query( $this->db, $query ) or print( "<h1>Error</h1><p>There has been a problem with the database<br /><span style=\"color:#AA0000\">$query</span>" . mysqli_error($this->db) );
                return $q;
        }
		
		function InsertID( )
		{
				return mysqli_insert_id( $this->db );
		}
        
        function QueryArray( $query ) 
        {
                $return = $this->Query( $query );
                $returnval = array();
                
                while( $r = mysqli_fetch_array( $return ) )
                {
                        $returnval[] = $r;
                }
                
                return $returnval;      
        }
		
		function QueryArrayIndexed( $query )
		{
                $return = $this->Query( $query );
                $returnval = array();
                
                while( $r = mysqli_fetch_array( $return ) )
                {
                        $returnval[$r[0]] = $r;
                }
                
                return $returnval;    		
		}
        
        function SelectFirst( $from, $where = "", $fields = "*", $extrasql = "" )
        {
                if( $where != "" )
                        $where = " WHERE " . $where;
                
                $return = $this->Query( "SELECT " . $this->SanitizeString( $fields ) . " FROM " . $this->SanitizeString( $from ) . $where . " " . $extrasql );
                
                if( !$return )
                        return array();
                
                return mysqli_fetch_array( $return );
        }
        
        function SelectArray( $from, $where = "", $fields = "*", $extrasql = "" ) // extrasql is not sanitised.
        {
                if( $where != "" )
                        $where = " WHERE " . $where;
                        
                $return = $this->Query( "SELECT " . $this->SanitizeString( $fields ) . " FROM " . $from . $where . " " . $extrasql );
                $returnval = array();
                
                if( $return )
                {
                        while( $r = mysqli_fetch_array( $return ) )
                        {
                                $returnval[] = $r;
                        }
                }
                
                return $returnval;
        }

        function SimpleInsert( $table, $values )
        {
                $fields = "";
                $valuez = "";
                $count = 0;
                
                foreach( $values as $k => $v )
                {
                        if( $count > 0 )
                        {
                                $fields .= ", "; // concat a comma in front of the string to seperate
                                $valuez .= ", ";
                        }
                                
                        $fields .= "`" . $this->SanitizeString( $k ) . "`";
                        $valuez .= "'" . $this->SanitizeString( $v ) . "'";
                
                        $count++;
                }
                
                return $this->Query( "INSERT INTO " . $table . " ( " . $fields . " ) VALUES( " . $valuez . " )" );
        }
		
		function SimpleUpdate( $table, $values, $where, $limit = 1 )
		{
			$fields = "";
			$count = 0;
                
			foreach( $values as $k => $v )
			{
				if( $count > 0 )
				{
					$fields .= ", "; // concat a comma in front of the string to seperate
				}
                                
				$fields .= "`" . $this->SanitizeString( $k ) . "` = '" . $this->SanitizeString( $v ) . "'";
				$count++;
			}
			
			if( $limit > 0 )
				$where .= " LIMIT " . $limit;
                
			return $this->Query( "UPDATE " . $table . " SET " . $fields . " WHERE " . $where );		
		}
}

?>