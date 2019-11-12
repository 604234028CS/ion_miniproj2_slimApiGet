<?php

// get all apartment
    $app->get('/apartment', function ($request, $response, $args) {
         $sth = $this->db->prepare("SELECT
         rentedroom.id_rentedroom,
         rentedroom.name_rentedroom, 
         rentedroom.address_rentedroom,
         rentedroom.price, rentedroom.facilities,
         rentedroom.id_picture, 
         type.name_type,
         rentedroom.restrict_gender, 
         rentedroom.phone_rentedroom     
         FROM rentedroom, type, picture 
         WHERE rentedroom.id_type = type.id_type 
         AND type.id_type 
         LIKE 't0002%' 
         AND rentedroom.id_rentedroom = picture.id_rentedroom");
        $sth->execute();
        $todos = $sth->fetchAll();
        return $this->response->withJson($todos);
    });

    // get all mansion
    $app->get('/mansion', function ($request, $response, $args) {
        $sth = $this->db->prepare("SELECT
        rentedroom.id_rentedroom,
        rentedroom.name_rentedroom, 
        rentedroom.address_rentedroom,
        rentedroom.price, rentedroom.facilities,
        rentedroom.id_picture, 
        type.name_type,
        rentedroom.restrict_gender, 
        rentedroom.phone_rentedroom     
        FROM rentedroom, type, picture 
        WHERE rentedroom.id_type = type.id_type 
        AND type.id_type 
        LIKE 't0003%' 
        AND rentedroom.id_rentedroom = picture.id_rentedroom");
       $sth->execute();
       $todos = $sth->fetchAll();
       return $this->response->withJson($todos);
   });

   // get all condo
   $app->get('/condo', function ($request, $response, $args) {
    $sth = $this->db->prepare("SELECT
    rentedroom.id_rentedroom,
    rentedroom.name_rentedroom, 
    rentedroom.address_rentedroom,
    rentedroom.price, rentedroom.facilities,
    rentedroom.id_picture, 
    type.name_type,
    rentedroom.restrict_gender, 
    rentedroom.phone_rentedroom     
    FROM rentedroom, type, picture 
    WHERE rentedroom.id_type = type.id_type 
    AND type.id_type 
    LIKE 't0001%' 
    AND rentedroom.id_rentedroom = picture.id_rentedroom");
   $sth->execute();
   $todos = $sth->fetchAll();
   return $this->response->withJson($todos);
});

// get all dorm
$app->get('/dorm', function ($request, $response, $args) {
    $sth = $this->db->prepare("SELECT
    rentedroom.id_rentedroom,
    rentedroom.name_rentedroom, 
    rentedroom.address_rentedroom,
    rentedroom.price, rentedroom.facilities,
    rentedroom.id_picture, 
    type.name_type,
    rentedroom.restrict_gender, 
    rentedroom.phone_rentedroom     
    FROM rentedroom, type, picture 
    WHERE rentedroom.id_type = type.id_type 
    AND type.id_type 
    LIKE 't0004%' 
    AND rentedroom.id_rentedroom = picture.id_rentedroom");
   $sth->execute();
   $todos = $sth->fetchAll();
   return $this->response->withJson($todos);
});


$app->get('/room3000', function ($request, $response, $args) {
    $sth = $this->db->prepare("SELECT 
	rentedroom.id_rentedroom,
	rentedroom.name_rentedroom,
	rentedroom.address_rentedroom,
	rentedroom.price,
	rentedroom.facilities,
    rentedroom.id_picture,
	type.name_type,
	rentedroom.restrict_gender,
	rentedroom.phone_rentedroom
FROM rentedroom, type, picture 
WHERE rentedroom.id_type = type.id_type  AND rentedroom.id_rentedroom = picture.id_rentedroom AND rentedroom.price < 3000;");
   $sth->execute();
   $mansionprice = $sth->fetchAll();
   return $this->response->withJson($mansionprice);
});

$app->get('/room3001', function ($request, $response, $args) {
    $sth = $this->db->prepare("SELECT 
	rentedroom.id_rentedroom,
	rentedroom.name_rentedroom,
	rentedroom.address_rentedroom,
	rentedroom.price,
	rentedroom.facilities,
    rentedroom.id_picture,
	type.name_type,
	rentedroom.restrict_gender,
	rentedroom.phone_rentedroom
FROM rentedroom, type, picture 
WHERE rentedroom.id_type = type.id_type  AND rentedroom.id_rentedroom = picture.id_rentedroom AND rentedroom.price BETWEEN '3001%' AND '4000%' ;");
   $sth->execute();
   $mansionprice = $sth->fetchAll();
   return $this->response->withJson($mansionprice);
});

$app->get('/room4000', function ($request, $response, $args) {
    $sth = $this->db->prepare("SELECT 
	rentedroom.id_rentedroom,
	rentedroom.name_rentedroom,
	rentedroom.address_rentedroom,
	rentedroom.price,
	rentedroom.facilities,
    rentedroom.id_picture,
	type.name_type,
	rentedroom.restrict_gender,
	rentedroom.phone_rentedroom
FROM rentedroom, type, picture 
WHERE rentedroom.id_type = type.id_type  AND rentedroom.id_rentedroom = picture.id_rentedroom AND rentedroom.price > 4000;");
   $sth->execute();
   $mansionprice = $sth->fetchAll();
   return $this->response->withJson($mansionprice);
});
$app->get('/search/[{query}]', function ($request, $response, $args) {
    $sth = $this->db->prepare("SELECT * FROM rentedroom WHERE name_rentedroom LIKE :query ORDER BY name_rentedroom");
    $query = "%".$args['query']."%";
    $sth->bindParam("query",$query);
   $sth->execute();
   $todos = $sth->fetchAll();
   return $this->response->withJson($todos);
});

$app->get('/room', function ($request, $response, $args) {
    $sth = $this->db->prepare("SELECT * FROM rentedroom ");
   $sth->execute();
   $todos = $sth->fetchAll();
   return $this->response->withJson($todos);

});


$app->get('/showroom/[{name_rentedroom}]', function ($request, $response, $args) {
    $sth = $this->db->prepare("SELECT * FROM rentedroom WHERE name_rentedroom LIKE :name_rentedroom ORDER BY name_rentedroom");
    $query = "%".$args['name_rentedroom']."%";
    $sth->bindParam("name_rentedroom",$query);
   $sth->execute();
   $todos = $sth->fetchAll();
   return $this->response->withJson($todos);
});


    // Retrieve todo with id 
    $app->get('/todo/[{id}]', function ($request, $response, $args) {
         $sth = $this->db->prepare("SELECT * FROM tasks WHERE id=:id");
        $sth->bindParam("id", $args['id']);
        $sth->execute();
        $todos = $sth->fetchObject();
        return $this->response->withJson($apartment);
    });
 
 
    // Search for todo with given search teram in their name
    $app->get('/todos/search/[{query}]', function ($request, $response, $args) {
         $sth = $this->db->prepare("SELECT * FROM tasks WHERE UPPER(task) LIKE :query ORDER BY task");
        $query = "%".$args['query']."%";
        $sth->bindParam("query", $query);
        $sth->execute();
        $todos = $sth->fetchAll();
        return $this->response->withJson($todos);
    });

    
 
    // Add a new todo
    $app->post('/todo', function ($request, $response) {
        $input = $request->getParsedBody();
        $sql = "INSERT INTO tasks (task) VALUES (:task)";
         $sth = $this->db->prepare($sql);
        $sth->bindParam("task", $input['task']);
        $sth->execute();
        $input['id'] = $this->db->lastInsertId();
        return $this->response->withJson($input);
    });
        
 
    // DELETE a todo with given id
    $app->delete('/todo/[{id}]', function ($request, $response, $args) {
         $sth = $this->db->prepare("DELETE FROM tasks WHERE id=:id");
        $sth->bindParam("id", $args['id']);
        $sth->execute();
        $todos = $sth->fetchAll();
        return $this->response->withJson($todos);
    });
 
    // Update todo with given id
    $app->put('/todo/[{id}]', function ($request, $response, $args) {
        $input = $request->getParsedBody();
        $sql = "UPDATE tasks SET task=:task WHERE id=:id";
         $sth = $this->db->prepare($sql);
        $sth->bindParam("id", $args['id']);
        $sth->bindParam("task", $input['task']);
        $sth->execute();
        $input['id'] = $args['id'];
        return $this->response->withJson($input);
    });