<?php

namespace CheeVT\Repositories;

use CheeVT\Core\Abstracts\Repository;
use CheeVT\Tables\ContactSubmissionsTable;

class ContactFormSubmissionRepository extends Repository
{
    public function getTable()
    {
        return new ContactSubmissionsTable;
    }
}