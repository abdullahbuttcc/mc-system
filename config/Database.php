<?php

namespace Config;

/**
 * This database config
 *
 * @category   Config
 * @package    Config
 */
class Database
{

    /**
     * Database host
     * 
     * @var string
     */
    const DB_HOST = 'localhost';

    /**
     * Database name
     * 
     * @var string
     */
    //const DB_NAME = 'mc';//live
    const DB_NAME = 'mc_system';//local

    /**
     * Database username
     * 
     * @var string
     */
    const DB_USER = 'root';

    /**
     * Database password
     * 
     * @var string
     */
    const DB_PASSWORD = '';
    /**
     * Client type
     * 
     * @var string
     */
    const DB_USER_CLIENT = 'client';
    /**
     * Provider type
     * 
     * @var string
     */
    const DB_USER_PROVIDER = 'provider';
    /**
     * Agency type
     * 
     * @var string
     */
    const DB_USER_AGENCY = 'agency';
    /**
     * User types
     * 
     * @var string
     */
    const DB_USER_TYPES = [Database::DB_USER_CLIENT, Database::DB_USER_PROVIDER, Database::DB_USER_AGENCY];


    /**
     * Client Contact Table Name
     * 
     * @var string
     */
    const DB_TABLE_CLIENT = 'clientcontacttable';
    /**
     * Client Contact ID Field Name
     * 
     * @var string
     */
    const DB_TABLE_CLIENT_ID_FIELD = 'ClientContactID';
    /**
     * Provider Contact Table Name
     * 
     * @var string
     */
    const DB_TABLE_PROVIDER = 'providercontacttable';
    /**
     * Provider Contact ID Field Name
     * 
     * @var string
     */
    const DB_TABLE_PROVIDER_ID_FIELD = 'ProviderContactID';
    /**
     * Agency Officer Table Name
     * 
     * @var string
     */
    const DB_TABLE_AGENCY = 'AgencyOfficerTable';
    /**
     * Agency Officer ID Field Name
     * 
     * @var string
     */

    const DB_TABLE_NDISPLANTABLE = 'ndisplantable';
    /**
     * Agency Officer ID Field Name
     * 
     * @var string
     */
    const DB_TABLE_BOOKINGTABLE = 'bookingtable';
    /**
     * Agency Officer ID Field Name
     * 
     * @var string
     */
    const DB_TABLE_PROVIDER_ORGANISATION_TABLE = 'providerorganisationtable';
    /**
     * Agency Officer ID Field Name
     * 
     * @var string
     */
    const DB_TABLE_SERVICES_PROVIDED_TABLE = 'servicesprovidedtable';
    /**
     * Agency Officer ID Field Name
     * 
     * @var string
     */
    const DB_TABLE_DISCUSSION_TABLE = 'discussiontable';
    /**
     * Agency Officer ID Field Name
     * 
     * @var string
     */
    const DB_TABLE_AGENCY_ID_FIELD = 'AgencyOfficerID';
    /**
     * Client history Table Name
     * 
     * @var string
     */
    const DB_TABLE_LOG_CLIENT = 'ClientHistoryTable';
    /**
     * Client History Table Fields
     * 
     * @var string
     */
    const DB_TABLE_LOG_CLIENT_FIELDS = ' `ClientContactID`, `EntryDate`, `NarrativeDate`, `Narrative`, `LastUpdated`';

    /**
     * Provider log Table Name
     * 
     * @var string
     */
    const DB_TABLE_LOG_PROVIDER = 'ProviderHistoryTable';
    /**
     * Provider History Table Fields
     * 
     * @var string
     */
    const DB_TABLE_LOG_PROVIDER_FIELDS = ' `ProviderContactID`, `EntryDate`, `NarrativeDate`, `Narrative`, `LastUpdated`';

    /**
     * Agency log Table Name
     * 
     * @var string
     */
    const DB_TABLE_LOG_AGENCY = 'AgencyOfficerHistoryTable';
    /**
     * Agency History Table Fields
     * 
     * @var string
     */
    const DB_TABLE_LOG_AGENCY_FIELDS = ' `AgencyOfficerID`, `EntryDate`, `NarrativeDate`, `Narrative`, `LastUpdated`';
    /**
     * Tables List
     * 
     * @var string
     */
    const DB_TABLES = [Database::DB_TABLE_CLIENT, Database::DB_TABLE_PROVIDER, Database::DB_TABLE_AGENCY];
    /**
     * Tables List
     * 
     * @var string
     */
    const DB_ID_FIELDS = [Database::DB_TABLE_CLIENT_ID_FIELD, Database::DB_TABLE_PROVIDER_ID_FIELD, Database::DB_TABLE_AGENCY_ID_FIELD];
    /**
     * Log Tables List
     * 
     * @var string
     */
    const DB_TABLES_LOG = [Database::DB_TABLE_LOG_CLIENT, Database::DB_TABLE_LOG_PROVIDER, Database::DB_TABLE_LOG_AGENCY];
    /**
     * Log Tables List
     * 
     * @var string
     */
    const DB_TABLES_LOG_FIELDS = [Database::DB_TABLE_LOG_CLIENT_FIELDS, Database::DB_TABLE_LOG_PROVIDER_FIELDS, Database::DB_TABLE_LOG_AGENCY_FIELDS];

    /**
     * Password Recovery Table Name
     * 
     * @var string
     */
    const DB_TABLE_RECOVERY = 'pwdreset';
}
