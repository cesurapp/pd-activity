<?php

/**
 * This file is part of the pd-admin pd-activity package.
 *
 * @package     pd-activity
 * @license     LICENSE
 * @author      Ramazan APAYDIN <apaydin541@gmail.com>
 * @link        https://github.com/appaydin/pd-activity
 */

namespace Pd\ActivityBundle\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Pd\ActivityBundle\Entity\MailLog;

/**
 * @method MailLog|null find($id, $lockMode = null, $lockVersion = null)
 * @method MailLog|null findOneBy(array $criteria, array $orderBy = null)
 * @method MailLog[]    findAll()
 * @method MailLog[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MailLogRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MailLog::class);
    }
}
