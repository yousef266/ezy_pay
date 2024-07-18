
<?php
require_once 'DBcontrollers.php';
class Announcementcontrollers {
    private $title;
    private $content;
    public function __construct($title, $content) {
        $this->title = $title;
        $this->content = $content;
        // $this->date = $date;
    }
    public function addAnnouncement($admin_id) {
        $db = new DBController();
        if($db->openConnection()) {
            $query = "INSERT INTO annoucement (title, content, admin_id) VALUES ('$this->title', '$this->content', '$admin_id')";
            $result = $db->runQuery($query);
            $db->closeConnection();
            if($result) {
                return $this;
            } else {
                return false;
            }
        }
    }
    public function ShowAnnouncement() {
        $db = new DBController();
        if($db->openConnection()) {
            $query = "SELECT * FROM annoucement";
            $result = $db->get($query);
            $db->closeConnection();
            if($result) {
                foreach($result as $row) {
                    ?>
                    <div class="border rounded border-info p-3 m-3 d-flex flex-column align-items-start w-100">
                        <div class="ap-3" style="font-size:25px" ><?php echo $row['title']; ?></div>
                        <div class="ap-3" style="font-size:25px" ><?php echo $row['content']; ?></div>
                    </div>
                    <?php
                }
            } else {
                return false;
            }
        }
    }
}

?>