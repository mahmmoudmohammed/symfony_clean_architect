<?php

namespace App\User\Infrastructure\Repository;

use App\User\Domain\Model\User;
use App\User\DTO\UserSearchDto;
use App\User\Infrastructure\Repository\Contract\UserRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository implements UserRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }
    public function search(UserSearchDto $dto): array
    {
        $qb = $this->createQueryBuilder('u')
            ->select('u')
            ->join('u.person', 'p');
        $expr = $qb->expr();
        foreach (UserSearchDto::getSearchableFields() as $searchableField) {
            $field  = 'get'.ucfirst($searchableField);
            $value = $dto->{$field}();
            if (is_string($value)) {
                $expr->andX($expr->like("pt.$searchableField", ":$searchableField"));
            }
            if (is_integer($value)) {
                $expr->andX($expr->eq("pt.$searchableField", ":$searchableField"));
            }
            $qb->setParameter(":$searchableField", $value);
        }
        $qb->where($expr);
        return $qb->getQuery()->getArrayResult();
    }

}
