<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root.'/Framework/Front_Default_Header.php';

/**
 * Contains the methods for interact with the databases
 *
 * @package    Oil and Gas Backend
 * @subpackage Front Model
 * @license    http://opensource.org/licenses/gpl-license.php  GNU Public License
 * @author     Raul Castro <raul@crc-software.com> CRC Software Engineering 
 */
class Front_Model
{
    private $db;
    
    public function __construct()
    {
        $this->db = new Mysqli_Tool(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    }
    
    /**
     * getGeneralAppInfo
     *
     * get all the info that from the table app_info, this is about the application
     * the name, url, creator and so
     *
     * @return array row containing the info
     */
    
    public function getGeneralAppInfo()
    {
        try {
            $query = 'SELECT * FROM app_info';
            
            return $this->db->getRow($query);
            
        } catch (Exception $e) {
            return false;
        }
    }
    
    public function getAllBlogPosts()
    {
        try {
            $query = "SELECT b.title, 
                    b.blog_id,
                    b.category_id,
                    bc.title AS category_name,
                    b.photo,
                    b.preview,
                    b.blog_content,
                    b.date,
                    u.FirstName,
                    u.LastName
                    FROM blog b
                    LEFT JOIN users u ON u.user_id = b.user_id
                    LEFT JOIN blog_categories bc ON bc.category_id = b.category_id
                    ORDER BY b.blog_id DESC";

            return $this->db->getArray($query);
        } catch (Exception $e) {
            return false;
        }
    }
    
    public function getAllGalleryPhotos()
    {
        try {
            $query = "SELECT * FROM gallery ORDER BY photo_id DESC";
            return $this->db->getArray($query);
        } catch (Exception $e) {
            return false;
        }
    }
    
    public function getPhotoRange($from, $to)
    {
        try {
            $query = "SELECT * FROM gallery ORDER BY photo_id DESC LIMIT ".$from.", ".$to."";
            return $this->db->getArray($query);
        } catch (Exception $e) {
            return false;
        }
    }
    
    public function getBlogCategories()
    {
        try {
            $query = "SELECT  
                    count(*) AS cnt, 
                    b.category_id,
                    bc.title AS category_name
                    FROM blog b
                    LEFT JOIN blog_categories bc ON bc.category_id = b.category_id
                    GROUP BY b.category_id
                    HAVING cnt > 0
                    ORDER BY bc.title ASC";
            
            return $this->db->getArray($query);
        } catch (Exception $e) {
            return false;
        }
    }
    
    public function getPostsRange($from, $to)
    {
        try {
            $query = "SELECT b.title, 
                    b.blog_id,
                    b.category_id,
                    bc.title AS category_name,
                    b.photo,
                    b.preview,
                    b.blog_content,
                    b.date,
                    u.FirstName,
                    u.LastName
                    FROM blog b
                    LEFT JOIN users u ON u.user_id = b.user_id
                    LEFT JOIN blog_categories bc ON bc.category_id = b.category_id
                    ORDER BY b.blog_id DESC LIMIT ".$from.", ".$to."";
//             $query = "SELECT * FROM blog ORDER BY blog_id DESC LIMIT ".$from.", ".$to."";
            return $this->db->getArray($query);
        } catch (Exception $e) {
//             return false;
            echo $e->getMessage();
        }
    }
    
    public function getMonthsBlog()
    {
        try {
            $query = 'SELECT  
                    count(*) AS cnt, 
                    DATE_FORMAT(b.date, "%b %Y") AS date
                    FROM blog b
                    GROUP BY b.date
                    HAVING cnt > 0
                    ORDER BY b.date DESC';
            
            return $this->db->getArray($query);
        } catch (Exception $e) {
            return false;
        }
    }
}
