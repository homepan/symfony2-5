<?php
//Repository Codes
// query by the primary key (usually "id")
$product = $repository->find($id);

// dynamic method names to find based on a column value
$product = $repository->findOneById($id);
$product = $repository->findOneByName('foo');

// find *all* products
$products = $repository->findAll();

// find a group of products based on an arbitrary column value
$products = $repository->findByPrice(19.99);

// query for one product matching by name and price
$product = $repository->findOneBy(
    array('name' => 'foo', 'price' => 19.99)
);

// query for all products matching the name, ordered by price
$products = $repository->findBy(
    array('name' => 'foo'),
    array('price' => 'ASC')
);

// Querying for Objects
$repository->find($id);

$repository->findOneByName('Foo');

// Querying for Objects Using Doctrine's Query Builder
$repository = $this->getDoctrine()
    ->getRepository('AcmeStoreBundle:Product');

$query = $repository->createQueryBuilder('p')
    ->where('p.price > :price')
    ->setParameter('price', '19.99')
    ->orderBy('p.price', 'ASC')
    ->getQuery();

$products = $query->getResult();

/*
Take note of the setParameter() method. 
When working with Doctrine, it's always a good idea to set any external values as "placeholders" (:price in the example above) as it prevents SQL injection attacks.
*/

$product = $query->getOneOrNullResult();

//Querying for Objects with DQL
$em = $this->getDoctrine()->getManager();
$query = $em->createQuery(
    'SELECT p
    FROM AcmeStoreBundle:Product p
    WHERE p.price > :price
    ORDER BY p.price ASC'
)->setParameter('price', '19.99');

$products = $query->getResult();

// You can use this new method just like the default finder methods of the repository:
$em = $this->getDoctrine()->getManager();
$products = $em->getRepository('AcmeStoreBundle:Product')->findAllOrderedByName();

// src/Acme/StoreBundle/Entity/ProductRepository.php
public function findOneByIdJoinedToCategory($id)
{
    $query = $this->getEntityManager()
        ->createQuery(
            'SELECT p, c FROM AcmeStoreBundle:Product p
            JOIN p.category c
            WHERE p.id = :id'
        )->setParameter('id', $id);

    try {
        return $query->getSingleResult();
    } catch (\Doctrine\ORM\NoResultException $e) {
        return null;
    }
}