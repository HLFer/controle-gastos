<?php

namespace finance\Repositories;

use finance\Contracts\Repository as RepositoryContract;
use finance\Traits\CreateRecords;
use finance\Traits\DeleteRecords;
use finance\Traits\ReadRecords;
use finance\Traits\UpdateRecords;


/**
 * Class CrudRepository.
 */
abstract class CrudRepository extends Repository implements RepositoryContract
{
    use CreateRecords,
        ReadRecords,
        UpdateRecords,
        DeleteRecords;
}