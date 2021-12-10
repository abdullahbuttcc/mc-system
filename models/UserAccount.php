<?php

namespace App\Models;
require_once __DIR__.'/../config/Database.php';
require_once __DIR__.'/Model.php';

use Config\Database;
use Core\Model;

/**
 * The customer class.
 *
 * This model for managing the users.
 *
 * @category   Models
 * @package    App\Models
 */
class UserAccount extends Model {

    /**
     * The model construct
     *
     */

    
    public function __construct() {

        /**
         * The database table name.
         */
        parent::__construct(Database::DB_TABLE_USER);
    }

    /**
     * Method getting all records from database.
     * [Implemented method from the Model class]
     *
     * @return array
     * @access  public
     */
    public function getAll(): iterable {

        return $this->DB()
                        ->query('SELECT * FROM '.Database::DB_TABLE_USER)
                        ->fetchAll(\PDO::FETCH_ASSOC);
    }

}