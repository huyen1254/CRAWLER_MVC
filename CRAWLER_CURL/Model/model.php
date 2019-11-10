<?php
class Model{
    function __construct($db)
    {
        try {
            $this->db=$db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
    public function addPage($path,$host,$title,$content,$date){
        $query = "INSERT INTO pages (path, host, title, content, download_time)
        VALUES (\"" . mysqli_real_escape_string($this->db, $path) . "\", \"$path \", \"$title\", \"$content\",  \"$date\")
        ON DUPLICATE KEY UPDATE host=\"$path \", title=\"$title\", content=\"$content\",  download_time=\"$date\"";
        if (!mysqli_query($this->connectDB, $query)) {
            die("<br>Error: Unable to perform Insert Query\n");
        }
    }
}
?>