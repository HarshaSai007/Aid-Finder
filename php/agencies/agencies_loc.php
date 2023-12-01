<?php
class Track
{
    // (A) CONSTRUCTOR - CONNECT TO DATABASE
    public $pdo = null;
    public $stmt = null;
    public $error = "";
    function __construct()
    {
        $this->pdo = new PDO(
            "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET,
            DB_USER,
            DB_PASSWORD,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        );
    }

    // (B) DESTRUCTOR - CLOSE CONNECTION
    function __destruct()
    {
        if ($this->stmt !== null) {
            $this->stmt = null;
        }
        if ($this->pdo !== null) {
            $this->pdo = null;
        }
    }

    // (C) HELPER FUNCTION - EXECUTE SQL QUERY
    function query($sql, $data = null): void
    {
        $this->stmt = $this->pdo->prepare($sql);
        $this->stmt->execute($data);
    }

    // (D) UPDATE RIDER COORDINATES
    // function update($id, $lng, $lat)
    // {
    //     $this->query(
    //         "REPLACE INTO `gps_track` (`rider_id`, `track_time`, `track_lng`, `track_lat`) VALUES (?, ?, ?, ?)",
    //         [$id, date("Y-m-d H:i:s"), $lng, $lat]
    //     );
    //     return true;
    // }

    // (E) GET RIDER(S) COORDINATES
    function get($id = null)
    {
        $this->query(
            "SELECT * FROM `agencies`",
        );
        return $this->stmt->fetchAll();
    }

    function near_by($lat, $lon)
    {
        $this->query(
            "SELECT * FROM `agencies` WHERE 6371 * ACOS( SIN(RADIANS(a_lat)) * SIN(RADIANS($lat)) + COS(RADIANS(a_lat)) * COS(RADIANS($lat)) * COS(RADIANS(a_lon - ($lon)))) <= 20;
            ",
        );
        return $this->stmt->fetchAll();
    }
}

// (F) DATABASE SETTINGS - CHANGE THESE TO YOUR OWN!
define("DB_HOST", "localhost");
define("DB_NAME", "aid_finder");
define("DB_CHARSET", "utf8mb4");
define("DB_USER", "root");
define("DB_PASSWORD", "");

// (G) START!
$_TRACK = new Track();