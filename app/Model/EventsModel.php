<?php

namespace Model;

use \W\Model\Model;
use  Model\EventsModel;

class EventsModel extends Model
{

  public function countEvents()
  {
    $query = $this->dbh->query('SELECT COUNT(*) as events FROM events');
    return $query->fetch();
  }

  public function countEventsOfUser($id)
  {
    $query = $this->dbh->query('SELECT COUNT(*) as events FROM events WHERE  user_id = '. $id);
    return $query->fetch();
  }

  public function findAllWithAuthor($orderBy = '', $orderDir = 'ASC', $limit = null, $offset = null)
  {
    // Il faut utiliser des alias (as) pour éviter d'écraser l'id article avec l'id user
    $sql = 'SELECT *, users.id as id_user, events.id as id_event FROM ' . $this->table;
    if (!empty($orderBy)){

      //sécurisation des paramètres, pour éviter les injections SQL
      if(!preg_match('#^[a-zA-Z0-9_$]+$#', $orderBy)){
        die('Error: invalid orderBy param');
      }
      $orderDir = strtoupper($orderDir);
      if($orderDir != 'ASC' && $orderDir != 'DESC'){
        die('Error: invalid orderDir param');
      }
      if ($limit && !is_int($limit)){
        die('Error: invalid limit param');
      }
      if ($offset && !is_int($offset)){
        die('Error: invalid offset param');
      }

    }

      $sql .= ' LEFT JOIN users ON users.id = events.user_id';

      $sql .= ' GROUP BY '.$orderBy.' '.$orderDir;
      
        if($limit){
            $sql .= ' LIMIT '.$limit;
            if($offset){
                $sql .= ' OFFSET '.$offset;
            }
        }
    $sth = $this->dbh->prepare($sql);
    $sth->execute();

    return $sth->fetchAll();
  }

  public function subscribersEvent($event, $id)
  {
    $query = $this->dbh->query('SELECT username FROM users INNER JOIN events ON events.subscriber_id = users.id WHERE events.subscriber_id');
    return $query->fetchAll();
  }

  public function countAllEvent(){
    $query = $this->dbh->query('SELECT * FROM `users` INNER JOIN events ON users.id = events.user_id' );
    return $query->fetchAll();
  }

	public function countEventsForUser($id)
    {
      $query = $this->dbh->query('SELECT COUNT(*) as events FROM events Where events.user_id =' . $id);
      return $query->fetch();
    }
    public function countKmOfUser($id)
    {
      $query = $this->dbh->query('SELECT SUM(distance) FROM `events` WHERE user_id = ' .$id);
      return $query->fetch();
    }
    public function eventsPagination($orderBy = '', $orderDir = 'ASC', $limit = null, $offset = null)
    {

     // SELECT * FROM `users` INNER JOIN events ON users.id = events.user_id ORDER BY `post` DESC LIMIT 10 OFFSET 0
      $sql = 'SELECT * FROM ' . $this->table;
      if (!empty($orderBy)){

        //sécurisation des paramètres, pour éviter les injections SQL
        if(!preg_match('#^[a-zA-Z0-9_$]+$#', $orderBy)){
          die('Error: invalid orderBy param');
        }
        $orderDir = strtoupper($orderDir);
        if($orderDir != 'ASC' && $orderDir != 'DESC'){
          die('Error: invalid orderDir param');
        }
        if ($limit && !is_int($limit)){
          die('Error: invalid limit param');
        }
        if ($offset && !is_int($offset)){
          die('Error: invalid offset param');
        }

        $sql .= ' ORDER BY '.$orderBy.' '.$orderDir;
      }
      $sql .= ' INNER JOIN events ON users.id = events.user_id'; // ne pas oublier lespace avant le LEFT JOIN
          if($limit){
              $sql .= ' LIMIT '.$limit;
              if($offset){
                  $sql .= ' OFFSET '.$offset;
              }
          }
      $sth = $this->dbh->prepare($sql);
      $sth->execute();

      return $sth->fetchAll();
    }
}
